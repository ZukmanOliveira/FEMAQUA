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
        Schema::create('toolsModel_tagsModel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toolsModel')->constrained('toolsModel');
            $table->foreignId('tagsModel')->constrained('tagsModel');
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
        Schema::dropIfExists('toolsModel_toolTags');
    }
};
