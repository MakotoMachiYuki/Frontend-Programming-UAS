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
                        console.log(response.data);
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
            console.log("Editing comment:", comment);
            $scope.editingComment = angular.copy(comment);
            console.log($scope.editingComment._id);
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
                url: "/api/comment/" + $scope.editingComment._id,
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
                    console.log("Update successful:", response.data);
                    const index = $scope.comments.findIndex(
                        (c) => c._id === response.data._id
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
                url: "/api/comment/" + commentId,
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            }).then(
                function (response) {
                    console.log("Comment deleted successfully");
                    $scope.comments = $scope.comments.filter(
                        (comment) => comment.id !== commentId
                    );
                },
                function (error) {
                    console.error("Error deleting comment:", error);
                    alert("There was an error deleting the comment.");
                }
            );
        };
    }
);
