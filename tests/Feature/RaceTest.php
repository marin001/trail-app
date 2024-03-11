<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Race;

class RaceTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * Show one race data api.
     * GET api/races/{race_uuid}
     */
    public function testShowRace(): void
    {


        $race = Race::factory()->create();

        $response = $this->get('api/races/' . $race->id)
            ->assertExactJson([
                'data' => [
                    'id' => $race->id,
                    'Name' => $race->Name,
                    'Distance' => $race->Distance
                ]
            ]);
            $response->assertStatus(200);
    }

    /**
     * Show all races data api.
     * GET api/races/{race_uuid}
     */
    public function testGetRaces(): void
    {


        $race = Race::factory()->create();
        $race1 = Race::factory()->create();
        $race2 = Race::factory()->create();
        $race3 = Race::factory()->create();


        $response = $this->get('api/races/')
            ->assertExactJson([
                0=>[
                    'id' => $race->id,
                    'Name' => $race->Name,
                    'Distance' => $race->Distance
                ],
                1=>[
                    'id' => $race1->id,
                    'Name' => $race1->Name,
                    'Distance' => $race1->Distance
                ],
                2=>[
                    'id' => $race2->id,
                    'Name' => $race2->Name,
                    'Distance' => $race2->Distance
                ],
                3=>[
                    'id' => $race3->id,
                    'Name' => $race3->Name,
                    'Distance' => $race3->Distance
                ]

            ]);
            $response->assertStatus(200);
    }

    /**
     * Create one race data api.
     * POST api/races/
     */
    public function testCreateRaces(): void
    {


        $race = Race::factory()->create();
        $data = [
            'Name' => $race->Name,
            'Distance' => $race->Distance
        ];

        $response = $this->postJson('api/races/', $data);

        $response->assertJsonFragment([
                    'Name' => $race->Name,
                    'Distance' => $race->Distance
            ]);
        $response->assertStatus(201);

    }


    /**
     * Create one race data api.
     * PUT api/races/
     */
    public function testUpdateRaces(): void
    {


        $race = Race::factory()->create();
        $data = [
            'Name' => $race->Name.uniqid(),
            'Distance' => '5k'
        ];


        $response = $this->putJson('api/races/'. $race->id, $data);

        $response->assertJsonFragment($data);
        $response->assertStatus(200);

    }
}
