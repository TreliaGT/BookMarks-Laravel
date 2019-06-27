<?php

use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->insert([
            'title' => 'Harry Potter and the Prisoner of Azkaban - Gryffindor House Edition',
            'url' => 'https://www.booktopia.com.au/harry-potter-and-the-prisoner-of-azkaban-gryffindor-house-edition-j-k-rowling/prod9781526606167.html',
            'description' => 'Let the magic of J.K. Rowlings classic Harry Potter series take you back to Hogwarts School of Witchcraft and Wizardry. Issued to mark the 20th anniversary of first publication of Harry Potter and the Prisoner of Azkaban, this irresistible Gryffindor House Edition celebrates the noble character of the Hogwarts house famed for its courage, bravery and determination. Harrys third year at Hogwarts is packed with thrilling Gryffindor moments, including the appearance four of its most memorable alumni, Messrs Moony, Wormtail, Padfoot and Prongs!',
            'status'=> 1,
            'user_id' => 3,
        ]);

    }
}
