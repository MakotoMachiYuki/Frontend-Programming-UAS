app.controller("SubscribeController", function ($scope, $http) {
    console.log("SubscribeController loaded");

    $scope.email = "";
    $scope.message = "";

    $scope.subscribe = function () {
        $http
            .post("/api/subscribe", { email: $scope.email })
            .then(function (response) {
                $scope.message = "Thank you for subscribing!";
                $scope.email = "";
                alert($scope.message);
            })
            .catch(function (error) {
                if (error.status === 400) {
                    $scope.message =
                        "Please enter a valid or non-registered email address.";
                    alert($scope.message);
                } else {
                    $scope.message = "An error occurred. Please try again.";
                    alert($scope.message);
                }
            });
    };
});
