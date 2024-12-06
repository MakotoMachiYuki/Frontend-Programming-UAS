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
            $table->string('productName')->unique();
            $table->string('category');
            $table->string('image');
            $table->unsignedBigInteger('lowestPrice');
            $table->unsignedBigInteger('highestPrice');
            $table->timestamps();
        });

        $products = [
            [
                'productName' => 'Airpods Pro',
                'category' => 'Audio',
                'lowestPrice' => 3399000,
                'highestPrice' => 4000000,
                'images' => [
                    'default' => [
                        'airpodspro1.png',
                        'airpodspro2.png',
                        'airpodspro3.png',
                        'airpodspro4.png',
                        'airpodspro5.png',
                        'airpodspro6.png'
                    ],
                    'banners' => [
                        'airpodsproBanner1.png',
                        'airpodsproBanner2.png',
                        'airpodsproBanner3.png',
                        'airpodsproBanner4.png',
                        'airpodsproBanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?navsource=&pmin=1000000&search_id=202410090623489111267788601A1B4LL8&srp_component_id=04.06.00.00&srp_page_id=&srp_page_title=&st=&q=airpods%20pro%202',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=airpods%20pro%202',
                'specs' => 'H2 chip, Active Noise Cancellation (ANC), transparency mode, spatial audio. Supports adaptive EQ, up to 6 hours of battery life (30 hours with the case). The case has a built-in speaker and Find My support, sweat and water-resistant (IPX4).'
            ],
            [
                'productName' => 'Nothing Ear 2',
                'category' => 'Audio',
                'lowestPrice' => 1969000,
                'highestPrice' => 2400000,
                'images' => [
                    'default' => [
                        'nothingearblack1.png',
                        'nothingearblack2.png',
                        'nothingearblack3.png',
                        'nothingearwhite1.png',
                        'nothingearwhite2.png',
                        'nothingearwhite3.png'
                    ],
                    'banners' => [
                        'nothingearbanner1.png',
                        'nothingearbanner2.png',
                        'nothingearbanner3.png',
                        'nothingearbanner4.png',
                        'nothingearbanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=&q=nothing%20ear%202&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=nothing%20ear%202',
                'specs' => 'Hi-Res Audio certification with LHDC 5.0 codec support, adaptive Active Noise Cancellation (ANC). Up to 6 hours of playback (36 hours with the case), personalized sound profiles with in-app customization. Water and dust-resistant with an IP54 rating, case is IP55-rated.',
            ],
            [
                'productName' => 'Sony WF-1000xM4',
                'category' => 'Audio',
                'lowestPrice' => 2625000,
                'highestPrice' => 2900000,
                'images' => [
                    'default' => [
                        'sonyblack1.png',
                        'sonyblack2.png',
                        'sonyblack3.png',
                        'sonyblack4.png',
                        'sonyblack5.png',
                        'sonysilver1.png',
                        'sonysilver2.png',
                        'sonysilver3.png',
                        'sonysilver4.png',
                        'sonysilver5.png'
                    ],
                    'banners' => [
                        'sonybanner1.png',
                        'sonybanner2.png',
                        'sonybanner3.png',
                        'sonybanner4.png',
                        'sonybanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?q=sony+wf+1000xm4&source=universe&st=product&navsource=home&srp_component_id=02.02.01.03',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=sony%20wf%201000xm4&trackingId=searchhint-1728455762-c0b03f78-8608-11ef-b6db-c6dc3c767800',
                'specs' => 'Sony V1 processor, industry-leading noise cancellation, high-resolution audio with LDAC support, up to 8 hours of playback with ANC on (24 hours with the case). Feature Speak-to-Chat and Adaptive Sound Control, IPX4 water resistance rating'
            ],
            [
                'productName' => 'Soundcore Space One',
                'category' => 'Audio',
                'lowestPrice' => 1129000,
                'highestPrice' => 1199000,
                'images' => [
                    'default' => [
                        'spaceone1.png',
                        'spaceone2.png',
                        'spaceone3.png',
                        'spaceone4.png',
                        'spaceone5.png',
                        'spaceone6.png',
                        'spaceoneblue1.png',
                        'spaceoneblue2.png',
                        'spaceoneblue3.png',
                        'spaceoneblue4.png',
                        'spaceoneblue5.png',
                        'spaceoneblue6.png',
                        'spaceonecream1.png',
                        'spaceonecream2.png',
                        'spaceonecream3.png',
                        'spaceonecream4.png',
                        'spaceonecream5.png',
                        'spaceonecream6.png'
                    ],
                    'banners' => [
                        'spaceonebanner1.png',
                        'spaceonebanner2.png',
                        'spaceonebanner3.png',
                        'spaceonebanner4.png',
                        'spaceonebanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=product&q=soundcore%20space%20one&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=home,home',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=soundcore%20space%20one&trackingId=searchhint-1728455777-c9f59eff-8608-11ef-a795-1af7cd02cb46',
                'specs' => 'Adaptive ANC and 40mm drivers with custom-tuned drivers for rich audio. Up to 55 hours of playback with ANC off (40 hours with ANC on) and fast charging. With Bluetooth multipoint connectivity and an IPX4 water resistance rating'
            ],
            [
                'productName' => 'CMF Watch Pro 2',
                'category' => 'Watch',
                'lowestPrice' => 1299000,
                'highestPrice' => 1299000,
                'images' => [
                    'default' => [
                        'nothingwatchblue1.png',
                        'nothingwatchblue2.png',
                        'nothingwatchblue3.png',
                        'nothingwatchblue4.png',
                        'nothingwatchdarkgrey1.png',
                        'nothingwatchdarkgrey2.png',
                        'nothingwatchdarkgrey3.png',
                        'nothingwatchdarkgrey4.png',
                        'nothingwatchgrey1.png',
                        'nothingwatchgrey2.png',
                        'nothingwatchgrey3.png',
                        'nothingwatchgrey4.png',
                        'nothingwatchorange1.png',
                        'nothingwatchorange2.png',
                        'nothingwatchorange3.png',
                        'nothingwatchorange4.png'
                    ],
                    'banners' => [
                        'nothingwatchbanner1.png',
                        'nothingwatchbanner2.png',
                        'nothingwatchbanner3.png',
                        'nothingwatchbanner4.png',
                        'nothingwatchbanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=product&q=cmf%20watch%20pro%202&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=home,home',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=cmf%20watch%20pro%202',
                'specs' => '1.96-inch AMOLED display with 410x502 resolution, 50Hz refresh rate, and IP68 water resistance. It includes built-in GPS, SpO2 sensor, heart rate monitor, and offers up to 13 days of battery life.',
            ],
            [
                'productName' => 'Samsung Galaxy Watch 7',
                'category' => 'Watch',
                'lowestPrice' => 3544000,
                'highestPrice' => 3999000,
                'images' => [
                    'default' => [
                        'galaxywatch1.png',
                        'galaxywatch2.png',
                        'galaxywatch3.png',
                        'galaxywatch4.png',
                        'galaxywatch5.png',
                        'galaxywatchsilver1.png',
                        'galaxywatchsilver2.png',
                        'galaxywatchsilver3.png',
                        'galaxywatchsilver4.png',
                        'galaxywatchsilver5.png'
                    ],
                    'banners' => [
                        'galaxywatchbanner1.png',
                        'galaxywatchbanner2.png',
                        'galaxywatchbanner3.png',
                        'galaxywatchbanner4.png',
                        'galaxywatchbanner5.png',
                        'galaxywatchbanner6.png',
                        'galaxywatchbanner7.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=product&q=galaxy%20watch%207&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=home,home',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=galaxy%20watch%207',
                'specs' => '1.5-inch Super AMOLED display, Exynos W930 chipset, 2GB RAM, 16GB storage, and runs on WearOS. It supports ECG, blood pressure monitoring, and has up to 50 hours of battery life with 5ATM + IP68 water resistance.'
            ],
            [
                'productName' => 'Apple Watch Series 9',
                'category' => 'Watch',
                'lowestPrice' => 5295000,
                'highestPrice' => 6149000,
                'images' => [
                    'default' => [
                        'applewatch1.png',
                        'applewatch2.png',
                        'applewatch3.png',
                        'applewatch4.png',
                        'applewatch5.png',
                        'applewatch6.png',
                        'applewatchpink1.png',
                        'applewatchpink2.png',
                        'applewatchpink3.png',
                        'applewatchpink4.png',
                        'applewatchpink5.png',
                        'applewatchpink6.png',
                        'applewatchred1.png',
                        'applewatchred2.png',
                        'applewatchred3.png',
                        'applewatchred4.png',
                        'applewatchred5.png',
                        'applewatchred6.png',
                        'applewatchsilver1.png',
                        'applewatchsilver2.png',
                        'applewatchsilver3.png',
                        'applewatchsilver4.png',
                        'applewatchsilver5.png',
                        'applewatchsilver6.png',
                        'applewatchstarlight1.png',
                        'applewatchstarlight2.png',
                        'applewatchstarlight3.png',
                        'applewatchstarlight4.png',
                        'applewatchstarlight5.png',
                        'applewatchstarlight6.png'
                    ],
                    'banners' => [
                        'applewatchbanner1.png',
                        'applewatchbanner2.png',
                        'applewatchbanner3.png',
                        'applewatchbanner4.png',
                        'applewatchbanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=product&q=apple%20watch%209&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=home,home',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=apple%20watch%20series%209',
                'specs' => 'S9 SiP chip, it has a 1.9-inch Retina LTPO OLED display with 1000 nits brightness. It includes advanced sensors like blood oxygen, ECG, and a new double-tap gesture, offering up to 18 hours of battery life.'
            ],
            [
                'productName' => 'Huawei Watch Ultimate',
                'category' => 'Watch',
                'lowestPrice' => 11799000,
                'highestPrice' => 12999000,
                'images' => [
                    'default' => [
                        'huaweiwatchblue1.png',
                        'huaweiwatchblue2.png',
                        'huaweiwatchblue3.png',
                        'huaweiwatchgreen1.png',
                        'huaweiwatchgreen2.png',
                        'huaweiwatchgreen3.png'
                    ],
                    'banners' => [
                        'huaweiwatchbanner1.png',
                        'huaweiwatchbanner2.png',
                        'huaweiwatchbanner3.png',
                        'huaweiwatchbanner4.png',
                        'huaweiwatchbanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=product&q=huawei%20watch%20ultimate&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=home,home',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=huawei%20watch%20ultimate',
                'specs' => 'Huawei Watch Ultimate
1.5-inch LTPO AMOLED display with 466x466 resolution, water resistance up to 100m, and dual-band GPS. It offers robust health tracking with ECG and SpO2 sensors, plus up to 14 days of battery life.'
            ],
            [
                'productName' => 'Elements Backpack Pro',
                'category' => 'Bag',
                'lowestPrice' => 2299000,
                'highestPrice' => 2889000,
                'images' => [
                    'default' => [
                        'alpaka.png',
                        'alpakabag1.png',
                        'alpakabag2.png',
                        'alpakabag3.png',
                        'alpakabag4.png',
                        'alpakabag5.png',
                        'alpakabag6.png',
                        'alpakabag7.png',
                        'alpakabag8.png',
                        'alpakablack1.png',
                        'alpakablack2.png',
                        'alpakablack3.png',
                        'alpakablack4.png',
                        'alpakablack5.png',
                        'alpakablack6.png',
                        'alpakablack7.png',
                        'alpakablack8.png',
                        'alpakagreen1.png',
                        'alpakagreen2.png',
                        'alpakagreen3.png',
                        'alpakagreen4.png',
                        'alpakagreen5.png',
                        'alpakagreen6.png',
                        'alpakagreen7.png',
                        'alpakagreen8.png'
                    ],
                    'banners' => [
                        'alpakabagbanner1.png',
                        'alpakabagbanner2.png',
                        'alpakabagbanner3.png',
                        'alpakabagbanner4.png',
                        'alpakabagbanner5.png',
                        'alpakabagbanner6.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=product&q=alpaka%20elements%20backpack%20pro&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=alpaka%20elements%20backpack%20pro%5C',
                'specs' => 'Made from weatherproof fabric with YKK AquaGuard zippers, it has a 30L capacity, 16 inch laptop compartment, padded back, and ergonomic straps.'
            ],
            [
                'productName' => 'Able Carry Max Backpack',
                'category' => 'Bag',
                'lowestPrice' => 4300000,
                'highestPrice' => 7229000,
                'images' => [
                    'default' => [
                        'ablebag1.png',
                        'ablebag2.png',
                        'ablebag3.png',
                        'ablebag4.png',
                        'ablebag5.png',
                        'ablebag6.png',
                        'ablebagblue1.png',
                        'ablebagblue2.png',
                        'ablebagblue3.png',
                        'ablebagblue4.png',
                        'ablebagblue5.png',
                        'ablebagblue6.png',
                        'ablebagbrown1.png',
                        'ablebagbrown2.png',
                        'ablebagbrown3.png',
                        'ablebagbrown4.png',
                        'ablebagbrown5.png',
                        'ablebagbrown6.png',
                        'ablebaggreen1.png',
                        'ablebaggreen2.png',
                        'ablebaggreen3.png',
                        'ablebaggreen4.png',
                        'ablebaggreen5.png',
                        'ablebaggreen6.png'
                    ],
                    'banners' => [
                        'ablebagbanner1.png',
                        'ablebagbanner12.png',
                        'ablebagbanner13.png',
                        'ablebagbanner14.png',
                        'ablebagbanner15.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=product&q=able%20carry%20max&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=able%20carry%20max',
                'specs' => 'Constructed from Cordura nylon with YKK zippers, this 30L backpack features a 17 inch laptop sleeve, water resistance, airflow back panel, and organized internal compartments.'
            ],
            [
                'productName' => 'AER Day Sling 3',
                'category' => 'Bag',
                'lowestPrice' => 1249000,
                'highestPrice' => 2400000,
                'images' => [
                    'default' => [
                        'aerbag1.png',
                        'aerbag2.png',
                        'aerbag3.png',
                        'aerbag4.png',
                        'aerbag5.png',
                        'aerbag6.png',
                        'aerbaggray1.png',
                        'aerbaggray2.png',
                        'aerbaggray3.png',
                        'aerbaggray4.png',
                        'aerbaggray5.png',
                        'aerbaggray6.png',
                        'aerbagolive1.png',
                        'aerbagolive2.png',
                        'aerbagolive3.png',
                        'aerbagolive4.png',
                        'aerbagolive5.png',
                        'aerbagolive6.png'
                    ],
                    'banners' => [
                        'aerbagbanner1.png',
                        'aerbagbanner2.png',
                        'aerbagbanner3.png',
                        'aerbagbanner4.png',
                        'aerbagbanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?q=aer+day+sling+3&source=universe&st=product&navsource=home&srp_component_id=02.02.01.05',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=aer%20day%20sling%203',
                'specs' => 'Built from 1680D Cordura ballistic nylon with YKK zippers, this 3L sling bag has an 11 inch tablet compartment, internal organization pockets, and an adjustable strap.'
            ],
            [
                'productName' => 'Orbit Key Nest',
                'category' => 'Bag',
                'lowestPrice' => 1299000,
                'highestPrice' => 1899000,
                'images' => [
                    'default' => [
                        'orbitkeybag1.png',
                        'orbitkeybag2.png',
                        'orbitkeybag3.png',
                        'orbitkeybag4.png',
                        'orbitkeybag5.png',
                        'orbitkeybag6.png',
                        'orbitkeybag7.png',
                        'orbitkeybagash1.png',
                        'orbitkeybagash2.png',
                        'orbitkeybagash3.png',
                        'orbitkeybagash4.png',
                        'orbitkeybagash5.png',
                        'orbitkeybagash6.png',
                        'orbitkeybagash7.png'
                    ],
                    'banners' => [
                        'orbitkeybanner1.png',
                        'orbitkeybanner2.png',
                        'orbitkeybanner3.png',
                        'orbitkeybanner4.png',
                        'orbitkeybanner5.png'
                    ],
                ],
                'tokopediaLink' => 'https://www.tokopedia.com/search?st=&q=orbitkey%20nest&srp_component_id=02.01.00.00&srp_page_id=&srp_page_title=&navsource=',
                'shopeeLink' => 'https://shopee.co.id/search?keyword=orbitkey%20nest',
                'specs' => 'A polycarbonate portable organizer with customizable compartments, elastic bands, and a 10W wireless charging pad.'
            ]
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
