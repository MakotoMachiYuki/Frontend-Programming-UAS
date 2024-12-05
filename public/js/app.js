const app = angular.module("gatGateApp", ["ngRoute"]);

app.config(function ($httpProvider) {
    $httpProvider.interceptors.push("csrfInterceptor");
});

app.filter("encodeURIComponent", function () {
    return function (input) {
        return encodeURIComponent(input);
    };
});

app.factory("AuthService", function ($http, $q) {
    var currentUser = null;
app.factory("AuthService", function ($http, $q) {
    let currentUser = JSON.parse(localStorage.getItem("currentUser")) || null;

    return {
        isAuthenticated: function () {
            let deferred = $q.defer();

            $http.get("/api/auth/check").then(
                function (response) {
                    if (response.data.isAuthenticated) {
                        currentUser = response.data.user;
                        deferred.resolve(true);
                    } else {
                        deferred.resolve(false);
                    }
                },
                function () {
                    deferred.resolve(false);
                }
            );
            if (currentUser) {
                deferred.resolve(true);
            } else {
                $http.get("/api/auth/check").then(
                    function (response) {
                        if (response.data.isAuthenticated) {
                            currentUser = response.data.user;
                            localStorage.setItem(
                                "currentUser",
                                JSON.stringify(currentUser)
                            );
                            deferred.resolve(true);
                        } else {
                            deferred.resolve(false);
                        }
                    },
                    function () {
                        // This block is triggered if there's a 401 or any other error
                        deferred.resolve(false);
                    }
                );
            }

            return deferred.promise;
        },

        setAuthenticated: function (user) {
            currentUser = user;
            localStorage.setItem("currentUser", JSON.stringify(currentUser));
        },

        getUser: function () {
            return currentUser;
        },
    };
});

app.factory("csrfInterceptor", function ($q) {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    return {
        request: function (config) {
            if (
                config.method === "POST" ||
                config.method === "PUT" ||
                config.method === "DELETE" ||
                config.method === "PATCH"
            ) {
                config.headers["X-CSRF-TOKEN"] = csrfToken;
            }
            return config;
        },

        responseError: function (rejection) {
            return $q.reject(rejection);
        },
    };
});

app.directive("header", function () {
    return {
        restrict: "A",
        replace: true,
        templateUrl: "./html/header.html",
        controller: "HeaderController",
    };
});

app.directive("footer", function () {
    return {
        restrict: "A",
        replace: true,
        templateUrl: "./html/footer.html",
    };
});
