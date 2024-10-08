<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Box;
use App\Models\ContractModel;
use App\Models\Tenant;
use App\Models\Contract;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Box::factory(40)->create();
        // Tenant::factory(100)->create();
        // ContractModel::factory(15)->create();
        // Contract::factory(10)->create();
        Invoice::factory(10)->create();
    }
}
