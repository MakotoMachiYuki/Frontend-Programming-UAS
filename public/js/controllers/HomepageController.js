app.controller("HomepageController", [
    "$scope",
    "$timeout",
    "$http",
    function ($scope, $timeout, $http) {
        $scope.slideIndex = 0;
        $scope.slides = [
            { image: "images/banner/airpodsprobanner.jpg" },
            { image: "images/banner/cmfbanner.png" },
            { image: "images/banner/ultimatebanner.png" },
        ];

        let slideTimeout;

        const showSlides = () => {
            $scope.slideIndex = ($scope.slideIndex + 1) % $scope.slides.length;
            slideTimeout = $timeout(showSlides, 10000);
        };

        $scope.currentSlide = (index) => {
            $timeout.cancel(slideTimeout);
            $scope.slideIndex = index;
            slideTimeout = $timeout(showSlides, 10000);
        };

        slideTimeout = $timeout(showSlides, 10000);

        $scope.$on("$destroy", () => {
            $timeout.cancel(slideTimeout);
        });

        $http
            .get("/api/products")
            .then(function (response) {
                $scope.products = response.data;
                $scope.filteredProducts = $scope.products;
            })
            .catch(function (error) {
                console.error("Error fetching products:", error);
            });

        $scope.sortCriteria = "";
        $scope.selectedCategory = "";
        $scope.minPrice = null;
        $scope.maxPrice = null;

        $scope.$watchGroup(
            ["selectedCategory", "minPrice", "maxPrice"],
            function () {
                $scope.filterProducts();
            }
        );

        $scope.filterProducts = function () {
            if ($scope.products == null) {
                console.log("No filter yet");
                return;
            }
            $scope.filteredProducts = $scope.products.filter((product) => {
                const categoryMatch =
                    !$scope.selectedCategory ||
                    product.category === $scope.selectedCategory;
                const minPriceMatch =
                    !$scope.minPrice ||
                    product.lowestPrice >= parseFloat($scope.minPrice);
                const maxPriceMatch =
                    !$scope.maxPrice ||
                    product.highestPrice <= parseFloat($scope.maxPrice);

                return categoryMatch && minPriceMatch && maxPriceMatch;
            });
        };
    },
]);
