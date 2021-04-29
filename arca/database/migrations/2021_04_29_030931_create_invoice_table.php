<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->unsignedBigInteger('idbarang');
            $table->integer('kuantiti');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('iduser')
                ->references('id')->on('users')
                ->onDelete('restrict');

            $table->foreign('idbarang')
                ->references('id')->on('barang')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
