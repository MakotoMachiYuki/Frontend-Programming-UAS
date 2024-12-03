app.controller("ProductDetailsController", [
    "$scope",
    "$http",
    "$location",
    function ($scope, $http, $location) {
        const productName = $location.absUrl().split("/").pop();
        $http
            .get(`/api/product/${productName}`)
            .then(function (response) {
                $scope.product = response.data;
            })
            .catch(function (error) {
                console.error("Error fetching product details:", error);
                $scope.error = "Unable to fetch product details.";
            });
    },
]);
