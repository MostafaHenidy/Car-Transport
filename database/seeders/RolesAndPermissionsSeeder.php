<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = [
            'ListAllSupportTickets',
            'ViewSupportTicket',
            'UpdateTicketStatus',
            'DeleteTicket',
            'ReplyToSupportTicket',
        ];
        $SupportStuffRole = Role::where('name', 'supportStuff')->first();
        foreach ($permissions as $permission) {
            $permissionModel = Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'support_stuff']
            );
            if ($SupportStuffRole) {
                $SupportStuffRole->givePermissionTo($permissionModel);
            }
        }
    }
}
