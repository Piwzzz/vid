<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  
{
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->char('vidio');
            $table->char('caption');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};