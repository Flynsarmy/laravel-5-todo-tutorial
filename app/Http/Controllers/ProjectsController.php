<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProjectsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		Project::create( $input );

		return Redirect::route('projects.index')->with('message', 'Project created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function show(Project $project)
	{
		return view('projects.show', compact('project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function edit(Project $project)
	{
		return view('projects.edit', compact('project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function update(Project $project)
	{
		$input = array_except(Input::all(), '_method');
		$project->update($input);

		return Redirect::route('projects.show', $project->slug)->with('message', 'Project updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Project $project
	 * @return Response
	 */
	public function destroy(Project $project)
	{
		$project->delete();

		return Redirect::route('projects.index')->with('message', 'Project deleted.');
	}

}
