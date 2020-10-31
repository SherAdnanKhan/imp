<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Kelex_students_session;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
         \App\Models\Kelex_campus::factory(10)->create();
        \App\Models\Kelex_class::factory(10)->create();
        \App\Models\kelex_section::factory(10)->create();
        \App\Models\Kelex_sessionbatch::factory(10)->create();
        \App\Models\Kelex_subject::factory(10)->create();
        \App\Models\Kelex_employee::factory(10)->create();
          \App\Models\Kelex_student::factory(10)->create();
          \App\Models\Kelex_month::factory(12)->create();
||||||| merged common ancestors
       //  \App\Models\Kelex_campus::factory(10)->create();
        // \App\Models\Kelex_class::factory(10)->create();
        // \App\Models\kelex_section::factory(10)->create();
       // \App\Models\Kelex_sessionbatch::factory(10)->create();
       // \App\Models\Kelex_subject::factory(10)->create();
      // \App\Models\Kelex_employee::factory(10)->create();
      \App\Models\Kelex_student::factory(10)->create();
=======
       //  \App\Models\Kelex_campus::factory(10)->create();
        // \App\Models\Kelex_class::factory(10)->create();
        // \App\Models\kelex_section::factory(10)->create();
       // \App\Models\Kelex_sessionbatch::factory(10)->create();
       // \App\Models\Kelex_subject::factory(10)->create();
       \App\Models\Kelex_employee::factory(10)->create();
      \App\Models\Kelex_student::factory(10)->create();
>>>>>>> 1ed5414349a902aac3c434b1df0a349872b9f49a
    }
}
