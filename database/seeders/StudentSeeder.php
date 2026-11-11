<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classesData = [
            '10 PPLG 1' => [
                ['nama' => 'ADITYA', 'nis' => '0191001', 'address' => 'Jl. Mawar No. 1', 'is_active' => true],
                ['nama' => 'BAYU', 'nis' => '0191002', 'address' => 'Jl. Mawar No. 2', 'is_active' => true],
                ['nama' => 'CITRA', 'nis' => '0191003', 'address' => 'Jl. Mawar No. 3', 'is_active' => true],
                ['nama' => 'DIMAS', 'nis' => '0191004', 'address' => 'Jl. Mawar No. 4', 'is_active' => true],
                ['nama' => 'EKA', 'nis' => '0191005', 'address' => 'Jl. Mawar No. 5', 'is_active' => true],
                ['nama' => 'FAHRI', 'nis' => '0191006', 'address' => 'Jl. Mawar No. 6', 'is_active' => true],
                ['nama' => 'GALIH', 'nis' => '0191007', 'address' => 'Jl. Mawar No. 7', 'is_active' => true],
                ['nama' => 'HELMI', 'nis' => '0191008', 'address' => 'Jl. Mawar No. 8', 'is_active' => true],
                ['nama' => 'INDAH', 'nis' => '0191009', 'address' => 'Jl. Mawar No. 9', 'is_active' => false],
                ['nama' => 'JESSICA', 'nis' => '0191010', 'address' => 'Jl. Mawar No. 10', 'is_active' => true],
            ],
            '10 PPLG 2' => [
                ['nama' => 'KEVIN', 'nis' => '0191011', 'address' => 'Jl. Melati No. 1', 'is_active' => true],
                ['nama' => 'LUTHFI', 'nis' => '0191012', 'address' => 'Jl. Melati No. 2', 'is_active' => true],
                ['nama' => 'MAULANA', 'nis' => '0191013', 'address' => 'Jl. Melati No. 3', 'is_active' => true],
                ['nama' => 'NABILA', 'nis' => '0191014', 'address' => 'Jl. Melati No. 4', 'is_active' => true],
                ['nama' => 'OKTA', 'nis' => '0191015', 'address' => 'Jl. Melati No. 5', 'is_active' => true],
                ['nama' => 'PANJI', 'nis' => '0191016', 'address' => 'Jl. Melati No. 6', 'is_active' => true],
                ['nama' => 'QONITA', 'nis' => '0191017', 'address' => 'Jl. Melati No. 7', 'is_active' => true],
                ['nama' => 'RADITYA', 'nis' => '0191018', 'address' => 'Jl. Melati No. 8', 'is_active' => true],
                ['nama' => 'SALMA', 'nis' => '0191019', 'address' => 'Jl. Melati No. 9', 'is_active' => true],
                ['nama' => 'TAUFIQ', 'nis' => '0191020', 'address' => 'Jl. Melati No. 10', 'is_active' => false],
            ],
            '11 PPLG 1' => [
                ['nama' => 'AGUS', 'nis' => '0191101', 'address' => 'Jl. Anggrek No. 1', 'is_active' => true],
                ['nama' => 'BAGAS', 'nis' => '0191102', 'address' => 'Jl. Anggrek No. 2', 'is_active' => true],
                ['nama' => 'CHANDRA', 'nis' => '0191103', 'address' => 'Jl. Anggrek No. 3', 'is_active' => true],
                ['nama' => 'DANI', 'nis' => '0191104', 'address' => 'Jl. Anggrek No. 4', 'is_active' => true],
                ['nama' => 'EKO', 'nis' => '0191105', 'address' => 'Jl. Anggrek No. 5', 'is_active' => true],
                ['nama' => 'FIKRI', 'nis' => '0191106', 'address' => 'Jl. Anggrek No. 6', 'is_active' => true],
                ['nama' => 'GITA', 'nis' => '0191107', 'address' => 'Jl. Anggrek No. 7', 'is_active' => true],
                ['nama' => 'HENDRA', 'nis' => '0191108', 'address' => 'Jl. Anggrek No. 8', 'is_active' => true],
                ['nama' => 'INTAN', 'nis' => '0191109', 'address' => 'Jl. Anggrek No. 9', 'is_active' => true],
                ['nama' => 'JOKO', 'nis' => '0191110', 'address' => 'Jl. Anggrek No. 10', 'is_active' => true],
            ],
            '11 PPLG 2' => [
                ['nama' => 'KAMAL', 'nis' => '0191111', 'address' => 'Jl. Kenanga No. 1', 'is_active' => true],
                ['nama' => 'LESTARI', 'nis' => '0191112', 'address' => 'Jl. Kenanga No. 2', 'is_active' => true],
                ['nama' => 'MIFTAH', 'nis' => '0191113', 'address' => 'Jl. Kenanga No. 3', 'is_active' => true],
                ['nama' => 'NADIA', 'nis' => '0191114', 'address' => 'Jl. Kenanga No. 4', 'is_active' => true],
                ['nama' => 'OSAMA', 'nis' => '0191115', 'address' => 'Jl. Kenanga No. 5', 'is_active' => true],
                ['nama' => 'PRATAMA', 'nis' => '0191116', 'address' => 'Jl. Kenanga No. 6', 'is_active' => true],
                ['nama' => 'QUEEN', 'nis' => '0191117', 'address' => 'Jl. Kenanga No. 7', 'is_active' => true],
                ['nama' => 'RENDI', 'nis' => '0191118', 'address' => 'Jl. Kenanga No. 8', 'is_active' => true],
                ['nama' => 'SINTA', 'nis' => '0191119', 'address' => 'Jl. Kenanga No. 9', 'is_active' => true],
                ['nama' => 'TIARA', 'nis' => '0191120', 'address' => 'Jl. Kenanga No. 10', 'is_active' => false],
            ],
            '11 PPLG 3' => [
                ['nama' => 'KAYTO', 'nis' => '0192928', 'address' => 'Jl. Merdeka No. 1', 'is_active' => true],
                ['nama' => 'ALDI', 'nis' => '0192929', 'address' => 'Jl. Merdeka No. 2', 'is_active' => true],
                ['nama' => 'BUDI', 'nis' => '0192930', 'address' => 'Jl. Merdeka No. 3', 'is_active' => true],
                ['nama' => 'CINDY', 'nis' => '0192931', 'address' => 'Jl. Merdeka No. 4', 'is_active' => true],
                ['nama' => 'DAFFA', 'nis' => '0192932', 'address' => 'Jl. Merdeka No. 5', 'is_active' => true],
                ['nama' => 'ERLANGGA', 'nis' => '0192933', 'address' => 'Jl. Merdeka No. 6', 'is_active' => true],
                ['nama' => 'FARAH', 'nis' => '0192934', 'address' => 'Jl. Merdeka No. 7', 'is_active' => false],
                ['nama' => 'GILANG', 'nis' => '0192935', 'address' => 'Jl. Merdeka No. 8', 'is_active' => true],
                ['nama' => 'HANIFAH', 'nis' => '0192936', 'address' => 'Jl. Merdeka No. 9', 'is_active' => true],
                ['nama' => 'IRFAN', 'nis' => '0192937', 'address' => 'Jl. Merdeka No. 10', 'is_active' => true],
            ],
            '12 PPLG 1' => [
                ['nama' => 'ARDIAN', 'nis' => '0191201', 'address' => 'Jl. Cempaka No. 1', 'is_active' => true],
                ['nama' => 'BELLA', 'nis' => '0191202', 'address' => 'Jl. Cempaka No. 2', 'is_active' => true],
                ['nama' => 'CATUR', 'nis' => '0191203', 'address' => 'Jl. Cempaka No. 3', 'is_active' => true],
                ['nama' => 'DION', 'nis' => '0191204', 'address' => 'Jl. Cempaka No. 4', 'is_active' => true],
                ['nama' => 'EVAN', 'nis' => '0191205', 'address' => 'Jl. Cempaka No. 5', 'is_active' => true],
                ['nama' => 'FAJAR', 'nis' => '0191206', 'address' => 'Jl. Cempaka No. 6', 'is_active' => true],
                ['nama' => 'GRACE', 'nis' => '0191207', 'address' => 'Jl. Cempaka No. 7', 'is_active' => true],
                ['nama' => 'HAFIDZ', 'nis' => '0191208', 'address' => 'Jl. Cempaka No. 8', 'is_active' => true],
                ['nama' => 'ISNAIN', 'nis' => '0191209', 'address' => 'Jl. Cempaka No. 9', 'is_active' => true],
                ['nama' => 'JONATHAN', 'nis' => '0191210', 'address' => 'Jl. Cempaka No. 10', 'is_active' => true],
            ],
            '12 PPLG 2' => [
                ['nama' => 'KRESNA', 'nis' => '0191211', 'address' => 'Jl. Dahlia No. 1', 'is_active' => true],
                ['nama' => 'LINDA', 'nis' => '0191212', 'address' => 'Jl. Dahlia No. 2', 'is_active' => true],
                ['nama' => 'MARCELLO', 'nis' => '0191213', 'address' => 'Jl. Dahlia No. 3', 'is_active' => true],
                ['nama' => 'NOVA', 'nis' => '0191214', 'address' => 'Jl. Dahlia No. 4', 'is_active' => true],
                ['nama' => 'OLIVIA', 'nis' => '0191215', 'address' => 'Jl. Dahlia No. 5', 'is_active' => true],
                ['nama' => 'PUTRA', 'nis' => '0191216', 'address' => 'Jl. Dahlia No. 6', 'is_active' => true],
                ['nama' => 'RADEN', 'nis' => '0191217', 'address' => 'Jl. Dahlia No. 7', 'is_active' => true],
                ['nama' => 'SURYA', 'nis' => '0191218', 'address' => 'Jl. Dahlia No. 8', 'is_active' => true],
                ['nama' => 'TRESNA', 'nis' => '0191219', 'address' => 'Jl. Dahlia No. 9', 'is_active' => false],
                ['nama' => 'VINA', 'nis' => '0191220', 'address' => 'Jl. Dahlia No. 10', 'is_active' => true],
            ],
            '10 TKJ 1' => [
                ['nama' => 'ANGGA', 'nis' => '0192001', 'address' => 'Jl. Flamboyan No. 1', 'is_active' => true],
                ['nama' => 'BINTANG', 'nis' => '0192002', 'address' => 'Jl. Flamboyan No. 2', 'is_active' => true],
                ['nama' => 'CIKO', 'nis' => '0192003', 'address' => 'Jl. Flamboyan No. 3', 'is_active' => true],
                ['nama' => 'DONI', 'nis' => '0192004', 'address' => 'Jl. Flamboyan No. 4', 'is_active' => true],
                ['nama' => 'ELANG', 'nis' => '0192005', 'address' => 'Jl. Flamboyan No. 5', 'is_active' => true],
                ['nama' => 'FERDI', 'nis' => '0192006', 'address' => 'Jl. Flamboyan No. 6', 'is_active' => true],
                ['nama' => 'GUNTUR', 'nis' => '0192007', 'address' => 'Jl. Flamboyan No. 7', 'is_active' => true],
                ['nama' => 'HARRY', 'nis' => '0192008', 'address' => 'Jl. Flamboyan No. 8', 'is_active' => true],
                ['nama' => 'IQBAL', 'nis' => '0192009', 'address' => 'Jl. Flamboyan No. 9', 'is_active' => true],
                ['nama' => 'JULIO', 'nis' => '0192010', 'address' => 'Jl. Flamboyan No. 10', 'is_active' => true],
            ],
            '11 TKJ 1' => [
                ['nama' => 'KURNIA', 'nis' => '0192101', 'address' => 'Jl. Teratai No. 1', 'is_active' => true],
                ['nama' => 'LUKMAN', 'nis' => '0192102', 'address' => 'Jl. Teratai No. 2', 'is_active' => true],
                ['nama' => 'MAULI', 'nis' => '0192103', 'address' => 'Jl. Teratai No. 3', 'is_active' => true],
                ['nama' => 'NAUFAL', 'nis' => '0192104', 'address' => 'Jl. Teratai No. 4', 'is_active' => true],
                ['nama' => 'ODY', 'nis' => '0192105', 'address' => 'Jl. Teratai No. 5', 'is_active' => true],
                ['nama' => 'PANDU', 'nis' => '0192106', 'address' => 'Jl. Teratai No. 6', 'is_active' => true],
                ['nama' => 'RESTU', 'nis' => '0192107', 'address' => 'Jl. Teratai No. 7', 'is_active' => true],
                ['nama' => 'SYAHRUL', 'nis' => '0192108', 'address' => 'Jl. Teratai No. 8', 'is_active' => true],
                ['nama' => 'TOMI', 'nis' => '0192109', 'address' => 'Jl. Teratai No. 9', 'is_active' => true],
                ['nama' => 'UTAMI', 'nis' => '0192110', 'address' => 'Jl. Teratai No. 10', 'is_active' => false],
            ],
            '12 TKJ 1' => [
                ['nama' => 'ANDRE', 'nis' => '0192201', 'address' => 'Jl. Kamboja No. 1', 'is_active' => true],
                ['nama' => 'BRYAN', 'nis' => '0192202', 'address' => 'Jl. Kamboja No. 2', 'is_active' => true],
                ['nama' => 'CHRISTIAN', 'nis' => '0192203', 'address' => 'Jl. Kamboja No. 3', 'is_active' => true],
                ['nama' => 'DERRY', 'nis' => '0192204', 'address' => 'Jl. Kamboja No. 4', 'is_active' => true],
                ['nama' => 'EDWARD', 'nis' => '0192205', 'address' => 'Jl. Kamboja No. 5', 'is_active' => true],
                ['nama' => 'FEBRI', 'nis' => '0192206', 'address' => 'Jl. Kamboja No. 6', 'is_active' => true],
                ['nama' => 'GILBERT', 'nis' => '0192207', 'address' => 'Jl. Kamboja No. 7', 'is_active' => true],
                ['nama' => 'HARYO', 'nis' => '0192208', 'address' => 'Jl. Kamboja No. 8', 'is_active' => true],
                ['nama' => 'ILHAM', 'nis' => '0192209', 'address' => 'Jl. Kamboja No. 9', 'is_active' => true],
                ['nama' => 'JOSHUA', 'nis' => '0192210', 'address' => 'Jl. Kamboja No. 10', 'is_active' => true],
            ],
            '10 DKV 1' => [
                ['nama' => 'ALISHA', 'nis' => '0193001', 'address' => 'Jl. Bougenville No. 1', 'is_active' => true],
                ['nama' => 'BIANCA', 'nis' => '0193002', 'address' => 'Jl. Bougenville No. 2', 'is_active' => true],
                ['nama' => 'CLARA', 'nis' => '0193003', 'address' => 'Jl. Bougenville No. 3', 'is_active' => true],
                ['nama' => 'DEWI', 'nis' => '0193004', 'address' => 'Jl. Bougenville No. 4', 'is_active' => true],
                ['nama' => 'ELVIRA', 'nis' => '0193005', 'address' => 'Jl. Bougenville No. 5', 'is_active' => true],
                ['nama' => 'FIONA', 'nis' => '0193006', 'address' => 'Jl. Bougenville No. 6', 'is_active' => true],
                ['nama' => 'GABRIEL', 'nis' => '0193007', 'address' => 'Jl. Bougenville No. 7', 'is_active' => true],
                ['nama' => 'HANA', 'nis' => '0193008', 'address' => 'Jl. Bougenville No. 8', 'is_active' => true],
                ['nama' => 'IVANA', 'nis' => '0193009', 'address' => 'Jl. Bougenville No. 9', 'is_active' => true],
                ['nama' => 'JASMINE', 'nis' => '0193010', 'address' => 'Jl. Bougenville No. 10', 'is_active' => true],
            ],
            '11 DKV 1' => [
                ['nama' => 'KARINA', 'nis' => '0193101', 'address' => 'Jl. Asoka No. 1', 'is_active' => true],
                ['nama' => 'LAURA', 'nis' => '0193102', 'address' => 'Jl. Asoka No. 2', 'is_active' => true],
                ['nama' => 'MONIKA', 'nis' => '0193103', 'address' => 'Jl. Asoka No. 3', 'is_active' => true],
                ['nama' => 'NIKEN', 'nis' => '0193104', 'address' => 'Jl. Asoka No. 4', 'is_active' => true],
                ['nama' => 'OPHELIA', 'nis' => '0193105', 'address' => 'Jl. Asoka No. 5', 'is_active' => true],
                ['nama' => 'PRISCILLA', 'nis' => '0193106', 'address' => 'Jl. Asoka No. 6', 'is_active' => true],
                ['nama' => 'RACHEL', 'nis' => '0193107', 'address' => 'Jl. Asoka No. 7', 'is_active' => true],
                ['nama' => 'SHERLY', 'nis' => '0193108', 'address' => 'Jl. Asoka No. 8', 'is_active' => true],
                ['nama' => 'TASYIA', 'nis' => '0193109', 'address' => 'Jl. Asoka No. 9', 'is_active' => true],
                ['nama' => 'VALERIE', 'nis' => '0193110', 'address' => 'Jl. Asoka No. 10', 'is_active' => true],
            ],
        ];

        foreach ($classesData as $className => $students) {
            $classroom = Classroom::firstOrCreate(['name' => $className]);

            foreach ($students as $student) {
                Student::firstOrCreate(
                    ['nis' => $student['nis']],
                    array_merge($student, ['classroom_id' => $classroom->id])
                );
            }
        }
    }
}
