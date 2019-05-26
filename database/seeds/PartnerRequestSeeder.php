<?php

use Illuminate\Database\Seeder;

class PartnerRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\PartnerRequest::class, 2)->create();
    }
}
