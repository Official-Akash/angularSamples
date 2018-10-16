var app = angular.module('angularAssignment', []);
app.controller('angularCtrl', function($scope) {
    $scope.selpro = true;
    $scope.techni = true;
    $scope.analy = true;
    $scope.hrque = true;
    $scope.sugg = true;
    $scope.selection = function() {
        $scope.selpro = !$scope.selpro;
    };
    $scope.hr = function() {
        $scope.hrque = !$scope.hrque;
    };
    $scope.technical = function() {
        $scope.techni = !$scope.techni;
    };
    $scope.analytical = function() {
        $scope.analy = !$scope.analy;
    };
    $scope.suggestion = function() {
        $scope.sugg = !$scope.sugg;
    };

    $scope.checkedq = true;
    $scope.clear = function () {
        $scope.checkedq = false;
        $scope.selpro = false;
        $scope.techni = false;
        $scope.analy = false;
        $scope.hrque = false;
        $scope.sugg = false;
    };
    $scope.selct = function () {
        $scope.checkedq = true;
        $scope.selpro = true;
        $scope.techni = true;
        $scope.analy = true;
        $scope.hrque = true;
        $scope.sugg = true;
    };
});