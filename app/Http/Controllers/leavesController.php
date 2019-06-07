<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class leavesController extends Controller
{
    public function index(){
        $leaves = \App\Leaves::all();
    	return view('leaves.leaves', compact('leaves'));
    }


    public function create(){
    	$employees = \App\Employees::all();
    	return view('leaves.create', compact('employees'));
    }

    public function store(){

        request()->validate([
            'employee_selected' => 'required',
            'leavereason'   => ['required', 'min:5'],
            'numofdays' => ['required', 'not_in:0']
        ]);

        $employees = \DB::table('employees')->where('id', request('employee_selected'))->first();
    	\App\Leaves::create([
    		'employees_id' => request('employee_selected'),
    		'leave_reason' => request('leavereason'),
    		'numdays'	=> request('numofdays'),
    		'approved'	=> request('approved'),
            'employeename' => $employees->name,
            'employeesurname' => $employees->surname
    	]);
    	return redirect('/leaves');
    }

    public function edit($id){
        $leave = \App\Leaves::findOrFail($id);
        $employees = \App\Employees::all();
        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, $id){

        request()->validate([
            'employee_selected' => 'required',
            'leavereason'   => ['required', 'min:5'],
            'numofdays' => ['required', 'not_in:0']
        ]);
        
        $leave = \App\Leaves::findOrFail($id);

        $employee = \DB::table('employees')->where('id', request('employee_selected'))->first();

        $leave->employees_id = $request->get('employee_selected');
        $leave->leave_reason = $request->get('leavereason');
        $leave->numdays = $request->get('numofdays');
        $leave->approved = $request->get('approved');
        $leave->employeename = $employee->name;
        $leave->employeesurname = $employee->surname;

        $leave->save();

        return redirect('/leaves');

    }

    public function destroy($id){
        
        $leave = \App\Leaves::findOrFail($id);

        $leave->delete();

        return redirect('/leaves');
    }
}
