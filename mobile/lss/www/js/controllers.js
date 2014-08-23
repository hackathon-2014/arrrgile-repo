angular.module('starter.controllers', [])

.controller('HomeCtrl', ['$scope', 'Stories', 'StoriesService', function($scope, Stories, StoriesService) {
  $scope.currentType = 'all';
  $scope.typeLabel = 'My Stories';
  $scope.stories = [];

  $scope.toggleStories = function() {
    if ($scope.currentType === 'all'){
      $scope.currentType = 'me';
      $scope.typeLabel = 'All Stories';
    } else {
      $scope.currentType = 'all';
      $scope.typeLabel = 'My Stories';
    }
    loadData();
  }

  function loadData() {
    //$scope.stories = Stories.all();
    
    $scope.stories = StoriesService.query(function() {
      console.log('stories',$scope.stories);
    });
      console.log('stories',$scope.stories);
  }
  loadData();

}])
.controller('CreateStoryCtrl', ['$scope', '$cordovaCamera', '$cordovaGeolocation', 'StoriesService', function($scope, $cordovaCamera, $cordovaGeolocation, StoriesService) {

	$scope.form = {};

  $cordovaGeolocation.getCurrentPosition().then(function(position) {
      // Position here: position.coords.latitude, position.coords.longitude
      console.log(position);
      $scope.form.location_current_lat = position.coords.latitude;
      $scope.form.location_current_long = position.coords.longitude;
    }, function(err) {
      // error
    });

  var watch = $cordovaGeolocation.watchPosition({
    frequency: 1000
  });

  watch.promise.then(function() {
      // Not currently used
    }, function(err) {
      // An error occured. Show a message to the user
    }, function(position) {
      // Active updates of the position here
    	console.log(position);
      $scope.form.location_current_lat = position.coords.latitude;
      $scope.form.location_current_long = position.coords.longitude;
  });

  $scope.takePicture = function() {
    var options = { 
        quality : 75, 
        destinationType : Camera.DestinationType.DATA_URL, 
        sourceType : Camera.PictureSourceType.PHOTOLIBRARY, //CAMERA, 
        allowEdit : true,
        encodingType: Camera.EncodingType.JPEG,
        targetWidth: 500,
        targetHeight: 500,
        popoverOptions: CameraPopoverOptions,
        saveToPhotoAlbum: false
    };

    $cordovaCamera.getPicture(options).then(function(imageData) {
      // Success! Image data is here
      console.log(imageData);
      $scope.form.file_name = imageData;
    }, function(err) {
      // An error occured. Show a message to the user
    });
  }

  $scope.createStory = function() {
  	console.log('form', $scope.form)

    StoriesService.save($scope.form);
  }
}])

.controller('MyStoriesCtrl', ['$scope', 'Stories', function($scope, Stories) {
  $scope.stories = Stories.all();
  console.log($scope.stories);
}])
.controller('StoryCtrl', ['$scope', '$stateParams', 'Stories', 'StoriesService', function($scope, $stateParams, Stories, StoriesService) {
	console.log('test');
  //$scope.story = Stories.get($stateParams.storyId);
  $scope.story = StoriesService.get({id:$stateParams.storyId},function() {
      console.log('stories',$scope.story);
    });
  console.log($scope.story);
}])



.controller('FriendsCtrl', ['$scope', 'Friends', function($scope, Friends) {
  $scope.friends = Friends.all();
}])

.controller('FriendDetailCtrl', ['$scope', '$stateParams', 'Friends', function($scope, $stateParams, Friends) {
  $scope.friend = Friends.get($stateParams.friendId);
}])

.controller('AccountCtrl', [function($scope) {
}]);
