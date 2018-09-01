<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitlementsTable extends Migration
{
    public function up()
    {
        Schema::create('entitlements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('entitlement_id');
            $table->string('entitlement_type');
            $table->dateTime('expires_at');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('entitlements');
    }
}
