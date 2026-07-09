<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@chapeacao.local',
            'password' => Hash::make('Admin@12345'),
            'phone' => '(51) 98765-4321',
            'status' => 'active',
            'last_login' => now(),
        ]);
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);

        // Manager User
        $manager = User::create([
            'name' => 'Gerente da Oficina',
            'email' => 'gerente@chapeacao.local',
            'password' => Hash::make('Gerente@12345'),
            'phone' => '(51) 98765-4322',
            'status' => 'active',
        ]);
        $managerRole = Role::where('name', 'manager')->first();
        $manager->roles()->attach($managerRole);

        // Worker User 1
        $worker1 = User::create([
            'name' => 'João Silva - Operário',
            'email' => 'joao@chapeacao.local',
            'password' => Hash::make('Worker@12345'),
            'phone' => '(51) 98765-4323',
            'status' => 'active',
        ]);
        $workerRole = Role::where('name', 'worker')->first();
        $worker1->roles()->attach($workerRole);

        // Worker User 2
        $worker2 = User::create([
            'name' => 'Maria Santos - Operária',
            'email' => 'maria@chapeacao.local',
            'password' => Hash::make('Worker@12345'),
            'phone' => '(51) 98765-4324',
            'status' => 'active',
        ]);
        $worker2->roles()->attach($workerRole);

        // Receptionist User
        $receptionist = User::create([
            'name' => 'Ana Costa - Recepcionista',
            'email' => 'recepcionista@chapeacao.local',
            'password' => Hash::make('Recep@12345'),
            'phone' => '(51) 98765-4325',
            'status' => 'active',
        ]);
        $receptionistRole = Role::where('name', 'receptionist')->first();
        $receptionist->roles()->attach($receptionistRole);
    }
}
