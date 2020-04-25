<?php

namespace ElementaryInteractive\FiskallyEngine\Observers;

class GenericObserver
{
    /**
     
     *
     * @param  ElementaryInteractive\FiskallyEngine\Generic $model
     * @return void
     */
    public function creating($model): void
    {
        if ($model->created_by)# && !isset($model->created_by))
        {
            $model->created_by = \Auth::id();
        }
        if ($model->updated_by)
        {
            $model->updated_by = $model->created_by;
        }
        if ($model->published_at)
        {
            $model->published_by = \Auth::id();
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  ElementaryInteractive\FiskallyEngine\Generic $model
     * @return void
     */
    public function updating(ElementaryInteractive\FiskallyEngine\Generic $model): void
    {
        if ($model->updated_by)
        {
            $model->updated_by = \Auth::id();
        }
        if ($model->published_at && empty($model->original['published_at']))
        {
            $model->published_by = \Auth::id();
        }
        if ($model->deleted_by && $model->deleted_at && !isset($model->deleted_by))
        {
            $model->deleted_by = \Auth::id();
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  ElementaryInteractive\FiskallyEngine\Generic $model
     * @return void
     */
    public function deleting(ElementaryInteractive\FiskallyEngine\Generic $model): void
    {
        if ($model->deleted_by && $model->deleted_at)
        {
            $model->deleted_by = \Auth::id();
        }
    }
}