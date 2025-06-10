<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('widget_bug_tracker_content', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('widget_id')->references('id')->on('widgets');
            $table->string('popup_text')->nullable();
            $table->string('icon_color')->nullable();
            $table->string('icon_size')->nullable();
            $table->string('icon_position')->nullable();
            $table->string('form_title')->nullable();
            $table->string('form_placeholder')->nullable();
            $table->string('form_button_text')->nullable();
            $table->string('form_button_color')->nullable();
            $table->string('form_success_message')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('widget_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('widget_bug_tracker_content');
    }
};
