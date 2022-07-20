<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiStudentTest extends TestCase
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
            "name" => "Test student",
            "school_id" => School::factory(),
            "order" => 2,
        ];

        $this->json('POST', 'api/student', $Data, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                    'school_id',
                    'order',
                ],

            ]);
    }
    public function testListedSuccessfully()
    {

        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        factory(Student::class)->create([
            "name" => "Test1",
            "order" => 1,
            'school_id'=>factory(School::class)->create()
        ]);



        $this->json('GET', 'api/student', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "student" => [
                    [
                        "id" => 1,
                        "name" => "Test1",
                        "order" => 1,
                        'school_id'=>1
                    ],

                ],
                "message" => "Retrieved successfully"
            ]);
    }
}
