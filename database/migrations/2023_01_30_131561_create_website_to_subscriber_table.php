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
        Schema::create('website_to_subscriber', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('website_id')
                ->nullable(false);
            $table->unsignedBigInteger('subscriber_id')
                ->nullable(false);

            $table->unique(['website_id', 'subscriber_id']);

            $table->foreign('website_id')
                ->references('id')
                ->on('websites')
                ->onDelete('cascade');

            $table->foreign('subscriber_id')
                ->references('id')
                ->on('subscribers')
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
        Schema::dropIfExists('website_to_subscriber');
    }
};
