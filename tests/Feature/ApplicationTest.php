<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Application;

class ApplicationTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * Show one application data api.
     * GET api/applications/{rpplication_uuid}
     */
    public function testShowApplication(): void
    {


        $application = Application::factory()->create();

        $response = $this->get('api/applications/' . $application->id)
            ->assertExactJson([
                'data' => [
                    'id' => $application->id,
                    'First_name' => $application->First_name,
                    'Last_name' => $application->Last_name,
                    'Club' => $application->Club,
                    'Race_ID' => $application->Race_ID
                ]
            ]);
            $response->assertStatus(200);
    }

    /**
     * Show all applications data api.
     * GET api/applications/{application_uuid}
     */
    public function testGetApplications(): void
    {


        $application = Application::factory()->create();
        $application1 = Application::factory()->create();
        $application2 = Application::factory()->create();
        $application3 = Application::factory()->create();


        $response = $this->get('api/applications/')
            ->assertExactJson([
                0=>[
                    'id' => $application->id,
                    'First_name' => $application->First_name,
                    'Last_name' => $application->Last_name,
                    'Club' => $application->Club,
                    'Race_ID' => $application->Race_ID
                ],
                1=>[
                    'id' => $application1->id,
                    'First_name' => $application1->First_name,
                    'Last_name' => $application1->Last_name,
                    'Club' => $application1->Club,
                    'Race_ID' => $application1->Race_ID
                ],
                2=>[
                    'id' => $application2->id,
                    'First_name' => $application2->First_name,
                    'Last_name' => $application2->Last_name,
                    'Club' => $application2->Club,
                    'Race_ID' => $application2->Race_ID
                ],
                3=>[
                    'id' => $application3->id,
                    'First_name' => $application3->First_name,
                    'Last_name' => $application3->Last_name,
                    'Club' => $application3->Club,
                    'Race_ID' => $application3->Race_ID
                ]

            ]);
            $response->assertStatus(200);
    }

    /**
     * Create one application data api.
     * POST api/applications/
     */
    public function testCreateApplications(): void
    {


        $application = Application::factory()->create();
        $data = [
            'First_name' => $application->First_name,
            'Last_name' => $application->Last_name,
            'Club' => $application->Club,
            'Race_ID' => $application->Race_ID
        ];

        $response = $this->postJson('api/applications/', $data);

        $response->assertJsonFragment([
            'First_name' => $application->First_name,
            'Last_name' => $application->Last_name,
            'Club' => $application->Club,
            'Race_ID' => $application->Race_ID
            ]);
        $response->assertStatus(201);
    }
}
