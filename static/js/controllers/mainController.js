function mainController ($scope, $http) {
    $scope.titles = [
        'Vorname',
        'Nachname',
        'Postleitzahl',
        'Wohnort',
        'Aktion'
    ];

    $scope.init = function(){
        $http({method:'GET', url:'database.php', params: {'action': 'get_records'}}).
            success(function(data) {
                $scope.records = data;
            });
    };

    $scope.changeAktiv = function(id){
        $http({method:'GET', url:'database.php', params: {'action': 'change_aktiv', 'id':id}}).
            success(function(data) {
                $scope.init();
            });
    };

    $scope.filter = function(vorname, nachname, postleitzahl, wohnort){
        $http({method:'GET', url:'database.php', params: {'action': 'get_records', 'vorname':vorname, 'nachname':nachname, 'postleitzahl':postleitzahl, 'wohnort':wohnort}}).
            success(function(data) {
                $scope.records = data;
            });
    };
}

angular
    .module('adressBuchApp', [])
    .controller('mainController', mainController);