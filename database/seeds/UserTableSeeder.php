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
            'name'     => 'Eli',
            'email'    => 'eli@askes.com',
            'address'  => 'Jl. Baru dimana ajah',
            'phone'    => '84343242342',
            'password' => bcrypt('askes'),
        ]);

        $petugas->assignRole('admin');

        $this->command->info('>_ Here is your admin details to login:');
        $this->command->warn($petugas->email);
        $this->command->warn('Password is "askes"');

        // anggota
        $anggota = factory(User::class)->create([
            'name'     => 'John Doe',
            'email'    => 'user@askes.com',
            'address'  => 'Jl. Dimana ini',
            'phone'    => '5344542435',
            'password' => bcrypt('askes'),
        ]);

        $anggota->assignRole('user');

        $this->command->info('>_ Here is your user details to login:');
        $this->command->warn($anggota->email);
        $this->command->warn('Password is "askes"');

        // bersihkan cache
        $this->command->call('cache:clear');
    }
}
