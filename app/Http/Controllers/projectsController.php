<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class projectsController extends Controller
{

	public function index(){

		$projects = \App\Projects::all();
		return view('projects.projects', compact('projects'));

	}

    public function create(){

    	return view('projects.create');
        
    }


    public function store(){

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'email' => 'required'
        ]);
        
    	\App\Projects::create([
    		'title' => request('title'),
    		'description' => request('description'),
            'email' => request('email')
    	]);

    	return redirect('/projects');
    }

    public function addtask($id){

        $project = \App\Projects::findOrFail($id);
        return view('projects.addtask', compact('project'));
    }

    public function storetask(\App\Projects $project){

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'estimation'  => ['required', 'not_in:0']
        ]);

        \App\Tasks::create([
            'title' => request('title'),
            'description' => request('description'),
            'estimation'  => request('estimation'),
            'projects_id' => request('projects_id'), 
            'email' => request('email')
        ]);
        return redirect('/projects/' . $project->id);
    }

    public function showproject($id){

        $project = \App\Projects::findOrFail($id);
        return view('projects.showproject', compact('project'));
    }

    public function edit($id){

        $project = \App\Projects::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id){

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],
            'email' => 'required'
        ]);

        $project = \App\Projects::findOrFail($id);
        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->email = $request->get('email');
        $project->save();

        return redirect('/projects/' . $id);
    }

    public function destroy($id){
        $project = \App\Projects::findOrFail($id);
        $project->delete();
        return redirect('/projects');
    }
}
