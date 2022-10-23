<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->longText('token');
            $table->text('title', 255);
            $table->text('base_url');
            $table->string('sdk', 10);
            $table->longText('api_key'); // Encrypted
            $table->longText('private_key'); // 32 bit private key in encrypted format
            $table->json('binded_ips')->nullable(); 
            $table->boolean('status');
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
        Schema::dropIfExists('apps');
    }
}
