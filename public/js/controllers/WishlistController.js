app.controller("WishlistController", function ($scope, $http) {
    $scope.wishlist = {}; // Only one wishlist per user

    // Fetch user profile to get user ID
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

                // Step 2: Fetch the user's wishlist (only one per user)
                $http.get("/api/wishlist/" + userId).then(
                    // Fetching wishlist without userId in the URL
                    function (wishlistResponse) {
                        $scope.wishlist = wishlistResponse.data; // Only one wishlist
                    },
                    function (error) {
                        console.error("Error fetching wishlist:", error);
                        alert("Failed to fetch wishlist.");
                    }
                );
            } else {
                console.error("Invalid profile data structure:", response.data);
                alert("Failed to retrieve user profile. Please try again.");
            }
        })
        .catch(function (error) {
            console.error("Error fetching profile:", error);
            alert("Failed to fetch user profile.");
        });

    // Add product to wishlist
    $scope.addProduct = function (productId) {
        const userId = $scope.user._id; // Assuming user object is already set

        $http
            .post(`/api/wishlist/${productId}/${userId}`) // Updated endpoint
            .then(
                function (response) {
                    alert("Product added to wishlist");

                    // Reload wishlist data after adding product
                    $http.get("/api/wishlist").then(
                        function (wishlistResponse) {
                            $scope.wishlist = wishlistResponse.data;
                        },
                        function (error) {
                            console.error(
                                "Error fetching updated wishlist:",
                                error
                            );
                            alert("Failed to reload wishlist.");
                        }
                    );
                },
                function (error) {
                    console.error("Error adding product:", error);
                    alert("Failed to add product to wishlist.");
                }
            );
    };
});
