app.controller("AdminController", function ($scope, $http, $location) {
    $scope.products = [];

    // Fetch all products
    $http
        .get("/api/products")
        .then(function (response) {
            $scope.products = response.data;
        })
        .catch(function (error) {
            console.error("Error fetching products:", error);
        });

    // Navigate to edit product page
    $scope.editProduct = function (productId) {
        $location.path("/admin/edit-product/" + productId);
    };
});
