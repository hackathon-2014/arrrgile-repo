angular.module('starter.controllers', [])

.controller('HomeCtrl', function($scope) {
})
.controller('CreateStoryCtrl', function($scope, $cordovaCamera) {
  $scope.takePicture = function() {
    var options = { 
        quality : 75, 
        destinationType : Camera.DestinationType.DATA_URL, 
        sourceType : Camera.PictureSourceType.CAMERA, 
        allowEdit : true,
        encodingType: Camera.EncodingType.JPEG,
        targetWidth: 100,
        targetHeight: 100,
        popoverOptions: CameraPopoverOptions,
        saveToPhotoAlbum: false
    };

    $cordovaCamera.getPicture(options).then(function(imageData) {
      // Success! Image data is here
    }, function(err) {
      // An error occured. Show a message to the user
    });
  }
})

.controller('MyStoriesCtrl', function($scope, Stories) {
  $scope.stories = Stories.all();
  console.log($scope.stories);
})
.controller('StoryCtrl', function($scope, $stateParams, Stories) {
	console.log('test');
  $scope.story = Stories.get($stateParams.storyId);
  console.log($scope.story);
})



.controller('FriendsCtrl', function($scope, Friends) {
  $scope.friends = Friends.all();
})

.controller('FriendDetailCtrl', function($scope, $stateParams, Friends) {
  $scope.friend = Friends.get($stateParams.friendId);
})

.controller('AccountCtrl', function($scope) {
});
