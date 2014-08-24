angular.module('starter.services', [])

/**
 * A simple example service that returns some data.
 */
.factory('Friends', [function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var friends = [
    { id: 0, name: 'Scruff McGruff' },
    { id: 1, name: 'G.I. Joe' },
    { id: 2, name: 'Miss Frizzle' },
    { id: 3, name: 'Ash Ketchum' }
  ];

  return {
    all: function() {
      return friends;
    },
    get: function(friendId) {
      // Simple index lookup
      return friends[friendId];
    }
  }
}])


.factory('Stories', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var stories = [
    { 
      id: 0, 
      name: 'My Great Story',
      replies: [
        { id: 1, text: 'The story begins with', file_name: 'http://placehold.it/300x300' },
        { id: 2, text: 'more of the story', file_name: 'http://placehold.it/300x300' },
        { id: 3, text: 'and then something happened', file_name: 'http://placehold.it/300x300' },
        { id: 4, text: 'and then the end', file_name: 'http://placehold.it/300x300' }
      ]
    },
    { 
      id: 1, 
      name: 'Once Upon a Time..',
      replies: [
        { id: 1, message: 'in the woods'}
      ]
    },
    { 
      id: 2, 
      name: 'What had happened was..',
      replies: [
        { id: 1, message: 'i went to walmart'}
      ] 
    },
    { 
      id: 3, 
      name: 'This one time at bandcamp...',
      replies: [
        { id: 1, message: 'there was a trumpet'}
      ]
    }
  ];

  return {
    all: function() {
      return stories;
    },
    get: function(storyId) {
      // Simple index lookup
      return stories[storyId];
    }
  }
})

.factory('StoriesService', ['$resource', '$http', '$rootScope', function($resource, $http, $rootScope) {
      $http.defaults.useXDomain = true;
      return $resource($rootScope.apiServer+'/api/story/:id', { callback: 'JSON_CALLBACK' }, {
      query: { method: 'JSONP', params:null, isArray: true},
      get: { method: 'JSONP', params:null},
      save: { method: 'POST', params:null}
    });
  }]
);
// headers: {'Content-Type': 'application/json'}

;