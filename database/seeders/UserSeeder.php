<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\CoverLetter;
use App\Models\DeathPerson;
use App\Models\PublicComplaint;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::count();
        if (!$user) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@tsel-jatimbalnus.test',
                'email_verified_at' => now(),
                'password' => bcrypt(12345678),
            ]);
        }
    }
}
