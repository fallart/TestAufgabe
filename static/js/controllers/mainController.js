function mainController ($scope, $http) {
    $scope.titles = [
        'Vorname',
        'Nachname',
        'Postleitzahl',
        'Wohnort',
        'Aktion'
    ];
    $http({method:'GET', url:'database.php', params: {'action': 'get_all_records'}}).
        success(function(data) {
            console.log(data);
            $scope.records = data;
        });
}

angular
    .module('adressBuchApp', [])
    .controller('mainController', mainController);