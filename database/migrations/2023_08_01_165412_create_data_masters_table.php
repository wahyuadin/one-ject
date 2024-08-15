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
        Schema::create('data_masters', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_tes');
            $table->string('nama');
            $table->string('tes');
            $table->string('kategori');
            $table->string('gambar')->nullable();
            $table->string('link');
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
        Schema::dropIfExists('data_masters');
    }
};
