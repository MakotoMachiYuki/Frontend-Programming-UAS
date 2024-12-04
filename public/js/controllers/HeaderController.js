app.controller("HeaderController", [
    "$scope",
    function ($scope) {
        $scope.sidebarVisible = false;
        $scope.searchVisible = false;

        $scope.searchInput = "";
        $scope.foundProducts = [];
        $scope.toggleSidebar = function () {
            $timeout(() => {
                $scope.sidebarVisible = !$scope.sidebarVisible;
            });
        };
        $scope.closeSidebar = function () {
            console.log("Closing Sidebar");
            $scope.sidebarVisible = false;
        };

        $scope.toggleSearch = function () {
            console.log("Toggling Search");
            $scope.searchVisible = !$scope.searchVisible;
            if ($scope.searchVisible) {
                setTimeout(() => {
                    document.getElementById("searchInput").focus();
                }, 0);
            } else {
                $scope.searchInput = "";
                $scope.foundProducts = [];
            }
        };

        $scope.search = function () {
            const input = $scope.searchInput.trim().toLowerCase();
            console.log("Search input:", input);
            $scope.foundProducts = $scope.productsSearch.filter((product) =>
                product.name.toLowerCase().includes(input)
            );
            console.log("Found products:", $scope.foundProducts);
        };

        $scope.noResults = function () {
            return $scope.searchInput && $scope.foundProducts.length === 0;
        };

        $scope.toggleDropdown = function (event) {
            const dropdown = angular.element(event.currentTarget).next();
            const isVisible = dropdown.hasClass("open");

            angular.element(".dropDownContent").removeClass("open").slideUp();

            if (!isVisible) {
                dropdown.addClass("open").slideDown();
            }
        };
    },
]);
