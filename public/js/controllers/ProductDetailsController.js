app.controller(
    "ProductDetailsController",
    function ($scope, $routeParams, $http, AuthService) {
        $scope.productName = $routeParams.productName;
        $scope.comments = [];
        $scope.newComment = { user: "", content: "" };
        $scope.error = "";
        $scope.isLoggedIn = false;
        $scope.user = {};
        $scope.editingComment = null;

        $scope.goToSlide = function (index) {
            $("#productImageCarousel").carousel(index);
        };

        AuthService.isAuthenticated().then(function (isAuthenticated) {
            $scope.isLoggedIn = isAuthenticated;
            if (isAuthenticated) {
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
                        if (
                            response.data &&
                            typeof response.data.user === "object"
                        ) {
                            $scope.user = response.data.user;
                            $scope.newComment.user_name =
                                $scope.user.firstName +
                                " " +
                                $scope.user.lastName;
                            $scope.newComment.user_email = $scope.user.email;
                        } else {
                            console.error(
                                "Invalid profile data structure:",
                                response.data
                            );
                        }
                    })
                    .catch(function (error) {
                        console.error("Error fetching profile:", error);
                    });
            }
        });

        $http.get("/api/product/" + $scope.productName).then(
            function (response) {
                $scope.product = response.data;
            },
            function (error) {
                $scope.error = "Product not found";
            }
        );

        $http
            .get("/api/product/" + $scope.productName + "/comments")
            .then(function (response) {
                $scope.comments = response.data;
            });

        $scope.addComment = function () {
            if (!$scope.isLoggedIn) {
                alert("You must be logged in to comment!");
                return;
            }

            if ($scope.newComment.content.trim() === "") {
                alert("Comment content cannot be empty");
                return;
            }

            $scope.newComment.user_name =
                $scope.user.firstName + " " + $scope.user.lastName;
            $scope.newComment.user_email = $scope.user.email;

            $http
                .post(
                    "/api/product/" + $scope.productName + "/comments",
                    $scope.newComment
                )
                .then(
                    function (response) {
                        $scope.comments.push(response.data);
                        $scope.newComment.content = "";
                    },
                    function (error) {
                        alert("There was an error posting your comment.");
                    }
                );
        };

        $scope.startEditing = function (comment) {
            $scope.editingComment = angular.copy(comment);
        };
        $scope.cancelEditing = function () {
            $scope.editingComment = null;
        };

        $scope.updateComment = function () {
            if (!$scope.editingComment.content.trim()) {
                alert("Comment content cannot be empty");
                return;
            }

            $http({
                method: "PUT",
                url: "/api/comment/" + $scope.editingComment._id + "/update",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                data: {
                    content: $scope.editingComment.content,
                },
            }).then(
                function (response) {
                    const index = $scope.comments.findIndex(
                        (c) => c.id === response.data.id
                    );
                    if (index !== -1) {
                        $scope.comments[index] = response.data;
                    }
                    $scope.editingComment = null;
                },
                function (error) {
                    console.error("Error updating comment:", error);
                    alert("There was an error updating your comment.");
                }
            );
        };

        $scope.deleteComment = function (commentId) {
            if (!confirm("Are you sure you want to delete this comment?")) {
                return;
            }

            $http({
                method: "DELETE",
                url: "/api/comment/" + commentId + "/delete",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            }).then(
                function (response) {
                    $scope.comments = $scope.comments.filter(
                        (comment) => comment._id !== commentId
                    );
                },
                function (error) {
                    console.error("Error deleting comment:", error);
                    console.error("Response data:", error.data);
                    alert("There was an error deleting the comment.");
                }
            );
        };

        $scope.addToWishlist = function (product) {
            AuthService.isAuthenticated().then(function (isAuthenticated) {
                if (isAuthenticated) {
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
                            if (
                                response.data &&
                                typeof response.data.user === "object"
                            ) {
                                const userId = response.data.user._id;

                                $http.get("/api/wishlist/" + userId).then(
                                    function (response) {
                                        let wishlist = response.data;

                                        if (
                                            wishlist.products.includes(
                                                product._id
                                            )
                                        ) {
                                            alert(
                                                "This product is already in your wishlist."
                                            );
                                        } else {
                                            addProductToWishlist(
                                                product._id,
                                                userId
                                            );
                                        }
                                    },
                                    function (error) {
                                        alert("Failed to fetch wishlist.");
                                    }
                                );
                            } else {
                                console.error(
                                    "Invalid profile data structure:",
                                    response.data
                                );
                                alert(
                                    "Failed to retrieve user profile. Please try again."
                                );
                            }
                        })
                        .catch(function (error) {
                            console.error("Error fetching profile:", error);
                            alert("Failed to fetch user profile.");
                        });
                } else {
                    alert("Please log in to add products to your wishlist.");
                }
            });
        };

        function addProductToWishlist(productId, userId) {
            $http.put("/api/wishlist/" + userId + "/" + productId).then(
                function (response) {
                    alert("Product added to wishlist successfully!");
                },
                function (error) {
                    alert("Failed to add product to wishlist.");
                }
            );
        }

        function addProductToWishlist(productId, userId) {
            $http.put("/api/wishlist/" + userId + "/" + productId).then(
                function (response) {
                    alert("Product added to wishlist successfully!");
                },
                function (error) {
                    alert("Failed to add product to wishlist.");
                }
            );
        }
    }
);
