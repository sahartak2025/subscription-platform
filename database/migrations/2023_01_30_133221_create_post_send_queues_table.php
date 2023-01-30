<?php

use App\Enums\PostQueueStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('post_send_queue', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')
                ->nullable(false);
            $table->unsignedBigInteger('subscriber_id')
                ->nullable(false);
            $table->tinyInteger('status')
                ->nullable(false)
                ->default(PostQueueStatus::New->value);

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->foreign('subscriber_id')
                ->references('id')
                ->on('subscribers')
                ->onDelete('cascade');

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('post_send_queues');
    }
};
