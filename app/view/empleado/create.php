<!DOCTYPE html>
<html lang="es" ng-app="empleadosApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../../public/js/app.js"></script>
    <script src="../../../public/js/services.js"></script>
    <script src="../../../public/js/create.controller.js"></script>
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
    </style>
</head>

<body ng-controller="CreateController">
    <form name="formEmpleado" novalidate>
        <div class="container">
            <h1 class="text-center">Módulo de Empleados</h1>
            <h1 class="text-center">CREAR EMPLEADO NUEVO</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#datosPersonales">Datos Personales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#datosLaborales">Datos Laborales</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Pestaña Datos Personales -->
                <div id="datosPersonales" class="tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="nombres">Nombres:</label>
                            <input type="text" class="form-control" id="nombres" ng-model="empleado.nombre">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" ng-model="empleado.apellido">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="cedula">Cédula: (Valida)</label>
                            <input type="text" class="form-control" id="cedula" ng-model="empleado.cedula">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="provincia">Provincia:</label>
                            <select class="form-control" id="provincia" ng-model="empleado.id_provincia"
                                ng-options="provincia.id_provincia as provincia.nombre_provincia for provincia in provincias">
                                <option value="">Escoja una provincia...</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fechaNacimiento"
                                ng-model="empleado.fecha_nacimiento">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="email">Email: (Valida)</label>
                            <input type="email" class="form-control" id="email" ng-model="empleado.email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="observaciones">Observaciones:</label>
                            <textarea class="form-control" id="observaciones"
                                ng-model="empleado.observaciones"></textarea>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="fotografia">Fotografía:</label>
                            <input type="file" class="form-control-file" id="fotografia" ng-model="empleado.fotografia">
                        </div>
                    </div>
                </div>
                <!-- Pestaña Datos Laborales -->
                <div id="datosLaborales" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-3 form-group">

                            <label for="fechaIngreso">Fecha de Ingreso:</label>
                            <input type="date" class="form-control" id="fechaIngreso" ng-model="empleado.fecha_ingreso">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="cargo">Cargo:</label>
                            <input type="text" class="form-control" id="cargo" ng-model="empleado.cargo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="idProvinciaCargo">Provincia de Cargo:</label>
                            <select class="form-control" id="idProvinciaCargo" ng-model="empleado.id_provincia_cargo">
                                <option value="">Escoja una provincia...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="salario">Salario:</label>
                            <input type="number" class="form-control" id="salario" ng-model="empleado.salario">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Jornada Parcial:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jornadaParcial" id="jornadaParcialSi"
                                    value="true" ng-model="empleado.jornada_parcial" ng-value="true">
                                <label class="form-check-label" for="jornadaParcialSi">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jornadaParcial" id="jornadaParcialNo"
                                    value="false" ng-model="empleado.jornada_parcial" ng-value="false">
                                <label class="form-check-label" for="jornadaParcialNo">
                                    No
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="observacionesFicha">Observaciones Ficha:</label>
                            <textarea class="form-control" id="observacionesFicha"
                                ng-model="empleado.observaciones_ficha"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="btn-group d-flex justify-content-center">
                <button class="btn btn-success mr-3" ng-click="guardarEmpleado()">Guardar Empleado</button>
                <button class="btn btn-warning mr-3"
                    onclick="window.location.href = 'http://localhost/retoPersonas/public/empleado';">Listado
                    Empleados</button>
                <button class="btn btn-danger" ng-click="salir()">Salir</button>
            </div>
        </div>
    </form>
</body>


</html>