<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('comment') -> insert([
        [
          'comment'	=>	'千万不要活在幻想里，我就是天天做梦',
          'article_id'=>	rand(1,5)
        ],
        [
          'comment'	=>	'你就是铁头功？……铁头功？……铁头功是吧？',
          'article_id'=>	rand(1,5)
        ],
        [
          'comment'	=>	'可以说很正能量了',
          'article_id'=>	rand(1,5)
        ],
        [
          'comment'	=>	'你的赞好少啊软软',
          'article_id'=>	rand(1,5)
        ],
      ]);
    }
}
