<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class customerdeleted extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER customerdeletede
        BEFORE DELETE ON CustomerData
        FOR EACH ROW
        INSERT INTO customerdeleted(id,cname,meter,EMP,WhoDelete,created_at,updated_at)
        VALUES(old.id,old.cname,old.meter,old.EMP,old.EMP,old.created_at,old.updated_at)
        ');






        Schema::create('customerdeleted', function (Blueprint $table) {

                $table->id();
                $table->string('cname');
                $table->string('meter');
                $table->string('EMP');
                $table->string('WhoDelete');
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
        Schema::dropIfExists('customerdeleted');
    }
}
