

var app = angular.module('todoApp', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('todoController', function($scope, $http) {

    $scope.todos = [];
    $scope.loading = false;

    $scope.init = function() {
        $scope.loading = true;
        $http.get('api/todos').
            success(function(data, status, headers, config) {
                $scope.todos = data;
                $scope.loading = false;
                console.log(data);
            });
    }

    $scope.addTodo = function(todo) {
        $scope.loading = true;

        //$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

        console.log(todo);
        $http.post('api/todos', {
            title: $scope.todo.title,
            //done: $scope.todo.done
        }).success(function(data, status, headers, config) {
            $scope.todos.push(data);
            $scope.todo.title = '';
            $scope.loading = false;
            console.log(data);
        }).error(function(data, status) { // called asynchronously if an error occurs
            // or server returns response with an error status.
            $scope.errors.push(status);
            console.log('error');
        });
    };

    $scope.updateTodo = function(todo) {
        $scope.loading = true;

        $http.put('api/todos/' + todo.id, {
            title: todo.title,
            done: todo.done
        }).success(function(data, status, headers, config) {
            todo = data;
            $scope.loading = false;

        });;
    };

    $scope.deleteTodo = function(index) {
        $scope.loading = true;

        var todo = $scope.todos[index];

        $http.delete('api/todos/' + todo.id)
            .success(function() {
                $scope.todos.splice(index, 1);
                $scope.loading = false;
            });;
    };

    $scope.init();

});

