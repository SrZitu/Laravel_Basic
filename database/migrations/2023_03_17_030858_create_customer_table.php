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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('customer_id'); //defining id as customer_id
            $table->timestamps();
            $table->string("name",60);
            $table->enum("gender",['M','F','O'])->nullable();
            $table->text("address");
            $table->date("dob")->nullable();
            $table->string("password");
            $table->boolean("status")->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
