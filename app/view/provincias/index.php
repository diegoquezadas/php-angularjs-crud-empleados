<!-- app/view/provincias/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Provincias</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" ng-app="provinciaApp" ng-controller="provinciaCtrl">
        <h1>Lista de Provincias</h1>
        <!-- Aquí puedes agregar el contenido dinámico generado por AngularJS -->
    </div>

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <!-- app/view/provincias/index.php -->

<!-- Resto del código HTML -->

    <div class="container" ng-app="provinciaApp" ng-controller="provinciaCtrl">
        <h1>Lista de Provincias</h1>
        <ul class="list-group">
            <li class="list-group-item" ng-repeat="provincia in provincias">
                {{ provincia.nombre }}
            </li>
        </ul>
    </div>

    <!-- AngularJS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script>
        var app = angular.module('provinciaApp', []);
        app.controller('provinciaCtrl', function($scope, $http) {
            // Lógica para obtener las provincias desde el servidor
            $http.get('api/provincia/index.php')
            .then(function(response) {
                $scope.provincias = response.data;
            });
        });
    </script>

</body>
</html>
