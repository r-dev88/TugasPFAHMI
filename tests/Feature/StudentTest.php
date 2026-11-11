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
    $response->assertSee('name="search"', false);
    $response->assertSee($classroom->name);
});

test('admin student page shows edit and delete actions for each student', function () {
    $student = Student::factory()->create(['nama' => 'Siswa Aksi']);

    $response = $this->get('/admin/student');

    $response->assertOk();
    $response->assertSee('edit-student-modal-'.$student->id, false);
    $response->assertSee(route('admin.student.update', $student), false);
    $response->assertSee(route('admin.student.destroy', $student), false);
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

test('student list can be searched by nama, nis, or address', function () {
    $classroom = Classroom::factory()->create();
    Student::factory()->create([
        'nama' => 'Rizky Pratama',
        'nis' => '01911111',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Kenanga',
    ]);
    Student::factory()->create([
        'nama' => 'Budi Santoso',
        'nis' => '01922222',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Sudirman',
    ]);

    $this->get('/admin/student?search=Rizky')
        ->assertOk()
        ->assertSee('Rizky Pratama')
        ->assertDontSee('Budi Santoso');

    $this->get('/admin/student?search=01922222')
        ->assertOk()
        ->assertSee('Budi Santoso')
        ->assertDontSee('Rizky Pratama');

    $this->get('/admin/student?search=Sudirman')
        ->assertOk()
        ->assertSee('Budi Santoso')
        ->assertDontSee('Rizky Pratama');
});

test('student list can be filtered by classroom', function () {
    $firstClassroom = Classroom::factory()->create();
    $secondClassroom = Classroom::factory()->create();
    Student::factory()->create([
        'nama' => 'Siswa Kelas Satu',
        'classroom_id' => $firstClassroom->id,
    ]);
    Student::factory()->create([
        'nama' => 'Siswa Kelas Dua',
        'classroom_id' => $secondClassroom->id,
    ]);

    $this->get('/admin/student?classroom_id='.$firstClassroom->id)
        ->assertOk()
        ->assertSee('Siswa Kelas Satu')
        ->assertDontSee('Siswa Kelas Dua');
});

test('student list can be filtered by status', function () {
    $classroom = Classroom::factory()->create();
    Student::factory()->create([
        'nama' => 'Siswa Aktif',
        'classroom_id' => $classroom->id,
        'is_active' => true,
    ]);
    Student::factory()->create([
        'nama' => 'Siswa Nonaktif',
        'classroom_id' => $classroom->id,
        'is_active' => false,
    ]);

    $this->get('/admin/student?status=active')
        ->assertOk()
        ->assertSee('Siswa Aktif')
        ->assertDontSee('Siswa Nonaktif');

    $this->get('/admin/student?status=inactive')
        ->assertOk()
        ->assertSee('Siswa Nonaktif')
        ->assertDontSee('Siswa Aktif');
});

test('student list is paginated ten rows per page', function () {
    $classroom = Classroom::factory()->create();
    Student::factory()->count(11)->create(['classroom_id' => $classroom->id]);

    $response = $this->get('/admin/student');

    $response->assertOk();
    $response->assertViewHas('students', function ($students) {
        return $students->count() === 10 && $students->total() === 11;
    });
});

test('a student can be updated from the edit modal', function () {
    $student = Student::factory()->create([
        'nama' => 'Nama Lama',
        'nis' => '01911111',
        'is_active' => true,
    ]);
    $classroom = Classroom::factory()->create();

    $response = $this->put(route('admin.student.update', $student), [
        'nama' => 'Nama Baru',
        'nis' => '01933333',
        'classroom_id' => $classroom->id,
        'address' => 'Alamat Baru',
        'is_active' => '0',
    ]);

    $response->assertRedirect(route('admin.student.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('students', [
        'id' => $student->id,
        'nama' => 'Nama Baru',
        'nis' => '01933333',
        'classroom_id' => $classroom->id,
        'address' => 'Alamat Baru',
        'is_active' => 0,
    ]);
});

test('updating a student keeps its own nis valid', function () {
    $student = Student::factory()->create(['nis' => '01944444']);

    $response = $this->put(route('admin.student.update', $student), [
        'nama' => $student->nama,
        'nis' => $student->nis,
        'classroom_id' => $student->classroom_id,
    ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect(route('admin.student.index'));
});

test('updating a student rejects another students nis', function () {
    Student::factory()->create(['nis' => '01955555']);
    $student = Student::factory()->create(['nis' => '01966666']);

    $response = $this->put(route('admin.student.update', $student), [
        'nama' => $student->nama,
        'nis' => '01955555',
        'classroom_id' => $student->classroom_id,
    ]);

    $response->assertSessionHasErrors('nis');
    $this->assertDatabaseHas('students', ['id' => $student->id, 'nis' => '01966666']);
});

test('a student can be deleted', function () {
    $student = Student::factory()->create();

    $response = $this->delete(route('admin.student.destroy', $student));

    $response->assertRedirect(route('admin.student.index'));
    $response->assertSessionHas('success');
    $this->assertDatabaseMissing('students', ['id' => $student->id]);
});
