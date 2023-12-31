<?php

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
        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('organization_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('permissions');
            $table->string('locale')->default('en');
            $table->string('email')->unique();
            $table->string('name_for_avatar');
            $table->string('settings_team_show_actions')->default(true);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        });
    }
};
