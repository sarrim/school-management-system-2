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
        Schema::create('fee_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('class_id');
            $table->integer('student_id');
            $table->integer('fee_id');
            $table->integer('fee_collected');
            $table->integer('collected_by');
            $table->date('collected_on')->default('CURRECT_DATETIME');
            $table->tinyInteger('status')->default('1');
            $table->longText('remarks')->nullable();
            $table->tinyInteger('late_fee')->default(0)->nullable();
            $table->integer('late_fee_amount')->nullable();
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
        Schema::dropIfExists('fee_collections');
    }
};
