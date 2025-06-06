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
        Schema::create('widgets', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('organization_id')->references('id')->on('organizations');
            $table->string('domain');
            $table->string('name');
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
            $table->index('organization_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('widgets');
    }
};
