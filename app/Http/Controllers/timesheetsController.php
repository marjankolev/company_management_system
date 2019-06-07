<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class timesheetsController extends Controller
{
    public function addtimesheet(Request $request,$id){

        request()->validate([
            'description' => 'required',
            'hours' => 'required|not_in:0',
            'date'  => 'required',
            'employee_selected' => 'required'
        ]);

        $employee = \App\Employees::findOrFail(request('employee_selected'));

        \App\Timesheets::create([
            'tasks_id' => $id,
            'task_id' => $id,
            'description' => request('description'),
            'hours_spent' => request('hours'),
            'date'	=> request('date'),
            'employeename' => $employee->name,
            'employeesurname' => $employee->surname
        ]);
        return redirect('/tasks/' . $id);
    }

    public function destroy($id){

        $timesheet = \App\Timesheets::findOrFail($id);
        $timesheet->delete();

        return redirect('/tasks/' . $timesheet->task_id);
    }

    public function edit($id){

        $timesheet = \App\Timesheets::findOrFail($id);
        return view('timesheets.edit', compact('timesheet'));
    }

    public function update(Request $request, $id){

        request()->validate([
            'description' => 'required',
            'hours' => 'required|not_in:0',
            'date'  => 'required'
        ]);

        $timesheet = \App\Timesheets::findOrFail($id);
        $timesheet->description = $request->get('description');
        $timesheet->hours_spent = $request->get('hours');
        $timesheet->date = $request->get('date');

        $timesheet->save();

        return redirect('/tasks/' . $timesheet->task_id);
    }
}
