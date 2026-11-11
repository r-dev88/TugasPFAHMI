<?php

use App\Models\Classroom;
use App\Models\Student;

test('admin student page retrieves and displays students from database', function () {
    $student = Student::first();

    $response = $this->get('/admin/student');

    $response->assertOk();
    $response->assertViewIs('admin.student');
    $response->assertViewHas('students');
    if ($student) {
        $response->assertSee($student->nama);
    }
});

test('admin classroom page retrieves and displays classrooms from database', function () {
    $classroom = Classroom::first();

    $response = $this->get('/admin/classroom');

    $response->assertOk();
    $response->assertViewIs('admin.classroom');
    $response->assertViewHas('classrooms');
    if ($classroom) {
        $response->assertSee($classroom->name);
        $response->assertSee($classroom->major);
    }
});

test('admin classroom detail page displays classroom and its students', function () {
    $classroom = Classroom::first() ?? Classroom::factory()->has(Student::factory()->count(3))->create();

    $response = $this->get("/admin/classroom/{$classroom->id}");

    $response->assertOk();
    $response->assertViewIs('admin.classroom-detail');
    $response->assertViewHas('classroom');
    $response->assertViewHas('students');
    $response->assertSee($classroom->name);

    if ($firstStudent = $classroom->students->first()) {
        $response->assertSee($firstStudent->nama);
    }
});
