<?php

namespace App\Admin\Actions\Profile;

use App\Models\Profile;
use Encore\Admin\Actions\RowAction;

class GenderProfile extends RowAction
{
    // 在页面点击这一列的图表之后，发送请求到后端的handle方法执行
    public function handle(Profile $profile)
    {
        // 切换`gender`字段的值并保存
        $profile->gender = (int) !$profile->gender;
        $profile->save();

        // 保存之后返回新的html到前端显示
        $html = $profile->gender ? "<i class=\"fa fa-male\"></i>" : "<i class=\"fa fa-female\"></i>";

        return $this->response()->html($html);
    }

    // 这个方法来根据`gender`字段的值来在这一列显示不同的图标
    public function display($gender)
    {
        return $gender ? "<i class=\"fa fa-male\"></i>" : "<i class=\"fa fa-female\"></i>";
    }
    
}