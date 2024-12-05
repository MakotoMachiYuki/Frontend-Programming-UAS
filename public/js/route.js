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
        .when("/wishlist", {
            templateUrl: "/html/wishlist.html",
            controller: "WishlistController",
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
        })
        .when("/admin", {
            templateUrl: "/html/admin.html",
            controller: "AdminController",
            resolve: {
                adminAuth: function ($q, AuthService, $location) {
                    return AuthService.isAuthenticated().then(function (
                        isAuthenticated
                    ) {
                        if (isAuthenticated && AuthService.isAdmin()) {
                            return true;
                        } else {
                            $location.path("/profile");
                            return $q.reject("Not Authorized");
                        }
                    });
                },
            },
        })
        .when("/admin/edit-product/:productId", {
            templateUrl: "/html/edit-product.html",
            controller: "EditProductController",
            resolve: {
                adminAuth: function ($q, AuthService, $location) {
                    return AuthService.isAuthenticated().then(function (
                        isAuthenticated
                    ) {
                        if (isAuthenticated && AuthService.isAdmin()) {
                            return true;
                        } else {
                            $location.path("/login");
                            return $q.reject("Not Authorized");
                        }
                    });
                },
            },
        })
        .otherwise({
            redirectTo: "/",
        });
});

app.run(function ($rootScope, $window, $timeout) {
    $rootScope.$on("$routeChangeSuccess", function () {
        $timeout(function () {
            $window.scrollTo(0, 0);
        }, 10);
    });
});
