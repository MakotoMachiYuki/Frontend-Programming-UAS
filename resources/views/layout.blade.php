<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/8724a9ccea.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.min.js"></script>
    <script src="js/app.js" defer></script>
    <script src="js/route.js" defer></script>
    <script src="js/controllers/Homepagecontroller.js" defer></script>
    <script src="js/controllers/HeaderController.js" defer></script>
    <script src="js/controllers/ProductDetailsController.js" defer></script>
    <script src="js/controllers/ProfileController.js" defer></script>
    <script src="js/controllers/LoginController.js" defer></script>
    <script src="js/controllers/SignupController.js" defer></script>
    <script src="js/controllers/WishlistController.js" defer></script>
    <script src="js/controllers/AdminController.js" defer></script>
    <script src="js/controllers/EditProductController.js" defer></script>
    <script src="js/controllers/SubscribeController.js" defer></script>



</head>

<body ng-app="gatGateApp">
    <div header></div>
    <div ng-view></div>
    <div footer></div>
</body>

</html>