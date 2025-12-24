<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RemoveAdminsSeeder extends Seeder
{
    public function run()
    {
        User::whereIn('email', [
            'maurices.comlan@gmail.com',
            'admin@uac.bj'
        ])->delete();
    }
}
