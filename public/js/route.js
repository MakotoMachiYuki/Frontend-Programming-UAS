app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "/html/homepage.html",
            controller: "HomepageController",
        })

        .when("/login", {
            templateUrl: "/html/login.html",
            controller: "LoginController",
        })

        .when("/signup", {
            templateUrl: "/html/signup.html",
            controller: "SignupController",
        })

        .when("/product/:productName", {
            templateUrl: "/html/product-detail.html",
            controller: "ProductDetailsController",
        })

        .when("/profile", {
            templateUrl: "/html/profile.html",
            controller: "ProfileController",
            resolve: {
                auth: function ($q, AuthService, $location) {
                    return AuthService.isAuthenticated().then(function (
                        isAuthenticated
                    ) {
                        if (isAuthenticated) {
                            return true;
                        } else {
                            $location.path("/login");
                            return $q.reject("Not Authenticated");
                        }
                    });
                },
            },
        });
});
