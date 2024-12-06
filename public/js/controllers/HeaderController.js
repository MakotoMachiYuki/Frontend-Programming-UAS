app.controller("HeaderController", [
    "$scope",
    "$http",
    "$location",
    function ($scope, $http, $location) {
        $scope.products = [];
        $scope.searchQuery = "";
        $scope.searchResults = [];
        $scope.sidebarVisible = false;
        $scope.searchVisible = false;

        // Fetch products from the API
        $http.get("/api/products").then(function (response) {
            $scope.products = response.data;
        });

        // Search functionality
        $scope.searchProducts = function () {
            const query = $scope.searchQuery.toLowerCase();
            if (query) {
                $scope.searchResults = $scope.products.filter((product) =>
                    product.productName.toLowerCase().includes(query)
                );
            } else {
                $scope.searchResults = [];
            }
        };

        // Redirect to product page and hide search bar
        $scope.goToProduct = function (product) {
            $scope.searchVisible = false; // Hide search bar and results
            $scope.searchQuery = ""; // Clear the search query
            $scope.searchResults = []; // Clear search results
            $location.path("/product/" + product.productName);
        };

        // Toggle sidebar visibility
        $scope.toggleSidebar = function () {
            $scope.sidebarVisible = !$scope.sidebarVisible;
        };

        // Toggle search visibility
        $scope.toggleSearch = function () {
            $scope.searchVisible = !$scope.searchVisible;
        };

        // Close sidebar on clicking close button
        $scope.closeSidebar = function () {
            $scope.sidebarVisible = false;
        };

        // Document ready actions with jQuery
        $(document).ready(function () {
            // Handle outside click to close sidebar
            $(document).click(function (event) {
                if (
                    !$(event.target).closest("#menuToggleDiv, #sidebarMenu")
                        .length
                ) {
                    if ($scope.sidebarVisible) {
                        $scope.$apply(function () {
                            $scope.sidebarVisible = false;
                        });
                    }
                }
            });
        });
    },
]);
