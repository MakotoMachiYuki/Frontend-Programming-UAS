app.controller(
    "SignupController",
    function ($scope, $http, $location, $httpParamSerializer) {
        $scope.signupData = {
            firstName: "",
            lastName: "",
            email: "",
            password: "",
            password_confirm: "",
        };

        $scope.errorMessages = [];

        $scope.createAccount = function () {
            const serializedData = $httpParamSerializer($scope.signupData);

            $http({
                method: "POST",
                url: "/signup",
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
                        $location.path("!#/login");
                    } else {
                        $scope.errorMessages = response.data.errors;
                    }
                })
                .catch(function (error) {
                    console.error("Error during signup:", error);
                    $scope.errorMessages = [
                        "Failed to create an account. Please try again.",
                    ];
                });
        };
    }
);
