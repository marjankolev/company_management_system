<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employeesController extends Controller
{

	public function index(){
		$employees = \App\Employees::all();
		return view('employees.employeess', compact('employees'));
	}

    public function create(){
    	return view('employees.create');
    }

    public function store(){
    	request()->validate([
    		'name' => ['required'],
    		'surname' => ['required'],
    		'email'	=> ['email']
    	]);

    	\App\Employees::create([
    		'name' => request('name'),
    		'surname' => request('surname'),
    		'email' => request('email')
    	]);

    	return redirect('/employees');
    }

    public function showemployee($id){
        $tasks = \App\Tasks::all();
        $employee = \App\Employees::findOrFail($id);
        return view('employees.showemployee', compact('employee', 'tasks'));
    }

    public function assigntask($id){
        \App\Tasks::where('id', request('task_selected'))
            ->update(['employees_id' => $id]);
        return redirect('/employees/' . $id);
    }

    public function edit($id){
        $employee = \App\Employees::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id){

        request()->validate([
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['email']
        ]);
        
        $employee = \App\Employees::findOrFail($id);
        $employee->name = $request->get('name');
        $employee->surname = $request->get('surname');
        $employee->email = $request->get('email');
        $employee->save();

        return redirect('/employees/' . $id)->with('success', 'The Employee has been updated');
    }

    public function destroy($id){
        
        $employee = \App\Employees::findOrFail($id);

        $employee->delete();

        return redirect('/employees');
    }
}
