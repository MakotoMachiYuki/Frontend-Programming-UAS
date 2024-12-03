app.controller("ProfileController", function ($scope, $http) {
    $scope.user = {};

    $http
        .get("/api/profile")
        .then(function (response) {
            $scope.user = response.data;
        })
        .catch(function (error) {
            console.error("Error fetching profile:", error);
        });
});
