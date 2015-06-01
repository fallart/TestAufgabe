function mainController ($scope, $http) {
    $scope.titles = [
        'Vorname',
        'Nachname',
        'Postleitzahl',
        'Wohnort',
        'Aktion'
    ];
	
	$scope.message = '';

    $scope.init = function(){
        $http({method:'GET', url:'database.php', params: {'action': 'get_records'}}).
            success(function(data) {
				if(data['result'] == 'ok'){
					console.log(data);
					$scope.records = angular.fromJson(data['data']);
					console.log($scope.records);
				}
				else if(data['result'] == 'fail'){
					$scope.message = data['reason'];
				}
            });
    };

    $scope.changeAktiv = function(id){
        $http({method:'GET', url:'database.php', params: {'action': 'change_aktiv', 'id':id}}).
            success(function() {
                $scope.init();
            });
    };

    $scope.filter = function(vorname, nachname, postleitzahl, wohnort){
        $http({method:'GET', url:'database.php', params: {'action': 'get_records', 'vorname':vorname, 'nachname':nachname, 'postleitzahl':postleitzahl, 'wohnort':wohnort}}).
            success(function(data) {
				if (data['result'] == 'ok') {
					$scope.records = angular.fromJson(data['data']);
				}
				else if (data['result'] == 'fail') {
					$scope.message = data['reason'];
				}
            });
    };

    $scope.reset = function (form) {
        if(form){
            form.$setPristine();
            form.$setUntouched();
        }
        $scope.vorname = '';
        $scope.nachname = '';
        $scope.postleitzahl = '';
        $scope.wohnort = '';
        $scope.init();
    }
}

angular
    .module('adressBuchApp', [])
    .controller('mainController', mainController);