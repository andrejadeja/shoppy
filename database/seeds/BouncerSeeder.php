<?php

use Illuminate\Database\Seeder;

use App\User;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('superadmin')->everything();

        Bouncer::allow('admin')->everything();

        Bouncer::allow('owner')->toOwn(App\Shop::class);

        Bouncer::allow('worker')->toManage(App\Product::class);

    }
}
