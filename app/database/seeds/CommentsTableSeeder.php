<?php

class CommentsTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        // DB::table('comments')->truncate();

        $comments = [];
        for ($i = 1; $i < 10; $i++) {
            $comments[] = [
                    'content' => 'sdfsdfdsf' . $i,
                    'email' => 'test@test.com' . $i,
                    'article_id' => $i,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d'),
                ];
        }

        // Uncomment the below to run the seeder
        DB::table('comments')->insert($comments);
    }

}
