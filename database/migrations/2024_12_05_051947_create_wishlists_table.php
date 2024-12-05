<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('products')->nullable();  // Change to a string, and allow it to be nullable
            $table->timestamps();
        });

    
    }

    public function down()
    {
        Schema::dropIfExists('wishlist');
    }
};
