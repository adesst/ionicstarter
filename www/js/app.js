// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic','ui.router'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

.controller('Starter',['$scope','$state', function($scope, $state){
    $scope.openLogin = function(user){
        console.log("Run openLogin");
        $state.go('login', { reload:true});
    };       
}])

.controller('Home',['$scope','$state', function($scope, $state){

    $("#bar-title").html("Home");
}])

.controller('Login',['$scope','$state', function($scope, $state){

    $("#bar-title").html("Login");
}])

.controller('Signup',['$scope','$state', function($scope, $state){


}])

.config( function($stateProvider, $urlRouterProvider){
    $stateProvider       
        .state('/',{
            url : '/',
            templateUrl : 'templates/landedpage.html',
        })
        .state('signup',{
            url : '/signup',
            templateUrl : 'templates/signup.html',
            controller : 'Signup'
        })
        .state('login',{
            url : '/login',
            templateUrl : 'templates/login.html',
            controller : 'Login'
        });          
    $urlRouterProvider.otherwise('/');
})

