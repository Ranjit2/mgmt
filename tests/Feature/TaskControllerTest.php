<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user to act as during the tests
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /**
     * @test
     */
    public function test_tasks_index()
    {
        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_tasks_create()
    {
        $response = $this->get(route('tasks.create'));

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_tasks_store()
    {
        $taskData = [
            'title' => 'Test Task',
            'description' => 'This is a test task description.',
        ];

        $response = $this->post(route('tasks.store'), $taskData);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', $taskData);
    }

    /**
     * @test
     */
    public function test_tasks_edit()
    {
        $task = Task::factory()->create([
            'title' => 'Test Task',
            'description' => 'Test description',
        ]);
    
        $response = $this->get(route('tasks.edit', $task->id));
    
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_tasks_update()
    {
        $task = Task::factory()->create();

        $updatedData = [
            'title' => 'Updated Task Title',
            'description' => 'Updated task description for the task.',
        ];

        $response = $this->put(route('tasks.update', $task->id), $updatedData);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', $updatedData);
    }

    /**
     * @test
     */
    public function test_tasks_show()
    {
        $task = Task::factory()->create();

        $response = $this->get(route('tasks.show', $task));

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_tasks_destroy()
    {
        $task = Task::factory()->create();

        $response = $this->delete(route('tasks.delete', $task));

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    /**
     * @test
     */
    public function test_tasks_status()
    {
        $task = Task::factory()->create();

        $response = $this->post(route('tasks.status', $task));

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => !$task->status]);
    }

    /**
     * @test
     */
    public function test_tasks_assign()
    {
        $response = $this->get(route('tasks.assign'));

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_user_assign()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->post(route('user.assign'), ['user' => $user->id, 'task' => $task->id]);

        $response->assertRedirect(route('tasks.assign'));
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'user_assign_id' => $user->id]);
    }
}
