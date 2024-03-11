<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Http\Resources\RaceResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRaceRequest;
use App\Http\Requests\UpdateRaceRequest;

class RaceController extends Controller
{

    protected Race $race;

    /**
     * Constructor
     *
     * @param Race $race
     */
    public function __construct(Race $race)
    {
        $this->race = $race;
    }

    /**
     * Display a listing of the resource.
     * GET All
     *
     * @return Collection
     */
    public function index():Collection
    {
        return Race::all();
    }


    /**
     * Store a newly created resource in storage.
     * CREATE
     *
     * @param Request $request
     * @return RaceResource
     */
    public function store(StoreRaceRequest $request):RaceResource
    {

        $race = $this->race->create($request->validated());
        return $this->raceResponse($race);
    }

    /**
     * Display the specified Race resource.
     * Get One
     *
     * @param Race $race
     * @return RaceResource
     */
    public function show(Race $race):RaceResource
    {
        return $this->raceResponse($race);
    }


    /**
     * Update the specified Race resource in storage.
     * UPDATE
     *
     * @param Request $request
     * @param Race $race
     * @return RaceResource
     */
    public function update(UpdateRaceRequest $request, Race $race): RaceResource
    {

        $race->update($request->validated());
        return $this->raceResponse($race);
    }


    /**
     * Remove the Race resource from storage.
     * DELETE
     *
     * @param Race $race
     * @return void
     */
    public function destroy(Race $race)
    {
        $race->delete();
    }

    /**
     * Get json respone of race.
     *
     * @param Race $race
     * @return RaceResource
     */
    protected function raceResponse(Race $race): RaceResource
    {
        return new RaceResource($race);
    }
}
