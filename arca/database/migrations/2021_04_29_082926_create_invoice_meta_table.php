<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idinvoice');
            $table->unsignedBigInteger('idbarang');
            $table->integer('kuantiti');

            $table->foreign('idinvoice')
                ->references('id')->on('invoice')
                ->onDelete('cascade');

            $table->foreign('idbarang')
                ->references('id')->on('barang')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_meta');
    }
}
