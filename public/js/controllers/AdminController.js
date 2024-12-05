app.controller("AdminController", function ($scope, $http, $location) {
    $scope.products = [];

    $http
        .get("/api/products")
        .then(function (response) {
            $scope.products = response.data;
        })
        .catch(function (error) {
            console.error("Error fetching products:", error);
        });

    $scope.editProduct = function (productId) {
        $location.path("/admin/edit-product/" + productId);
    };
});
