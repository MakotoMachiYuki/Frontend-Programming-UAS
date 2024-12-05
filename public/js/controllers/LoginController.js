app.controller(
    "LoginController",
    function ($scope, $http, $location, $httpParamSerializer, AuthService) {
        $scope.loginData = {
            email: "",
            password: "",
        };

        $scope.errorMessage = "";

        $scope.loginAccount = function () {
            const serializedData = $httpParamSerializer($scope.loginData);

            $http({
                method: "POST",
                url: "/login",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                data: serializedData,
            })
                .then(function (response) {
                    if (response.data.success) {
                        const user = response.data.user;
                        if (user) {
                            AuthService.setAuthenticated(user);

                            if (user.access === "admin") {
                                $location.path("/admin");
                            } else {
                                $location.path("/profile");
                            }
                        } else {
                            $scope.errorMessage =
                                "User information is missing from the server response.";
                        }
                    } else {
                        $scope.errorMessage =
                            response.data.message ||
                            "Invalid email or password.";
                    }
                })
                .catch(function (error) {
                    $scope.errorMessage =
                        "Login failed. Please check your credentials.";
                    console.error("Error during login:", error);
                });
        };
    }
);
