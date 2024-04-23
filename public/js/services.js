// services.js
angular.module('empleadosApp').factory('EmpleadoService', ['$window', function($window) {
    var storageKey = 'empleadoData';

    return {
        getEmpleado: function() {
            var data = $window.sessionStorage.getItem(storageKey);
            return data ? JSON.parse(data) : {};
        },
        setEmpleado: function(empleado) {
            $window.sessionStorage.setItem(storageKey, JSON.stringify(empleado));
        },
        clearEmpleado: function() {
            $window.sessionStorage.removeItem(storageKey);
        }
    };
}]);
