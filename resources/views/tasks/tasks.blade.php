<!DOCTYPE html>
<html>
<head>
	<title>Tasks Page</title>
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
  <div class="form-group col-md-6">
      <h4>All the tasks in the company</h4>
      <a class="btn btn-success" href="/tasks/create">Create New Task</a>
    </div>
  <div class="container-fluid">
    <div class="row">
      @foreach ($tasks as $task)
      <div class="col-sm-3">
          <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text">{{ $task->description }}<br>
                  @if($task->estimation == 1)
                    <b>Estimation:</b> {{ $task->estimation }} Hour</p>
                  @else
                    <b>Estimation:</b> {{ $task->estimation }} Hours</p>
                  @endif
                  
                <a href="/tasks/{{ $task->id }}" class="btn btn-primary">Go to the Task</a>
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
