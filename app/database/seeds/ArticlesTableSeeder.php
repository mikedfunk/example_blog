<?php

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('articles')->truncate();

        $articles = [];
        for ($i = 1; $i < 10; $i++) {
            $articles[] = [
                    'title' => 'sadfdsf' . $i,
                    'content' => 'sdfsdfdsf' . $i,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d'),
                ];
        }

        // Uncomment the below to run the seeder
        DB::table('articles')->insert($articles);
    }

}
