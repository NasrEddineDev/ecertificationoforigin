<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            SubCategorySeeder::class,
            CountrySeeder::class,
            StateSeeder::class,
            AlgeriaCitySeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            ProfileSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            ManagerSeeder::class,
            EnterpriseSeeder::class,
            ProductSeeder::class,
            ImporterSeeder::class,
            ActivitySeeder::class,
            SettingSeeder::class,
        ]);
        $this->command->info('All tables are seeded!');
    }
}
