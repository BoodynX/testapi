<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesVodsTable extends Migration
{
    public function up()
    {
        Schema::create('vods_in_packages', function (Blueprint $table) {
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('vod_id');
            $table->timestamps();

            $table->foreign('package_id')->references('id')->on('packages');
            $table->foreign('vod_id')->references('id')->on('vods');
            $table->unique(['package_id', 'vod_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('vods_in_packages');
    }
}
