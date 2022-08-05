<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tagsModel', function (Blueprint $table) {
            $table->id();
            $table->string('tags');
            $table->unsignedBigInteger('id_tool')->increment('id_tool');
            $table->timestamps();
        });

        Schema::table('tagsModel', function (Blueprint $table) {
            $table->foreign('id_tool')->references('id')->on('toolsModel')->onDelete('cascade');
            
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('tagsModel');
    }
};
