angular.module("gatGateApp").factory("ProductLists", function () {
    const products = [
        {
            name: "Airpods Pro",
            image: "images/produk/airpodspro1.png",
            price: "IDR 3.399.000",
            url: "../product/airpodspro.html",
        },
        {
            name: "Nothing Ear 2",
            image: "images/produk/nothingear1.png",
            price: "IDR 1.969.000",
            url: "../product/nothingear.html",
        },
        {
            name: "Sony WF-1000xM4",
            image: "images/produk/sonyblack1.png",
            price: "IDR 2.625.000",
            url: "../product/sony.html",
        },
        {
            name: "Soundcore Space One",
            image: "images/produk/spaceone1.png",
            price: "IDR 1.129.000",
            url: "../product/soundcore.html",
        },
        {
            name: "CMF Watch Pro 2",
            image: "images/produk/nothingwatchblue1.png",
            price: "IDR 1.299.000",
            url: "../product/nothingwatch.html",
        },
        {
            name: "Samsung Galaxy Watch 7",
            image: "images/produk/galaxywatch1.png",
            price: "IDR 3.544.000 - IDR 3.999.000",
            url: "../product/galaxywatch.html",
        },
        {
            name: "Apple Watch Series 9",
            image: "images/produk/applewatch1.png",
            price: "IDR 5.295.000 - IDR 6.149.000",
            url: "../product/applewatch.html",
        },
        {
            name: "Huawei Watch Ultimate",
            image: "images/produk/huaweiwatchblue1.png",
            price: "IDR 11.799.000 - IDR 12.999.000",
            url: "../product/huaweiwatch.html",
        },
        {
            name: "Elements Backpack Pro",
            image: "images/produk/alpaka.png",
            price: "IDR 2.299.000 - IDR 2.889.000",
            url: "../product/alpakabag.html",
        },
        {
            name: "Able Carry Max Backpack",
            image: "images/produk/ablebag1.png",
            price: "IDR 4.300.000 - IDR 7.229.000",
            url: "../product/ablebag.html",
        },
        {
            name: "AER Day Sling 3",
            image: "images/produk/aerbag1.png",
            price: "IDR 1.249.000 - IDR 2.400.000",
            url: "../product/aerbag.html",
        },
        {
            name: "Orbit Key Nest",
            image: "images/produk/orbitkeybag1.png",
            price: "IDR 1.299.000 - IDR 1.899.000",
            url: "../product/orbitkeybag.html",
        },
    ];

    return {
        getProducts: function () {
            return products;
        },
    };
});
