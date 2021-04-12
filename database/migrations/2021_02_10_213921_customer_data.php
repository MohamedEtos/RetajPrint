<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CustomerData extends Migration
{



    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {




        Schema::create('CustomerData', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->integer('Ycopy');
            $table->integer('FileHight');
            $table->integer('meter');
            $table->string('type');
            $table->string('Printer');
            $table->string('note')->nullable();
            $table->string('EMP');
            $table->string('WhoEdited')->default('Not modified yet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CustomerData');
    }
}
