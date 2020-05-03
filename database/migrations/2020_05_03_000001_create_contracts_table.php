<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->longText('text');
            
            $table->dateTime('valid_at');
            $table->dateTime('expire_at');
            $table->timestamps();
            $table->softDeletes();

            $table->charset = 'utf8mb';
            $table->collection = 'utf8mb_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
