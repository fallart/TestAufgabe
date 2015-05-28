var myApp=angular.module('adressBuchApp');
myApp.controller('mainController', function($scope) {

    this.phone = {

        name: 'Nokia Lumia 630',
        year: 2014,
        price: 200,
        company: {
            name: 'Nokia',
            country: 'Финляндия'
        }
    }
});
