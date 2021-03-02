<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleAndAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            //插入数据 - Article表
      DB::table('article') -> insert([
        [
          'article_name'	=>	'如何让皮肤变好？',
          'author_id'		=>	rand(1,5)
        ],
        [
          'article_name'	=>	'雅思有必要报班吗？',
          'author_id'		=>	rand(1,5)
        ],
        [
          'article_name'	=>	'女生们被关注腿是什么感受？',
          'author_id'		=>	rand(1,5)
        ],
        [
          'article_name'	=>	'有真正靠炒股发家致富的例子？',
          'author_id'		=>	rand(1,5)
        ],
        [
          'article_name'	=>	'当电影里的牛逼台词出现在现实生活中……',
          'author_id'		=>	rand(1,5)
        ],
      ]);
      //插入数据 - Author表
      DB::table('author') -> insert([
        [
          'author_name'	=>	'木子李'
        ],
        [
          'author_name'	=>	'软软'
        ],
        [
          'author_name'	=>	'杏菜不知道啊'
        ],
        [
          'author_name'	=>	'麦龟迪'
        ],
        [
          'author_name'	=>	'郝给力'
        ],
      ]);
    }
}
