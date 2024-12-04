app.controller(
    "LoginController",
    function ($scope, $http, $location, $httpParamSerializer) {
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
                        $location.path("/profile");
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
