<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Resources\ApplicationResource;

class ApplicationController extends Controller
{


    protected Application $application;
    /**
     * Display a listing of the resource.
     */

     public function __construct(Application $application)
     {
         $this->application = $application;
     }

    public function index():Collection
    {
        //
        return Application::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request):ApplicationResource
    {
        //

        $application = $this->application->create($request->validated());
        return $this->applicationResponse($application);
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
        return $this->applicationResponse($application);
    }

    /**
     * Update the specified resource in storage.
     */
    /*
    public function update(UpdateApplicationRequest $request, Application $application):ApplicationResource
    {
        //

        $application->update($request->validated());
        return $this->applicationResponse($application);
    }
    */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
        $application->delete();
    }


    protected function applicationResponse(Application $race):ApplicationResource
    {
        return new ApplicationResource($race);
    }
}
