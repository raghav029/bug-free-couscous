<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('request_type_id');
            $table->unsignedInteger('tenant_id');
            $table->text('description');
            $table->tinyInteger('status');
            $table->timestamps();

//            $table->foreign('request_type_id')->reference('id')->on('request_type');
//            $table->foreign('tenant_id')->reference('id')->on('tenants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
