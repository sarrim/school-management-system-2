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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->nullable()->comment('Admin, Student, Teacher, Parent, CheckIn, SA');
            $table->string('full_name')->nullable();
            $table->string('user_slug')->nullable();
            $table->string('uid')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('string_password');
            $table->string('gender')->nullable();
            $table->string('contact')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=inactive,1=active');
            $table->tinyInteger('approval_status')->default(1)->comment('1=pending,2=approved,3=rejected');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
