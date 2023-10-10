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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            //GLOBAL SETTINGS
            $table->string('site_name')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_email')->nullable();
            $table->string('google_analytics_active')->default(0);
            $table->text('google_analytics_code')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            //SOCIAL LOGIN
            $table->boolean('facebook_active')->default(0);
            $table->text('facebook_api_key')->nullable();
            $table->text('facebook_api_secret')->nullable();
            $table->text('facebook_redirect_url')->nullable();

            $table->boolean('github_active')->default(0);
            $table->text('github_api_key')->nullable();
            $table->text('github_api_secret')->nullable();
            $table->text('github_redirect_url')->nullable();

            $table->boolean('google_active')->default(0);
            $table->text('google_api_key')->nullable();
            $table->text('google_api_secret')->nullable();
            $table->text('google_redirect_url')->nullable();

            $table->boolean('twitter_active')->default(0);
            $table->text('twitter_api_key')->nullable();
            $table->text('twitter_api_secret')->nullable();
            $table->text('twitter_redirect_url')->nullable();

            //SMTP
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_email')->nullable();
            $table->string('smtp_sender_name')->nullable();
            $table->string('smtp_encryption')->default('TLS');

            //OPENAI
            $table->text('openai_api_secret')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
