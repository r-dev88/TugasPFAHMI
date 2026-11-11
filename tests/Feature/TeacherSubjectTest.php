<?php

use App\Models\Subject;
use App\Models\Teacher;

test('a teacher belongs to one subject and a subject has one teacher', function () {
    $subject = Subject::factory()->create(['name' => 'Pemrograman Web']);
    $teacher = Teacher::factory()->create([
        'name' => 'Budi Santoso',
        'subject_id' => $subject->id,
    ]);

    expect($teacher->subject->id)->toBe($subject->id)
        ->and($teacher->subject->name)->toBe('Pemrograman Web')
        ->and($subject->teacher->id)->toBe($teacher->id)
        ->and($subject->teacher->name)->toBe('Budi Santoso');
});

test('admin teacher page retrieves and displays teacher and its subject', function () {
    $response = $this->get('/admin/teacher');

    $response->assertOk();
    $response->assertViewIs('admin.teacher');
    $response->assertViewHas('teachers');
});

test('admin subject page retrieves and displays subject and its teacher', function () {
    $response = $this->get('/admin/subject');

    $response->assertOk();
    $response->assertViewIs('admin.subject');
    $response->assertViewHas('subjects');
});
