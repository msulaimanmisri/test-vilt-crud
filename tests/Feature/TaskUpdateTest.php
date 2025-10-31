<?php

use App\Models\User;
use App\Models\Tasks;
use Illuminate\Support\Str;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('can update a task', function () {
    $user = User::factory()->create();
    
    $task = Tasks::factory()->create([
        'author_id' => $user->id,
        'uuid' => Str::uuid(),
        'title' => 'Original Title',
        'description' => 'Original Description',
        'priority' => 3,
        'status' => 1,
        'due_date' => now()->addDays(5),
    ]);

    actingAs($user)
        ->patch(route('tasks.update', $task->uuid), [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'priority' => 2,
            'status' => 2,
            'due_date' => now()->addDays(10)->format('Y-m-d'),
        ])
        ->assertRedirect(route('tasks.index'))
        ->assertSessionHas('success', 'Task updated successfully.');

    assertDatabaseHas('tasks', [
        'id' => $task->id,
        'title' => 'Updated Title',
        'description' => 'Updated Description',
        'priority' => 2,
        'status' => 2,
    ]);
});

it('cannot update a task owned by another user', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    
    $task = Tasks::factory()->create([
        'author_id' => $user1->id,
        'uuid' => Str::uuid(),
    ]);

    actingAs($user2)
        ->patch(route('tasks.update', $task->uuid), [
            'title' => 'Unauthorized Update',
            'description' => 'This should not work',
            'priority' => 2,
            'status' => 2,
        ])
        ->assertForbidden();
});

it('validates required fields when updating a task', function () {
    $user = User::factory()->create();
    
    $task = Tasks::factory()->create([
        'author_id' => $user->id,
        'uuid' => Str::uuid(),
    ]);

    actingAs($user)
        ->patch(route('tasks.update', $task->uuid), [
            'title' => '',
            'priority' => null,
            'status' => null,
        ])
        ->assertSessionHasErrors(['title', 'priority', 'status']);
});
