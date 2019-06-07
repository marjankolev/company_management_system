<!DOCTYPE html>
<html>
<head>
	<title>Project: {{ $project->title }}</title>
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
	<div class="container-fluid">
		<div class="row">
			<div class="form-group col-sm-4">
				<h4>{{ $project->title }}</h4>
				<p>{{ $project->description }}</p>
				<a href="/projects/{{ $project->id }}/edit">
					<input type="button" value="Edit Project" class="btn btn-primary" />
				</a>
				<a href="/projects/{{ $project->id }}/addtask" class="btn btn-success">Add New Task</a>
				<a href="/projects/{{ $project->id }}/delete" class="btn btn-danger"> Delete Project</a>
			</div>
			<div class="form-group col-sm-4">
				<h4>Alias Email for this project: </h4>
				<p>{{ $project->email }}</p>
				<p><b>** It's important to know that when E-mail is sent to above email address, new task automatically will be created.</b></p>
			</div>
			<div class="form-group col-sm-4">
				<h4>Number of tasks assigned to this project: </h4>
				<p>{{ count($project->tasks) }}</p>
			</div>
		</div>
	</div>
	<div class="form-group col-md-6">
		<h3>Tasks assigned to this project:</h3>
	</div>
	<div class="container-fluid">
		<div class="row">
		@forelse($project->tasks as $task)
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
		@empty
			<div class="col-sm-3">
				&nbsp;<b>There are still not any task/tasks assigned to the Project.</b>
			</div>
	  	@endforelse
	  	</div>
	</div>
</body>
<div class="jumbotron text-center" style="margin-bottom:0">
        <b>All Rights Reserved - Werde 2019</b>
	</div>
</html>
