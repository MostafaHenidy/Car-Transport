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
            'ListAllOrders',
            'UpdateOrderState',
            'ListAllTrips',
            'UpdateTrip',
            'CreateTrip',
            'DeleteTrip',
            'ListAllSupportTickets',
            'ViewSupportTicket',
            'ReplyToSupportTicket',
            'ListAllReviews',
            'ApproveReview',
            'ListAllDeletedUser',
            'RecoverUserAccount',
        ];
        $AdminRole = Role::where('name', 'admin')->first();
        foreach ($permissions as $permission) {
            $AdminRole->givePermissionTo($permission);
        }
    }
}
