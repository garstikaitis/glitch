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
        Schema::create('widget_submits', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('widget_id')->references('id')->on('widgets');
            $table->foreignId('organization_id')->references('id')->on('organizations');
            $table->string('page_url')->nullable();
            $table->string('screenshot_url')->nullable();
            $table->text('comment')->nullable();
            $table->string('urgency')->default('LOW');
            $table->string('user_agent')->nullable();
            $table->integer('coordinate_x')->nullable();
            $table->integer('coordinate_y')->nullable();
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
        Schema::dropIfExists('widget_submits');
    }
};
