<!DOCTYPE html>
<html>
<head>
	<title>Sample</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

	
	<!-- Latest compiled and minified JavaScript -->
	

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>
<body ng-app="sample">
	<div class="container" ng-controller="SampleController">
		<div class="sample">
			<div class="row">
				<div class="col-md-4">
					<h1>Sample</h1>
				</div>
				<div class="col-md-4">
					
				</div>
				
				
			</div>
			<!-- <div class="row" >
				<div class="col-md-2">
					<h5>Name</h5>
				</div>
				<div class="col-md-2">
					<h5>Age</h5>
				</div>
				<div class="col-md-2">
					<h5>Location</h5>
				</div>
				<div class="col-md-2">
					<h5>Edit</h5>
				</div>
				<div class="col-md-2">
					<h5>Delete</h5>
				</div>
			</div> -->
			<div class="row" ng-repeat="getsample in data">
				<div class="col-md-2">
					<h5>{{getsample.Name}}</h5>
				</div>
				<div class="col-md-2">
					<h5>{{getsample.Age}}</h5>
				</div>
				<div class="col-md-2">
					<h5>{{getsample.Location}}</h5>
				</div>
				<div class="col-md-2">
					<h5 id="edit-"{{getsample.Id}} ng-click="edit(getsample.Id)" style="color:red;cursor:pointer;">Edit</h5>
				</div>
				<div class="col-md-2">
					<h5 id="delete-"{{getsample.Id}} ng-click="delete(getsample.Id)" style="color:red;cursor:pointer;">Delete</h5>
				</div>
			</div>
		</div>
		<div class="row" >
			<div class="col-md-2">
				<input type="text" placeholder="Name" class="form-control" ng-model="Name">
			</div>
			<div class="col-md-2">
				<input type="number" placeholder="Age" class="form-control" ng-model="Age">
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Location" class="form-control" ng-model="Location">
			</div>
			<div class="col-md-2" ng-show="add">
				<button type="button" class="btn btn-primary" ng-click="submitdetails()">Submit</button>
			</div>
			<div class="col-md-2" ng-show="update">
				<button type="button" class="btn btn-primary" ng-click="updatedetails(id)">Update</button>
			</div>
		</div>
		<!-- <div class="row" ng-show="update">
			<div class="col-md-2">
				<input type="text" placeholder="Name" class="form-control" ng-model="editname">
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Age" class="form-control" ng-model="editAge">
			</div>
			<div class="col-md-2">
				<input type="text" placeholder="Location" class="form-control" ng-model="editLocation">
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-primary" ng-click="Updatedetails()">Update</button>
			</div>
		</div> -->
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

	var app = angular.module("sample", []);
	app.controller("SampleController", function($scope, $http){
		

		$scope.data = [];
		$scope.count = 0;
		$scope.add = true;
		$scope.submitdetails = function(){
			var name = $scope.Name;
			var age = $scope.Age;
			var location = $scope.Location;
			var Count = $scope.count++;
			var dataform = {
				Name : name,
				Age : age,
				Location : location,
				Id : Count
			}
			console.log(dataform);

			$scope.data.push(dataform);
			console.log($scope.data);

			$scope.Name = '';
			$scope.Age = '';
			$scope.Location = '';
		}

		$scope.edit = function(id){
			$scope.Name = $scope.data[id].Name;
			$scope.Age = $scope.data[id].Age;;
			$scope.Location = $scope.data[id].Location;
			$scope.id = id;
			$scope.add = false;
			$scope.update = true;
		}

		$scope.delete = function(id){
			$scope.data.splice(id, 1);
			$scope.count--;
		}

		$scope.updatedetails = function(id){
			
			$scope.data[id].Name = $scope.Name;
			$scope.data[id].Age = $scope.Age;
			$scope.data[id].Location = $scope.Location;
			$scope.Name = '';
			$scope.Age = '';
			$scope.Location = '';
		}

		
	})
</script>
</html>