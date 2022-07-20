<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiSchoolTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStoreSuccess()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $Data = [
            "name" => "Test school",
        ];

        $this->json('POST', 'api/school', $Data, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                ],

            ]);
    }
    public function testListedSuccessfully()
    {

        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        factory(Student::class)->create([
            "name" => "School1",
        ]);



        $this->json('GET', 'api/school', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "student" => [
                    [
                        "id" => 1,
                        "name" => "School1",
                    ],

                ],
                "message" => "Retrieved successfully"
            ]);
    }
    public function testUpdatedSuccessfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $school = factory(School::class)->create([
            "name" => "Shoollly ",
        ]);

        $payload = [
            "name" => "Shoollly ",
        ];

        $this->json('PATCH', 'api/school/' . $school->id , $payload, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "school" => [
                    "name" => "Shoollly",
                ],
                "message" => "Updated successfully"
            ]);
    }

    public function testDelete()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $school = factory(School::class)->create([
            "name" => "School",
        ]);

        $this->json('DELETE', 'api/school/' . $school->id, [], ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
