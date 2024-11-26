<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('category');
            $table->string('image');
            $table->unsignedBigInteger('lowestPrice');
            $table->unsignedBigInteger('highestPrice');
            $table->timestamps();
        });

        // Define the products array
        $products = [
            [
                'productName' => 'Airpods Pro',
                'category' => 'Audio',
                'image' => 'airpodspro1.png',
                'lowestPrice' => 3399000,
                'highestPrice' => 3399000,
            ],
            [
                'productName' => 'Nothing Ear 2',
                'category' => 'Audio',
                'image' => 'nothingear1.png',
                'lowestPrice' => 1969000,
                'highestPrice' => 1969000,
            ],
            [
                'productName' => 'Sony WF-1000xM4',
                'category' => 'Audio',
                'image' => 'sonyblack1.png',
                'lowestPrice' => 2625000,
                'highestPrice' => 2625000,
            ],
            [
                'productName' => 'Soundcore Space One',
                'category' => 'Audio',
                'image' => 'spaceone1.png',
                'lowestPrice' => 1129000,
                'highestPrice' => 1129000,
            ],
            [
                'productName' => 'CMF Watch Pro 2',
                'category' => 'Watch',
                'image' => 'nothingwatchblue1.png',
                'lowestPrice' => 1299000,
                'highestPrice' => 1299000,
            ],
            [
                'productName' => 'Samsung Galaxy Watch 7',
                'category' => 'Watch',
                'image' => 'galaxywatch1.png',
                'lowestPrice' => 3544000,
                'highestPrice' => 3999000,
            ],
            [
                'productName' => 'Apple Watch Series 9',
                'category' => 'Watch',
                'image' => 'applewatch1.png',
                'lowestPrice' => 5295000,
                'highestPrice' => 6149000,
            ],
            [
                'productName' => 'Huawei Watch Ultimate',
                'category' => 'Watch',
                'image' => 'huaweiwatchblue1.png',
                'lowestPrice' => 11799000,
                'highestPrice' => 12999000,
            ],
            [
                'productName' => 'Elements Backpack Pro',
                'category' => 'Bag',
                'image' => 'alpaka.png',
                'lowestPrice' => 2299000,
                'highestPrice' => 2889000,
            ],
            [
                'productName' => 'Able Carry Max Backpack',
                'category' => 'Bag',
                'image' => 'ablebag1.png',
                'lowestPrice' => 4300000,
                'highestPrice' => 7229000,
            ],
            [
                'productName' => 'AER Day Sling 3',
                'category' => 'Bag',
                'image' => 'aerbag1.png',
                'lowestPrice' => 1249000,
                'highestPrice' => 2400000,
            ],
            [
                'productName' => 'Orbit Key Nest',
                'category' => 'Bag',
                'image' => 'orbitkeybag1.png',
                'lowestPrice' => 1299000,
                'highestPrice' => 1899000,
            ],
        ];
        DB::table('products')->insert($products);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
