app.controller("HeaderController", [
    "$scope",
    "$timeout",
    "$http",
    function ($scope, $timeout, $http) {
        $scope.sidebarVisible = false;
        $scope.searchVisible = false;

        $scope.searchInput = "";
        $scope.foundProducts = [];

        $scope.toggleSidebar = function () {
            console.log("Toggling Sidebar");
            $scope.sidebarVisible = !$scope.sidebarVisible;

            if ($scope.sidebarVisible) {
                $("#sidebarMenu").css({
                    display: "flex",
                    opacity: "1",
                    transform: "translateX(0)",
                });
                attachClickListenerSidebar();
            } else {
                $("#sidebarMenu").css({
                    display: "none",
                    opacity: "0",
                    transform: "translateX(-100%)",
                });
                removeClickListenerSidebar();
            }
        };

        $http
            .get("/api/products")
            .then(function (response) {
                $scope.products = response.data;
            })
            .catch(function (error) {
                console.error("Error fetching products:", error);
            });

        $scope.toggleSearch = function () {
            console.log("Toggling Search");
            $scope.searchVisible = !$scope.searchVisible;

            $timeout(() => {
                if ($scope.searchVisible) {
                    $("#searchHeader").css({ display: "flex", opacity: "1" });
                    document.getElementById("searchInput").focus();
                    attachClickListenerSearch();
                } else {
                    $("#searchHeader").css({ display: "none", opacity: "0" });
                    $scope.searchInput = "";
                    $scope.foundProducts = [];
                    removeClickListenerSearch();
                }
            }, 0);
        };

        $scope.search = function () {
            const input = $scope.searchInput.trim().toLowerCase();
            console.log("Search input:", input);

            $scope.foundProducts = $scope.products.filter((product) =>
                product.productName.toLowerCase().includes(input)
            );
            console.log("Found products:", $scope.foundProducts);
        };

        $scope.noResults = function () {
            return $scope.searchInput && $scope.foundProducts.length === 0;
        };

        function attachClickListenerSearch() {
            $(document).on("click", handleOutsideClickSearch);
        }

        function removeClickListenerSearch() {
            $(document).off("click", handleOutsideClickSearch);
        }

        function attachClickListenerSidebar() {
            $(document).on("click", handleOutsideClickSidebar);
        }

        function removeClickListenerSidebar() {
            $(document).off("click", handleOutsideClickSidebar);
        }

        function handleOutsideClickSearch(event) {
            const $target = $(event.target);
            if (
                !$target.closest("#searchHeader").length &&
                !$target.is("#mainSearchGlassLogo")
            ) {
                $scope.$apply(() => {
                    $scope.searchVisible = false;
                    $("#searchHeader").css({ display: "none", opacity: "0" });
                    $scope.searchInput = "";
                    $scope.foundProducts = [];
                });
                removeClickListenerSearch();
            }
        }

        function handleOutsideClickSidebar(event) {
            const $target = $(event.target);
            if (
                !$target.closest("#sidebarMenu").length &&
                !$target.is("#menuToggle")
            ) {
                $scope.$apply(() => {
                    $scope.sidebarVisible = false;
                    $("#sidebarMenu").css({
                        display: "none",
                        opacity: "0",
                        transform: "translateX(-100%)",
                    });
                });
                removeClickListenerSidebar();
            }
        }
    },
]);
