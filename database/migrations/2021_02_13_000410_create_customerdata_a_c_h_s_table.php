<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCustomerdataACHSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER customerdatabeforupdate
        BEFORE UPDATE ON CustomerData
        FOR EACH ROW
        INSERT INTO customerdata_a_c_h_s(old_id,cname,meter,EMP,WhoEdited,created_at,updated_at)
        VALUES(old.id,old.cname,old.meter,old.EMP,new.whoedited,old.created_at,old.updated_at)
        ');


        Schema::create('customerdata_a_c_h_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('old_id')->unsigned()->index();;
            // $table->foreign('old_id')->references('id')->on('customerdata')->onUpdate('cascade')->onDelete('cascade');
            $table->string('cname');
            $table->string('meter');
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
        Schema::dropIfExists('customerdata_a_c_h_s');
    }
}
