<?php use Illuminate\Database\Seeder;

class CatandsubcatandsubsubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $filePath = database_path('opensook.sql.zip');

        if(File::exists($filePath)){
            DB::unprepared(file_get_contents($filePath));
            $this->command->info('Categories & Subs Tables Seed');
        }
    }
}
