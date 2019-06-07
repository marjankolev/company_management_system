<!DOCTYPE html>
<html>
<head>
	<title>Employees</title>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
      img {
        width: 42;
        height: 42;
      }
    </style>
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
  <div class="form-group col-md-6">
    <h4>All Employees in the Company</h4>
    <a class="btn btn-success" href="/employees/create">Create New Employee</a>
  </div>

<div class="container-fluid">
  <div class="row">
  @foreach ($employees as $employee)
    <div class="col-sm-3">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $employee->name }}</h5>
                <p class="card-text">{{ $employee->name }}&nbsp;{{ $employee->surname }}<br>
                  {{ $employee->email }}</p>
                <a href="/employees/{{ $employee->id }}" class="btn btn-primary">Go to the {{ $employee->name }} Profile</a>
              </div>
          </div><br>
      </div>
  @endforeach
  </div>
</div>
	<div class="jumbotron text-center" style="margin-bottom:0">
        <b>All Rights Reserved - Werde 2019</b>
	</div>
</body>
</html>
