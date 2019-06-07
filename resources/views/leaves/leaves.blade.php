<!DOCTYPE html>
<html>
<head>
	<title>Leaves</title>
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
    <h3>Leaves Overview</h3>
  </div>
<div class="form-group col-md-6">
  <a href="/leaves/create" class="btn btn-primary" role="button">Request a New Leave</a>
</div>
<div class="form-group col-md-12">
  <table class="table table-striped">
    <th>Leave Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Description</th>
    <th>Number of Days</th>
    <th>Approved</th>
    <th>Edit Leave</th>
    <th>Delete Leave</th>
    @foreach($leaves as $leave)
    <tr>
      <td>{{ $leave->id }}</td>
      <td>{{ $leave->employeename }}</td>
      <td>{{ $leave->employeesurname }}</td>
      <td>{{ $leave->leave_reason }}</td>
      <td>{{ $leave->numdays }}</td>
      @if($leave->approved == '')
        <td>Pending</td>
      @else
        <td>{{ $leave->approved }}</td>
      @endif
      <td>
        <a href="/leaves/{{ $leave->id }}/edit">
          <input type="button" class="btn btn-success" value="Edit Leave" />
        </a>
      </td>
      <td>
        <a href="/leaves/{{ $leave->id }}/delete">
          <input type="button" class="btn btn-danger" value="Delete Leave" />
        </a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
	<div class="jumbotron text-center" style="margin-bottom:0">
        <b>All Rights Reserved - Werde 2019</b>
	</div>
</body>
</html>
