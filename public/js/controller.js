// Configure interpolation symbols
app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol("[[").endSymbol("]]");
});

app.controller("HeaderController", [
    "$scope",
    "ProductLists",
    function ($scope, ProductLists) {
        // Sidebar visibility toggle
        $scope.sidebarVisible = false;
        $scope.searchVisible = false;

        // Search-related variables
        $scope.searchInput = "";
        $scope.foundProducts = [];
        $scope.productsSearch = ProductLists.getProducts();

        console.log("HeaderController initialized");

        $scope.toggleSidebar = function () {
            $timeout(() => {
                $scope.sidebarVisible = !$scope.sidebarVisible;
            });
        };
        $scope.closeSidebar = function () {
            console.log("Closing Sidebar");
            $scope.sidebarVisible = false;
        };

        $scope.toggleSearch = function () {
            console.log("Toggling Search");
            $scope.searchVisible = !$scope.searchVisible;
            if ($scope.searchVisible) {
                setTimeout(() => {
                    document.getElementById("searchInput").focus(); // Focus input when visible
                }, 0);
            } else {
                $scope.searchInput = "";
                $scope.foundProducts = [];
            }
        };

        $scope.search = function () {
            const input = $scope.searchInput.trim().toLowerCase();
            console.log("Search input:", input);
            $scope.foundProducts = $scope.productsSearch.filter((product) =>
                product.name.toLowerCase().includes(input)
            );
            console.log("Found products:", $scope.foundProducts);
        };

        $scope.noResults = function () {
            return $scope.searchInput && $scope.foundProducts.length === 0;
        };

        $scope.toggleDropdown = function (event) {
            const dropdown = angular.element(event.currentTarget).next();
            const isVisible = dropdown.hasClass("open");

            // Hide all dropdowns first
            angular.element(".dropDownContent").removeClass("open").slideUp();

            // Toggle the clicked dropdown
            if (!isVisible) {
                dropdown.addClass("open").slideDown();
            }
        };
    },
]);

app.controller("SlideshowController", [
    "$scope",
    "$timeout",
    "ProductLists",
    function ($scope, $timeout) {
        $scope.slideIndex = 0;
        $scope.slides = [
            { image: "images/banner/airpodsprobanner.jpg" },
            { image: "images/banner/cmfbanner.png" },
            { image: "images/banner/ultimatebanner.png" },
        ];

        let slideTimeout;

        // Show the selected slide
        const showSlides = () => {
            $scope.slideIndex = ($scope.slideIndex + 1) % $scope.slides.length;
            slideTimeout = $timeout(showSlides, 10000);
        };

        // Initialize the first slide
        $scope.currentSlide = (index) => {
            $timeout.cancel(slideTimeout);
            $scope.slideIndex = index;
            slideTimeout = $timeout(showSlides, 10000);
        };

        // Start the slideshow
        slideTimeout = $timeout(showSlides, 10000);

        // Clean up on controller destroy
        $scope.$on("$destroy", () => {
            $timeout.cancel(slideTimeout);
        });
    },
]);

app.controller("ProductController", [
    "$scope",
    "ProductLists",
    function ($scope, ProductLists) {
        $scope.products = ProductLists.getProducts();
    },
]);