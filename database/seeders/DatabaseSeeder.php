<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(SongSeeder::class);
        $this->call(PartSeeder::class);
        $this->call(Part_SongSeeder::class);
        $this->call(Practice_SongSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(DesireSeeder::class);
        $this->call(AnnouncementSeeder::class);
    }
}
