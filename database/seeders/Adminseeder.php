<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['first_name'=>'Admin','email'=>'admin11@gmail.com','password'=>bcrypt('admin@1010'),'img'=>'avatar.png','user_type'=>1,'created_by'=>1]);
    }
}
