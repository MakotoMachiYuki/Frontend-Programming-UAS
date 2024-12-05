app.controller(
    "EditProductController",
    function ($scope, $http, $routeParams, $location) {
        $scope.product = {};

        // Fetch product details based on productId
        var productId = $routeParams.productId;

        $http
            .get("/api/product/" + productId)
            .then(function (response) {
                $scope.product = response.data;
            })
            .catch(function (error) {
                console.error("Error fetching product:", error);
            });

        // Update product details
        $scope.updateProduct = function () {
            $http({
                method: "PUT",
                url: "/api/product/update/" + productId,
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                data: $scope.product,
            })
                .then(function (response) {
                    alert("Product updated successfully!");
                    $location.path("/admin");
                })
                .catch(function (error) {
                    console.error("Error updating product:", error);
                    alert("Failed to update product.");
                });
        };

        // Delete product
        $scope.deleteProduct = function () {
            if (confirm("Are you sure you want to delete this product?")) {
                $http({
                    method: "DELETE",
                    url: "/api/product/delete/" + productId,
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                })
                    .then(function (response) {
                        alert("Product deleted successfully!");
                        $location.path("/admin");
                    })
                    .catch(function (error) {
                        console.error("Error deleting product:", error);
                        alert("Failed to delete product.");
                    });
            }
        };
    }
);
