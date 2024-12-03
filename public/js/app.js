const app = angular.module("gatGateApp", ["ngRoute"]);

app.config(function ($httpProvider) {
    $httpProvider.interceptors.push("csrfInterceptor");
});

app.filter("encodeURIComponent", function () {
    return function (input) {
        return encodeURIComponent(input);
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

app.config(function ($routeProvider) {
    $routeProvider
        .when("/", {
            templateUrl: "/html/homepage.html",
            controller: "HomepageController",
        })

        .when("/product/:productName", {
            templateUrl: "/html/product-detail.html",
            controller: "ProductDetailsController",
        })

        .otherwise({
            redirectTo: "/",
        });
});
