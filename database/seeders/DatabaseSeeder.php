<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Knjiga;
use App\Models\User;
use App\Models\Student;
use App\Models\Izdavanje;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Knjiga::truncate();
        User::truncate();
        Student::truncate();
        Izdavanje::truncate();

        $knjiga1 = new Knjiga;
        $knjiga1->naziv = "The Lord of the Rings";
        $knjiga1->autor = "J. R. R. Tolkin";
        $knjiga1->godina_izdanja = 2022;
        $knjiga1->izdavac = "Laguna";
        $knjiga1->zanr = "epska fantastika";
        $knjiga1->save();

        $knjiga2 = Knjiga::create([
            'naziv' => "1984",
            'autor' => "George Orwell",
            'godina_izdanja' => 2021,
            'izdavac' => "Vulkan",
            'zanr' => "naucna fantastika"
        ]);

        $knjiga3 = Knjiga::create([
            'naziv' => "The Great Gatsby",
            'autor' => "F. Scott Fitzgerald",
            'godina_izdanja' => 2010,
            'izdavac' => "Vulkan",
            'zanr' => "tragedija"
        ]);

        $knjiga4 = Knjiga::create([
            'naziv' => 'Don Quixote',
            'autor' => 'Miguel de Cervantes',
            'godina_izdanja' => 2015,
            'izdavac' => 'Delfi',
            'zanr' => 'avantura'
        ]);

        Knjiga::insert([
            [
                'naziv' => 'One Hundred Years of Solitude',
                'autor' => 'Gabriel Garcia Marquez',
                'godina_izdanja' => 2018,
                'izdavac' => 'Vulkan',
                'zanr' => 'realizam'
            ],
            [
                'naziv' => 'Animal Farm',
                'autor' => 'George Orwell',
                'godina_izdanja' => 2011,
                'izdavac' => 'Laguna',
                'zanr' => 'politicka satira'
            ],
        ]);

        $student1 = Student::create([
            'ime' => 'Nikola',
            'prezime' => 'Nikolic',
            'pol' => 'male'
        ]);
        $student2 = Student::create([
            'ime' => 'Ana',
            'prezime' => 'Jankovic',
            'pol' => 'female'
        ]);

        Student::factory(3)->create();

        $user1 = User::create([
            'name' => "Andjela N",
            'email' => "andjela@gmail.com",
            'password' => bcrypt('andjela123')
        ]);
        
        $user = User::factory(3)->create();

        Izdavanje::insert([
            [
                'naziv_knjige' => $knjiga1->naziv,
                'autor_knjige' => $knjiga1->autor,
                'napomena' => 'U knjizi nedostaje 10 strana.',
                'datum_izdavanja' => '2022-11-11',
                'datum_vracanja' => '2022-12-01',
                'knjiga_id' => $knjiga1->id,
                'student_id' => $student1->id,
                'user_id' => $user1->id
            ], 
            [
                'naziv_knjige' => $knjiga1->naziv,
                'autor_knjige' => $knjiga1->autor,
                'napomena' => 'Knjiga je vracena u dobrom stanju.',
                'datum_izdavanja' => '2023-01-03',
                'datum_vracanja' => '2023-01-19',
                'knjiga_id' => $knjiga1->id,
                'student_id' => $student2->id,
                'user_id' => $user1->id
            ],
            [
                'naziv_knjige' => $knjiga3->naziv,
                'autor_knjige' => $knjiga3->autor,
                'napomena' => 'Knjiga je vracena u dobrom stanju.',
                'datum_izdavanja' => '2022-05-04',
                'datum_vracanja' => '2022-06-19',
                'knjiga_id' => $knjiga3->id,
                'student_id' => $student2->id,
                'user_id' => $user1->id
            ]
        ]);

       

    }

}