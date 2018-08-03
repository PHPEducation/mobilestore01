<?php

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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AboutsTableSeeder::class);
        $this->call(AccessoriesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategorizablesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(DetailOrdersTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(ModeOfPaymentsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(WarehousesTableSeeder::class);

    }
}
