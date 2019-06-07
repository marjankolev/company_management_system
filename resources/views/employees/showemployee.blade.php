<!DOCTYPE html>
<html>
<head>
	<title>Employee {{ $employee->title }}</title>
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
			<div class="form-group col-sm-6">
				<h4>{{ $employee->name }}&nbsp;{{ $employee->surname }}</h4>
				<p>{{ $employee->email }}</p>
				<a href="/employees/{{ $employee->id }}/edit">
					<input type="button" class="btn btn-success" value="Edit Employee" />
				</a>
				<a href="/employees/{{ $employee->id }}/delete">
					<input type="button" class="btn btn-danger" value="Delete Employee" />
				</a>
				
			</div>
			<div class="form-group col-sm-6">
				<form method="POST" action="/employees/{{ $employee->id }}">
					@csrf
					<div class="form-group col-md-6">
						<h3>Assign any of the tasks to {{ $employee->name }}: </h3>
					</div>
					<div class="form-group col-md-6">
						<select name="task_selected" class="form-control">
							@foreach($tasks as $task)
								<option></option>
								<option value="{{ $task->id }}">{{ $task->title }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" class="btn btn-primary">Assign Task</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<div class="form-group col-sm-6">
	<h3>Tasks Assigned to {{ $employee->name }}: </h3>
</div>
<div class="container-fluid">
	<div class="row"> 
		@forelse($employee->tasks as $task)
			<div class="col-sm-3">
	    		<div class="card">
	      			<div class="card-body">
		        		<h5 class="card-title">{{ $task->title }}</h5>
		        		<a href="/tasks/{{ $task->id }}" class="btn btn-primary">Go to the Task</a>
	      			</div>
	    		</div><br>
	  		</div>
		@empty
			<div class="form-group col-sm-6">
				&nbsp;<b>{{ $employee->name }} still don't have any assignments!</b>
			</div> 
		@endforelse
	</div>
</div>

</body>
<div class="jumbotron text-center" style="margin-bottom:0">
    <b>All Rights Reserved - Werde 2019</b>
</div>
</html>
