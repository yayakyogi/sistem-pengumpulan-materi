<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke tabel
        DB::table('users')->insert([
            [
                'id' => 1080,
                'nama' => 'Andi',
                'email' => 'andi@gmail.com',
                'password' => bcrypt(12345),
                'role' => 'Guru',
                'kelas' => 0,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'id' => 1090,
                'nama' => 'Bella',
                'email' => 'Bella@gmail.com',
                'password' => bcrypt(12345),
                'role' => 'Siswa',
                'kelas' => 4,
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
