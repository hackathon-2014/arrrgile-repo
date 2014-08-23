angular.module('starter.controllers', [])

.controller('HomeCtrl', function($scope) {
})
.controller('CreateStoryCtrl', function($scope) {
})


.controller('MyStoriesCtrl', function($scope, Stories) {
  $scope.stories = Stories.all();
  console.log($scope.stories);
})

.controller('StoryCtrl', function($scope, $stateParams, Stories) {
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
