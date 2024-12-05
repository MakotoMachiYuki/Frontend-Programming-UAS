const app = angular.module("gatGateApp", ["ngRoute"]);

app.config(function ($httpProvider) {
    $httpProvider.interceptors.push("csrfInterceptor");
});

app.filter("encodeURIComponent", function () {
    return function (input) {
        return encodeURIComponent(input);
    };
});

app.service("AuthService", function ($http) {
    let user = null;

    // Method to check if user is authenticated and fetch user details
    this.isAuthenticated = function () {
        return $http.get("/api/auth-status").then(function (response) {
            user = response.data.user;
            return user;
        });
    };

    // Method to set the user after successful login
    this.setAuthenticated = function (userData) {
        user = userData;
    };

    // Method to get the user details
    this.getUser = function () {
        return user;
    };

    // Method to check if the user is an admin
    this.isAdmin = function () {
        return user && user.access === "admin";
    };
});

app.factory("csrfInterceptor", function ($q) {
    var csrfToken = document
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
