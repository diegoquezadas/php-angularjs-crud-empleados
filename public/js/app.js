angular.module('empleadosApp', [])
.controller('EmpleadosController', ['$scope', '$http', function($scope, $http) {
    $scope.empleados = [];

    $http.get('/api/empleado').then(function(response) {
        $scope.empleados = response.data;
    }, function(error) {
        console.error('Error al recuperar los empleados:', error);
    });
}]);
