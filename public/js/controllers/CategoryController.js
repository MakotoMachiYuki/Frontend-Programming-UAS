app.controller("CategoryController", function ($scope, $http, $routeParams) {
    $scope.categoryName = $routeParams.category;
    $scope.products = [];
    $scope.sortedProducts = [];
    $scope.sortType = "";
    $scope.selectedProduct = {}; // Stores the selected product ID for each comparator column
    $scope.productDetails = {}; // Stores the selected product details for each comparator column

    // Fetch products from the given category
    $http.get("/api/category/" + $scope.categoryName).then(function (response) {
        $scope.products = response.data;
        $scope.sortProducts();
    });

    // Update selected product details for comparison
    $scope.updateProduct = function (column) {
        const productId = $scope.selectedProduct[column];
        if (productId) {
            $scope.productDetails[column] = $scope.products.find(
                (product) => product._id === productId
            );
        } else {
            $scope.productDetails[column] = null;
        }
    };

    // Sort products based on user selection
    $scope.sortProducts = function () {
        switch ($scope.sortType) {
            case "nameAsc":
                $scope.sortedProducts = [...$scope.products].sort((a, b) =>
                    a.productName.localeCompare(b.productName)
                );
                break;
            case "nameDesc":
                $scope.sortedProducts = [...$scope.products].sort((a, b) =>
                    b.productName.localeCompare(a.productName)
                );
                break;
            case "priceLow":
                $scope.sortedProducts = [...$scope.products].sort(
                    (a, b) => a.lowestPrice - b.lowestPrice
                );
                break;
            case "priceHigh":
                $scope.sortedProducts = [...$scope.products].sort(
                    (a, b) => b.lowestPrice - a.lowestPrice
                );
                break;
            default:
                $scope.sortedProducts = [...$scope.products];
                break;
        }
    };
});
