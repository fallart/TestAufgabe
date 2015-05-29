function UserService () {
    this.sayHello = function (name) {
        return 'Привет тебе ' + name;
    };
}

angular
    .module('adressBuchApp')
    .service('UserService', UserService);