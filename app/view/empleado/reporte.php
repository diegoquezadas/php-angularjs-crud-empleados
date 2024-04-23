<!DOCTYPE html>
<html lang="es" ng-app="empleadosApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Empleados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="../../../public/js/app.js"></script>
    <script src="../../../public/js/services.js"></script>
    <script src="../../../public/js/EmpleadoController.js"></script>
    <style>
        .container {
            margin-top: 20px;
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .btn-group {
            margin-top: 20px;
        }
        .blue-label {
            color: #007bff; /* mismo azul usado en el título */
        }
    </style>
</head>
<body ng-controller="EmpleadoController">
    <div class="container">
        <h1 class="text-center">Reporte de Empleados</h1>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="ordenSeleccionado" class="form-label blue-label">Ordenar reporte por:</label>
                <select class="form-control" id="ordenSeleccionado" ng-model="ordenSeleccionado">
                    <option value="id_empleado">ID</option>
                    <option value="nombre">Nombre</option>
                    <option value="apellido">Apellido</option>
                    <option value="cedula">Cédula</option>
                    <option value="id_provincia">Provincia</option>
                    <option value="fecha_nacimiento">Fecha de Nacimiento</option>
                    <option value="email">Email</option>
                    <option value="cargo">Cargo</option>
                    <option value="salario">Salario</option>
                </select>
            </div>
        </div>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Provincia</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Observaciones</th>
                    <th>Fotografía</th>
                    <th>Fecha de Ingreso</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Observaciones Ficha</th>
                    <th>Provincia de Cargo</th>
                    <th>Jornada Parcial</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="empleado in empleados | orderBy: ordenSeleccionado">
                    <td>{{ empleado.id_empleado }}</td>
                    <td>{{ empleado.nombre }}</td>
                    <td>{{ empleado.apellido }}</td>
                    <td>{{ empleado.cedula }}</td>
                    <td>{{ empleado.id_provincia }}</td>
                    <td>{{ empleado.fecha_nacimiento | date:'yyyy-MM-dd' }}</td>
                    <td>{{ empleado.email }}</td>
                    <td>{{ empleado.observaciones }}</td>
                    <td>{{ empleado.ruta_fotografia }}</td>
                    <td>{{ empleado.fecha_ingreso | date:'yyyy-MM-dd' }}</td>
                    <td>{{ empleado.cargo }}</td>
                    <td>{{ empleado.salario | currency }}</td>
                    <td>{{ empleado.observaciones_ficha }}</td>
                    <td>{{ empleado.id_provincia_cargo }}</td>
                    <td>{{ empleado.jornada_parcial ? 'Sí' : 'No' }}</td>
                </tr>
            </tbody>
        </table>
        <div class="btn-group d-flex justify-content-center">
            <button class="btn btn-danger" ng-click="salir()">Salir</button>
        </div>
    </div>
</body>
</html>
