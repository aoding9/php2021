<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordAndRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //写关键词表数据
      DB::table('keyword') -> insert([
        ['keyword'	=>	'搞笑'],
        ['keyword'	=>	'生活方式'],
        ['keyword'	=>	'芳华'],
        ['keyword'	=>	'冯小刚'],
        ['keyword'	=>	'娱乐'],
        ['keyword'	=>	'Instagram'],
        ['keyword'	=>	'爱存图'],
        ['keyword'	=>	'SSR'],
      ]);
       //写关系表
       DB::table('relation') -> insert([
         [
           'article_id'	=>	rand(1,5),
           'keyword_id'	=>	rand(1,8)
         ],
         [
           'article_id'	=>	rand(1,5),
           'keyword_id'	=>	rand(1,8)
         ],
         [
           'article_id'	=>	rand(1,5),
           'keyword_id'	=>	rand(1,8)
         ],
         [
           'article_id'	=>	rand(1,5),
           'keyword_id'	=>	rand(1,8)
         ],
         [
           'article_id'	=>	rand(1,5),
           'keyword_id'	=>	rand(1,8)
         ]
       ]);
}
}
