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

    $scope.comments = [];
        $http
            .get(`/api/product/${productName}/comments`)
            .then(function (response) {
                $scope.comments = response.data;
            })
            .catch(function (error) {
                console.error("Error fetching comments:", error);
                $scope.error = "Unable to fetch product comments.";
            });

        $scope.newComment = {
            user: "",
            content: ""
        };

        $scope.addComment = function () {
            if ($scope.newComment.content) {
                $http
                    .post(`/api/product/${productName}/comments`, $scope.newComment)
                    .then(function (response) {
                        $scope.comments.push(response.data);
                        $scope.newComment.content = ""; 
                    })
                    .catch(function (error) {
                        console.error("Error adding comment:", error);
                    });
            }
        };


    },
    
]);
