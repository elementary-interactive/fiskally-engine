<?php

namespace ElementaryInteractive\FiskallyEngine\Models;

use Illuminate\Database\Eloquent\{
    Model as EloquentModel,
    SoftDeletes
};

class Generic extends EloquentModel
{
    use SoftDeletes;
    
    // protected $primaryKey = 'uuid';

    /** The type of the auto-incrementing ID, what is not really
     * auto-incrementing in our case.
     *
     * @var string
     */
    protected $keyType = 'string';

    /** As because we use UUID as primary key, we don't need auto incrementing a stupid integer.
     * @var bool
     */
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::observe(\ElementaryInteractive\FiskallyEngine\Observers\GenericObserver::class);

        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), \Str::uuid());
        });
    }
}