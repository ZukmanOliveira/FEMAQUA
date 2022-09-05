<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_model_tools_model', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('toolsModel_id');
            
            $table->foreignId('tools_model_id')->constrained('toolsModel');
            $table->foreignId('tags_model_id_tool')->constrained('tagsModel');
            //$table->unsignedBigInteger('id_tool')->increment('id_tool');
            $table->timestamps();
        });

        //Schema::table('tagsModel', function (Blueprint $table) {
        //    $table->foreign('id')->references('toolsModel_id')->on('tags_model_tools_model')->onDelete('cascade');
            
       // });

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagsModeltoolsModel');
    }
};
