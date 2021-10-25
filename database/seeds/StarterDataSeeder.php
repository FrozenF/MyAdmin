<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Group;
use App\Models\User;
class StarterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $master = Menu::firstOrCreate(['nama_menu'=>'Master','icon_menu'=>'fas fa-book']);
        $utility = Menu::firstOrCreate(['nama_menu'=>'Utility','icon_menu'=>'fas fa-tools']);
        $utility_user  = Menu::firstOrCreate(['nama_menu'=>'User','icon_menu'=>'fas fa-users','parent_id'=>$utility->id,'link_menu' => '/utility/user']);
        $utility_group = Menu::firstOrCreate(['nama_menu'=>'Group','icon_menu'=>'fas fa-layer-group','parent_id'=>$utility->id,'link_menu' => '/utility/group']);
        $utility_menu  = Menu::firstOrCreate(['nama_menu'=>'Menu','icon_menu'=>'fas fa-bars','parent_id'=>$utility->id,'link_menu' => '/utility/menu']);

        $builder = Menu::firstOrCreate(['nama_menu'=>'Builder','icon_menu'=>'fas fa-magic-wand']);
        $builder_crud = Menu::firstOrCreate(['nama_menu'=>'CRUD','icon_menu'=>'fas fa-table','parent_id'=>$builder->id,'link_menu' => '/builder/crud']);

        $group_sys = Group::firstOrCreate(['singkatan_group'=>'SYS-ADMIN','nama_group'=>'SYSTEM ADMINISTRATOR']);

        $check = User::where('username','admin')->first();
        if(empty($check))
        {
            $user_admin = User::firstOrCreate([
                'username' => 'admin',
                'password' => bcrypt('password'),
                'nama_lengkap' => 'System Administrator',
                'group_id' => $group_sys->id
            ]);
        }

    }
}
