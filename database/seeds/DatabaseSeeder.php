<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        // Eloquent::unguard();

        // //disable foreign key check for this connection before running seeders
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // $this->call('PostTableSeeder');

        // // supposed to only apply to a single connection and reset it's self
        // // but I like to explicitly undo what I've done for clarity
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}

class PostTableSeeder extends Seeder
{
    public function run()
    {
        App\Models\Post::truncate();
        factory(App\Models\Post::class, 20)->create();
    }
}