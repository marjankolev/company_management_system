<!DOCTYPE html>
<html>
<head>
	<title>Create an Employee</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="jumbotron text-center" style="margin-bottom:0">
  		<a href="/" style="color:inherit; text-decoration: none;">
        <h1>Company Management System</h1>
        <h3>Welcome to our Company Management System.</h3>
      </a>
	</div>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  		<a class="navbar-brand" href="/">Home</a>
  		<ul class="navbar-nav">
  			<li class="nav-item">
  				<a class="nav-link" href="/projects">Projects</a>
  			</li>
  			<li class="nav-item">
  				<a class="nav-link" href="/tasks">Tasks</a>
  			</li>
  			<li class="nav-item">
  				<a class="nav-link" href="/employeess">Employees</a>
  			</li>
  			<li class="nav-item">
  				<a class="nav-link" href="/leaves">Leaves</a>
  			</li>
  		</ul>
	</nav><br>
<form method="POST" action="/employees">
	@csrf
	<div class="form-group col-md-6">
		<label for="project_name">Employee Name:</label>
  		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group col-md-6">
		<label for="project_name">Employee Surname:</label>
  		<input type="text" name="surname" class="form-control">
	</div>
	<div class="form-group col-md-6">
		<label for="project_name">Employee Email:</label>
  		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="/employees/" class="btn btn-danger">Cancel</a>
	</div>
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
            @endforeach
          </ul>
    </div>
  @endif
</form>
<div class="jumbotron text-center" style="margin-bottom:0">
        <b>All Rights Reserved - Werde 2019</b>
	</div>
</body>
</html>
