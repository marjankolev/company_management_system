<!DOCTYPE html>
<html>
<head>
	<title>Task: {{ $task->title }}</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		.nounderline {
  			text-decoration: black !important;
  			color: black;
  			text-decoration-color: black;
		}

		a:hover{
			color: black;
		}

		.hoursspent , .tasknotassigned , .notimesheets{
			color: red;
		}

		.hoursnotspent{
			color: green;
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
	<div class="container-fluid">
		<div class="row">
			<div class="form-group col-sm-4">
				<h4>{{ $task->title }}</h4>
				<p>{{ $task->description }}</p>
				<a href="/tasks/{{ $task->id }}/edit">
					<input type="button" value="Edit Task" class="btn btn-success" />
				</a>
				<a href="/tasks/{{ $task->id }}/delete">
					<input type="button" value="Delete Task" class="btn btn-danger" />
				</a>
			</div>
			<div class="form-group col-sm-4">
				<h4>Assigned To:</h4>
				@forelse($employees as $employee)
					<a href="/employees/{{ $employee->id }}" class="nounderline">{{ $employee->name }}&nbsp;{{ $employee->surname }}</a>
				@empty
					&nbsp;<b class="tasknotassigned">This Task is still not assigned to anyone</b>
				@endforelse
			</div>
			<div class="form-group col-sm-4">
				<h4>Estimation: </h4>
				<b>Estimated:</b>&nbsp;
				@if($task->estimation == 1)
					{{ $task->estimation }} Hour
				@else
					{{ $task->estimation }} Hours
				@endif<br>
				<b>Spent:</b>&nbsp;
				@if($hoursSpent == 1)
					{{ $hoursSpent }} Hour
				@else
					{{ $hoursSpent }} Hours
				@endif
				   @if($hoursRemaining < 0)
				   	<p class="hoursspent"><b>Remaining:</b>&nbsp;{{ $hoursRemaining }} Hours</p>
				   @else
				   		@if($hoursRemaining == 1)
				   			<p class="hoursnotspent"><b>Remaining:</b>&nbsp;{{ $hoursRemaining }} Hour</p>
				   		@else
				   			<p class="hoursnotspent"><b>Remaining:</b>&nbsp;{{ $hoursRemaining }} Hours</p>
				   		@endif
				   @endif
			</div>
		</div>
	</div>
	<div class="form-group col-md-12">
		<h4>Timesheets: </h4>
			<table class="table table-dark table-striped">
				@if(count($task->timesheets))
					<tr>
						<th>Date</th>
						<th>Description</th>
						<th>Employee</th>
						<th>Hours</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				@else
					<b class="notimesheets">There are still no timesheets recorded for this Task</b>
				@endif
				@foreach($task->timesheets as $timesheet)
					<tr>
						<td>{{ $timesheet->date }}</td>
						<td>{{ $timesheet->description }}</td>
						<td>{{ $timesheet->employeename }}&nbsp;{{ $timesheet->employeesurname }} </td>
						<td>{{ $timesheet->hours_spent }}</td>
						<td>
							<a href="/tasks/timesheet/{{ $timesheet->id }}/edit" class="btn btn-success">Edit</a>
						</td>
						<td>
							<a href="/tasks/timesheet/{{ $timesheet->id }}/delete" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	
<div class="container-fluid">
	<div class="row">
		<div class="form-group col-sm-6">
			<form method="POST" action="/tasks/{{ $task->id }}">
				@csrf
				<div class="form-group col-md-6">
					<h3>Add Timesheets:</h3>
				</div>
				<div class="form-group col-md-6">
					<label for="project_name">Description:</label>
					<input type="text" name="description" class="form-control" >
				</div>
				<div class="form-group col-md-6">
					<label for="project_name">Hours Spent:</label>
					<input type="text" name="hours" class="form-control">
				</div>
				<div class="form-group col-md-6">
					<label for="project_name">Date:</label>
					<input type="text" name="date" class="form-control" placeholder="Enter the date in format: YYYY-MM-DD">
				</div>
				<div class="form-group col-md-6">
					<label for="project_name">Employee:</label><br>
					<select name="employee_selected" class="form-control">
					@foreach($employees as $employee)
						<option></option>
						<option value="{{ $employee->id }}">{{ $employee->name }}&nbsp;{{ $employee->surname }}</option>
					@endforeach
					</select>
				</div>
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary">Add Timesheet</button>
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
		</div>
		<div class="form-group col-sm-6">
			<form method="POST" action="/tasks/{{ $task->id }}/send">
				@csrf
				<h4>Send a Message to Client</h4>
				<label for="project_name">From:</label>
				<div class="form-group">
					@forelse($employees as $employee)
						<input type="text" name="employee_email" class="form-control" value="{{ $employee->email }}" />
					@empty
						<input type="text" name="employee_email" class="form-control" placeholder="Plese Enter your Email Address" />
					@endforelse
				</div>
				<label for="project_name">To:</label>
				<div class="form-group">
					<input type="text" name="client_email" class="form-control" placeholder="Please Enter Client Email" />
				</div>
				<label for="project_name">Subject:</label>
				<div class="form-group">
					<input type="text" name="subject" class="form-control" value="Task: {{ $task->title }}" />
				</div>
				<div class="form-group">
	  				<textarea class="form-control" rows="5" name="email_message" placeholder="Enter your Message Here."></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Send Message</button>
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
		</div>
	</div>
</div>
</body>
<div class="jumbotron text-center" style="margin-bottom:0">
        <b>All Rights Reserved - Werde 2019</b>
	</div>
</html>
