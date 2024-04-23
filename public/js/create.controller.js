// create.controller.js
angular.module('empleadosApp')
    .controller('CreateController', ['$scope', 'EmpleadoService', '$http', '$window', function ($scope, EmpleadoService, $http, $window) {
        // Función para inicializar el empleado desde el servicio y ajustar los datos
        function initEmpleado() {
            var empleado = EmpleadoService.getEmpleado() || {};

            if (empleado.fecha_nacimiento) {
                empleado.fecha_nacimiento = new Date(empleado.fecha_nacimiento);
            }

            if (empleado.fecha_ingreso) {
                empleado.fecha_ingreso = new Date(empleado.fecha_ingreso);
            }

            if (empleado.salario) {
                empleado.salario = parseFloat(empleado.salario);
            }

            $scope.empleado = empleado;
        }

        initEmpleado(); // Llamar a la función al cargar el controlador

        // Función para validar los datos del empleado
        function validarDatos() {
            console.log("Validando datos:", $scope.empleado);
            if (!$scope.empleado.nombre) {
                console.log("Validación fallida: Nombre es obligatorio.");
                alert('El nombre es obligatorio.');
                return false;
            }

            if ($scope.empleado.cedula && !$scope.empleado.cedula.match(/^\d{10}$/)) {
                console.log("Validación fallida: Cédula debe tener 10 dígitos.");
                alert('La cédula debe tener exactamente 10 dígitos.');
                return false;
            }

            console.log("Todas las validaciones pasaron.");
            return true; // Todas las validaciones pasaron
        }


        $scope.guardarEmpleado = function () {


            var isUpdating = $scope.empleado.id_empleado;
            var url = isUpdating
                ? `http://localhost/retoPersonas/public/index.php?controller=empleado&action=update&id=${$scope.empleado.id_empleado}`
                : 'http://localhost/retoPersonas/public/index.php?controller=empleado&action=store';

            $http({
                method: 'POST',
                url: url,
                data: $scope.empleado,
                headers: { 'Content-Type': 'application/json' }
            }).then(function (response) {
                alert(response.data.message);
                EmpleadoService.clearEmpleado();
                $window.location.href = '/retoPersonas/public/empleado';
            }, function (error) {
                alert('Error al guardar el empleado: ' + (error.data.message || 'Unknown error'));
            });
        };
    }]);

