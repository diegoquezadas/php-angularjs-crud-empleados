// EmpleadoController.js
angular.module('empleadosApp')
    .controller('EmpleadoController', ['$scope', '$http', '$window', 'EmpleadoService', function ($scope, $http, $window, EmpleadoService) {
        $scope.empleados = [];
        $scope.provincias = [];

        function cargarProvincias() {
            $http.get('http://localhost/retoPersonas/public/index.php?controller=provincia&action=index').then(function (response) {
                $scope.provincias = response.data;
                console.log("Provincias cargadas:", $scope.provincias);
            }, function (error) {
                console.error('Error al cargar provincias:', error);
            });
        }

        $scope.cargarEmpleados = function () {
            $http.get('http://localhost/retoPersonas/api/empleado/index.php').then(function (response) {
                $scope.empleados = response.data;
            }, function (error) {
                console.error('Error al recuperar los empleados:', error);
            });
        };

        $scope.generarReporte = function () {
            $window.location.href = '/retoPersonas/app/view/empleado/reporte.php';
        };

        $scope.salir = function () {
            $window.location.href = 'http://localhost/retoPersonas/public/empleado';
        };

        $scope.editarEmpleado = function (empleado) {
            EmpleadoService.setEmpleado(empleado);
            $window.location.href = '/retoPersonas/app/view/empleado/create.php';
        };

        $scope.crearEmpleado = function () {
            EmpleadoService.setEmpleado({});
            $window.location.href = '/retoPersonas/app/view/empleado/create.php';
        };

        $scope.cargarEmpleados(); // Carga inicial de empleados
    }]);


