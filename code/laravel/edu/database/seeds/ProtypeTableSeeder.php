<?php

use Illuminate\Database\Seeder;

class ProtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data =[
        [
          'protype_name'=>'后端',
          'created_at'=>date('Y-m-d H-i-s'),
          'status'=>'2'
        ],
        [
          'protype_name'=>'前端',
          'created_at'=>date('Y-m-d H-i-s'),
          'status'=>'2'
        ],
        [
          'protype_name'=>'运维',
          'created_at'=>date('Y-m-d H-i-s'),
          'status'=>'2'
        ],
        [
          'protype_name'=>'网络营销',
          'created_at'=>date('Y-m-d H-i-s'),
          'status'=>'2'
        ]

      ];
      DB::table('protype')->insert($data);
    }
}
