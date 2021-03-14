<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //insert this code in sql php my admin will be work
        DB::unprepared('  
        CREATE TRIGGER Restore
        BEFORE DELETE ON customerdeleted
        FOR EACH ROW
        INSERT INTO CustomerData(id,cname,meter,EMP,WhoEdited,created_at,updated_at)
        VALUES(old.id,old.cname,old.meter,old.EMP,old.WhoDelete,old.created_at,old.updated_at)
        ');
        
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('EmpCommet');
            $table->string('comment');
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
        Schema::dropIfExists('comments');
    }
}
