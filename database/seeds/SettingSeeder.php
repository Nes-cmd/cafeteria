<?php

use Illuminate\Database\Seeder;
use App\MyModel\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Setting::truncate();
        
        Setting::create(['name' => 'Strict','descreption' =>'ይህ ከበራ በድርጅትዎ ያልተመዘገበ ሰው ምንም ማዘዝ አይችልም']);
        Setting::create(['name' => 'Flexiblity','descreption' => 'ይህ ከበራ ደንበኞች ራሳቸውን መመዝገብ ያስችላል']);
        Setting::create(['name' => 'Pay by customer','descreption' => 'ይህ ከበራ አፑ የአገልግሎት ከደንበኞች 1% የአገልግሎት ይቆርጣል']);
        
    }
}
