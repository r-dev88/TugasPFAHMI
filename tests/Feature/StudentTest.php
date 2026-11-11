<?php

use App\Models\Classroom;
use App\Models\Student;

test('admin student page shows the add student button and modal form', function () {
    $classroom = Classroom::factory()->create(['name' => '11 PPLG 1']);

    $response = $this->get('/admin/student');

    $response->assertOk();
    $response->assertViewIs('admin.student');
    $response->assertViewHas('classrooms');
    $response->assertSee('Tambah Siswa');
    $response->assertSee('create-student-modal', false);
    $response->assertSee('action="'.route('admin.student.store').'"', false);
    $response->assertSee($classroom->name);
});

test('create student page opens the modal automatically', function () {
    $response = $this->get('/admin/student/create');

    $response->assertOk();
    $response->assertViewIs('admin.student');
    $response->assertViewHas('openCreateModal', true);
    $response->assertSee('create-student-modal', false);
});

test('a student can be created from the modal form', function () {
    $classroom = Classroom::factory()->create();

    $response = $this->post('/admin/student', [
        'nama' => 'Ahmad Fauzi',
        'nis' => '01912345',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Merdeka No. 1',
    ]);

    $response->assertRedirect(route('admin.student.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('students', [
        'nama' => 'Ahmad Fauzi',
        'nis' => '01912345',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Merdeka No. 1',
        'is_active' => 1,
    ]);
});

test('creating a student requires nama, nis, and classroom', function () {
    $response = $this->post('/admin/student', []);

    $response->assertSessionHasErrors(['nama', 'nis', 'classroom_id']);
    $this->assertDatabaseCount('students', 0);
});

test('student nis must be unique', function () {
    Student::factory()->create(['nis' => '01999999']);

    $response = $this->post('/admin/student', [
        'nama' => 'Siswa Lain',
        'nis' => '01999999',
        'classroom_id' => Classroom::factory()->create()->id,
    ]);

    $response->assertSessionHasErrors('nis');
    $this->assertDatabaseCount('students', 1);
});

test('student classroom must exist', function () {
    $response = $this->post('/admin/student', [
        'nama' => 'Siswa Baru',
        'nis' => '01988888',
        'classroom_id' => 999,
    ]);

    $response->assertSessionHasErrors('classroom_id');
    $this->assertDatabaseCount('students', 0);
});
