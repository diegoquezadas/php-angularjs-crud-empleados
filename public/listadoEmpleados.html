<!DOCTYPE html>
<html lang="es" ng-app="empleadosApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body ng-controller="EmpleadosController">
    <div class="container mt-5">
        <h1>Listado de Empleados</h1>
        <div class="mb-3">
            <button class="btn btn-primary" ng-click="crearEmpleado()">Agregar Empleado</button>
        </div>
        <input type="text" ng-model="filtroNombre" class="form-control mb-3" placeholder="Buscar por nombre...">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="empleado in empleados | filter:filtroNombre">
                    <td>{{ empleado.id }}</td>
                    <td>{{ empleado.nombre }}</td>
                    <td>{{ empleado.apellido }}</td>
                    <td>{{ empleado.cedula }}</td>
                    <td>{{ empleado.email }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" ng-click="editarEmpleado(empleado.id)">Editar</button>
                        <button class="btn btn-danger btn-sm" ng-click="eliminarEmpleado(empleado.id)">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
    angular.module('empleadosApp', [])
        .controller('EmpleadosController', ['$scope', '$http', function($scope, $http) {
            $scope.empleados = [];
            
            $scope.cargarEmpleados = function() {
                $http.get('/api/empleado').then(function(response) {
                    $scope.empleados = response.data;
                }, function(error) {
                    console.error('Error al recuperar los empleados:', error);
                });
            };

            $scope.cargarEmpleados(); // Cargar empleados al iniciar

            $scope.crearEmpleado = function() {
                // Lógica para agregar empleado
                window.location.href = '/path/to/view/empleados/create.php';
            };

            $scope.editarEmpleado = function(id) {
                // Lógica para editar empleado
                window.location.href = `/path/to/view/empleados/edit.php?id=${id}`;
            };

            $scope.eliminarEmpleado = function(id) {
                if (confirm('¿Está seguro de que desea eliminar este empleado?')) {
                    $http.delete(`/api/empleado/${id}`).then(function(response) {
                        // Recargar lista de empleados
                        $scope.cargarEmpleados();
                    }, function(error) {
                        console.error('Error al eliminar el empleado:', error);
                    });
                }
            };
        }]);
    </script>
</body>
</html>
