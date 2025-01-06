<?php

use App\Enums\PomodoroStatusEnum;
use App\Enums\PomodoroTypeEnum;
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
        Schema::create('pomodoro_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('pomodoro_status', PomodoroStatusEnum::getAll());
            $table->enum('pomodoro_type', PomodoroTypeEnum::getAll());
            $table->integer('time_expected')->default(60);
            $table->timestamp('started_at');
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('abandoned_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pomodoro_sessions');
    }
};
