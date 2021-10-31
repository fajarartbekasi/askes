<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ketua
        $petugas = factory(User::class)->create([
            'name'     => 'Taylor Otwell',
            'email'    => 'admin@askes.com',
            'password' => bcrypt('askes'),
        ]);

        $petugas->assignRole('admin');

        $this->command->info('>_ Here is your admin details to login:');
        $this->command->warn($petugas->email);
        $this->command->warn('Password is "password"');

        // anggota
        $anggota = factory(User::class)->create([
            'name'     => 'John Doe',
            'email'    => 'user@perpustakaan.com',
            'password' => bcrypt('password'),
        ]);

        $anggota->assignRole('user');

        $this->command->info('>_ Here is your user details to login:');
        $this->command->warn($anggota->email);
        $this->command->warn('Password is "password"');

        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
