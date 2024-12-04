app.controller(
    "ProductDetailsController",
    function ($scope, $routeParams, $http, AuthService) {
        $scope.productName = $routeParams.productName;
        $scope.comments = [];
        $scope.newComment = { user: "", content: "" };
        $scope.error = "";
        $scope.isLoggedIn = false;
        $scope.user = {};

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
                            $scope.newComment.user_email = $scope.email;
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
    }
);
