app.controller(
    "ProfileController",
    function ($scope, $http, $httpParamSerializer, $location) {
        $scope.user = {};
        $scope.isEditing = false;

        $http({
            method: "GET",
            url: "/api/profile",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        })
            .then(function (response) {
                console.log(response.data);
                if (response.data && typeof response.data.user === "object") {
                    $scope.user = response.data.user;
                } else {
                    console.error(
                        "Invalid profile data structure:",
                        response.data
                    );
                }
            })
            .catch(function (error) {
                console.error("Error fetching profile:", error);
            });

        $scope.enableEditing = function () {
            $scope.isEditing = true;
        };

        $scope.updateProfile = function () {
            $http({
                method: "PUT",
                url: "/api/profile/update",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                data: $httpParamSerializer($scope.user),
            })
                .then(function (response) {
                    alert("Profile updated successfully!");
                    $scope.isEditing = false;
                })
                .catch(function (error) {
                    console.error("Error updating profile:", error);
                    alert("Failed to update profile. Please try again.");
                });
        };

        $scope.logout = function () {
            $http({
                method: "POST",
                url: "/logout",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            })
                .then(function (response) {
                    clearBrowserData();
                    window.location.href = "/";
                })
                .catch(function (error) {
                    console.error("Error during logout:", error);
                });
        };

        $scope.deleteAccount = function () {
            if (
                confirm(
                    "Are you sure you want to delete your account? This action cannot be undone."
                )
            ) {
                $http({
                    method: "DELETE",
                    url: "/api/profile/delete",
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                })
                    .then(function (response) {
                        alert("Your account has been deleted successfully.");
                        clearBrowserData();
                        window.location.href = "/";
                    })
                    .catch(function (error) {
                        console.error("Error deleting account:", error);
                        alert(
                            "Failed to delete the account. Please try again."
                        );
                    });
            }
        };

        function clearBrowserData() {
            document.cookie.split(";").forEach(function (cookie) {
                var eqPos = cookie.indexOf("=");
                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                document.cookie =
                    name +
                    "=;expires=Thu, 01 Jan 2050 00:00:00 GMT;path=/;domain=" +
                    window.location.hostname;
            });

            localStorage.clear();
            sessionStorage.clear();
            if ("caches" in window) {
                caches.keys().then(function (names) {
                    for (let name of names) {
                        caches.delete(name);
                    }
                });
            }
        }
    }
);
