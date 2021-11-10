<?php

use Illuminate\Database\Seeder;
use App\MyModel\Type;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Type::truncate();
        Type::create(['name' => 'ትኩስ ነገር']);
        Type::create(['name' => 'ቁርስ']);
        Type::create(['name' => 'ምሳ']);
        Type::create(['name' => 'እራት']);
        Type::create(['name' => 'ለስላሳና ውሃ']);
        Type::create(['name' => 'አትክልት']);
        Type::create(['name' => 'ማቆያ']);
        Type::create(['name' => 'ለጅማሮ']);
        Type::create(['name' => 'ሌላ']);
    }
}
