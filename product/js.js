var app = angular.module('StarterApp', ['ngMaterial']);
app.controller('AppCtrl', ['$scope', function($scope){

}]);
app.config(function($mdThemingProvider) {
$mdThemingProvider.theme('default')
	.primaryPalette('green')
	.accentPalette('lime');
});