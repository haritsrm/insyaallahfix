<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->unique();
            $table->integer('activate');
            $table->unsignedInteger('acc_by')->nullable();
            $table->unsignedInteger('receive_by')->nullable();
            $table->timestamps();
        });

        // Schema::table('accs', function(Blueprint $kolom) {
        //     $kolom->foreign('acc_by')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
        //     $kolom->foreign('receive_by')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accs');
    }
}
