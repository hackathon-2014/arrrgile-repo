angular.module('starter.services', [])

/**
 * A simple example service that returns some data.
 */
.factory('Friends', function() {
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
})


.factory('Stories', function() {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
  var stories = [
    { 
      id: 1, 
      name: 'My Great Story',
      replies: [
        { id: 1, message: 'The story begins with'}
      ]
    },
    { 
      id: 2, 
      name: 'Once Upon a Time..',
      replies: [
        { id: 1, message: 'in the woods'}
      ]
    },
    { 
      id: 3, 
      name: 'What had happened was..',
      replies: [
        { id: 1, message: 'i went to walmart'}
      ] 
    },
    { 
      id: 4, 
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

;