<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tasksController extends Controller
{
    public function index(){
    	$tasks = \App\Tasks::all();
    	return view('tasks.tasks', compact('tasks'));
    }

    public function create(){
        $projects = \App\Projects::all();
        $employees = \App\Employees::all();
        return view('tasks.create', compact('projects', 'employees'));
    }

    public function showtask($id){

    	$task = \App\Tasks::findOrFail($id);

        $employees = \DB::table('employees')
        ->select('employees.id', 'name', 'surname', 'email')
        ->join('tasks', 'employees.id', '=', 'tasks.employees_id')
        ->where('tasks.id', $id)
        ->get();

        $hoursSpent = \DB::table('timesheets')->where('task_id', '=', $id)->sum('hours_spent');
        $hoursRemaining = $task->estimation - $hoursSpent;

    	return view('tasks.showtask', compact('task', 'employees', 'hoursSpent', 'hoursRemaining'));
    }

    public function createtask(){

        request()->validate([
            'title'=> ['required', 'min:3'],
            'description'=> ['required', 'min:10'],
            'project_selected' => 'required',
            'employee_selected'  => 'required',
            'estimation' => ['required', 'not_in:0']
        ]);

        \App\Tasks::create([
            'title' => request('title'),
            'description' => request('description'),
            'projects_id' => request('project_selected'),
            'employees_id' => request('employee_selected'),
            'estimation' => request('estimation')
        ]);

        return redirect('tasks/');
    }

    public function edit($id){

        $task = \App\Tasks::findOrFail($id);
        $projects = \App\Projects::all();
        $employees = \App\Employees::all();
        return view('tasks.edit', compact('task', 'projects', 'employees'));
    }

    public function update(Request $request, $id){

        request()->validate([
            'title'=> ['required', 'min:3'],
            'description'=> ['required', 'min:10'],
            'project_selected' => 'required',
            'employee_selected'  => 'required',
            'estimation' => ['required', 'not_in:0']
        ]);

        $task = \App\Tasks::findOrFail($id);
        
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->projects_id = $request->get('project_selected');
        $task->employees_id = $request->get('employee_selected');
        $task->estimation = $request->get('estimation');

        $task->save();

        return redirect('/tasks/' . $id);
    }

    public function destroy($id){
        $task = \App\Tasks::findOrFail($id);

        $task->delete();

        return redirect('/tasks/');
    }

}
