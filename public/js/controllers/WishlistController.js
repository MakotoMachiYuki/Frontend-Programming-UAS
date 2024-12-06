app.controller("WishlistController", function ($scope, $http) {
    $scope.wishlist = null;

    $http({
        method: "GET",
        url: "/api/profile",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then(function (response) {
            if (response.data && typeof response.data.user === "object") {
                const userId = response.data.user._id;

                $http.get("/api/wishlist/" + userId).then(
                    function (wishlistResponse) {
                        $scope.wishlist = wishlistResponse.data;

                        $scope.wishlist.productsDetails = [];

                        $scope.wishlist.products.forEach(function (productId) {
                            $http.get("/api/productId/" + productId).then(
                                function (productResponse) {
                                    $scope.wishlist.productsDetails.push(
                                        productResponse.data
                                    );
                                },
                                function (error) {
                                    console.error(
                                        "Error fetching product details:",
                                        error
                                    );
                                }
                            );
                        });
                    },
                    function (error) {
                        console.error("Error fetching wishlist:", error);
                    }
                );
            } else {
                console.error("Invalid profile data structure:", response.data);
            }
        })
        .catch(function (error) {
            console.error("Error fetching profile:", error);
        });

    $scope.removeProduct = function (wishlistId, productId) {
        const userId = $scope.wishlist.user_id;
        $http
            .delete("/api/wishlist/" + userId + "/" + productId + "/delete")
            .then(function (response) {
                alert(response.data.message);

                $scope.wishlist.productsDetails =
                    $scope.wishlist.productsDetails.filter(function (product) {
                        return product._id !== productId;
                    });
            })
            .catch(function (error) {
                console.error("Error removing product from wishlist:", error);
                alert("Failed to remove product from wishlist.");
            });
    };
});
