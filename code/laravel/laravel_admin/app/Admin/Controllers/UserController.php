<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Export\UsersExporter;
use App\Admin\Extensions\Tools\UserGender;
//use App\Admin\Forms\Setting;
use App\Admin\Forms\Setting;
use App\Models\User;
use DB;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Box;
use Request;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */


    protected function grid()
    {
        $grid = new Grid(new User());
//        导出按钮
        $grid->exporter(new UsersExporter());

        // 自定义头部工具的配合
        if (in_array(Request::get('gender'), ['1', '0'])) {
            $grid->model()->where('gender', Request::get('gender'));
        }


        // totalRow 追加统计行
        $grid->column('id', __('Id'))->totalRow(function ($id) {

            return "<span class='text-danger text-bold'> id合计 {$id} </span>";
        });
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('password', __('Password'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        // 一对一关联
        $grid->column('profile.age', '年龄')->display(function ($age) {
            return "$age";
        });
        // $grid->column('profile.gender', '性别')->display(function ($gender) {
        //     return $gender ? '男' : '女';
        // });
        $grid->column('gender', '性别')->display(function ($gender) {
            return $gender ? '男' : '女';
        });


        //or
        // $grid->profile()->age();
        // $grid->profile()->gender();

        // 头部和底部
        $grid->header(function ($query) {
            $gender = $query->select(DB::raw('count(gender) as count, gender'))
                ->groupBy('gender')->get()->pluck('count', 'gender')->toArray();

            $doughnut = view('admin.chart.gender', compact('gender'));

            return new Box('性别比例', $doughnut);
        });

        $grid->footer(function ($query) {
            // 查询出人数count 金额合计用sum
            $data = $query->where('gender', 0)->count();

            return "<div style='padding: 10px;'>男性人数 ： $data</div>";
        });

        // 快捷搜索
        $grid->quickSearch(function ($model, $query) {
            $model->where('name', 'like', "%{$query}%")->orWhere('email', 'like', "%{$query}%");
        });

        $grid->tools(function ($tools) {
            $tools->append(new UserGender());
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */


    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */

    protected function form()
    {
        $form = new Form(new User());

        /*         $form->text('name', __('name'));
        $form->email('email', __('Email'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Password'));
        $form->text('remember_token', __('Remember token')); */

        // tab  表单tab
       /*  $form->tab('Basic info', function ($form) {

            $form->text('name');
            $form->email('email');
        })->tab('Profile', function ($form) {

            // $form->image('avatar');
            $form->switch('gender');
            // $form->mobile('phone');
        })->tab('Profile', function ($form) {
            $form->hasOne('profile', function ($form) {
                // $form->text('company');
                // $form->date('start_date');
                // $form->date('end_date');
                $form->text('content');
                $form->datetime('created_at');
            });
        }); */

        // fieldset设置表单项组合
        $form->fieldset('用户信息', function (Form $form) {
            $form->text('name','我是name')->rules('required|min:10');
            // 数据列表下拉候选
            // $form->text('gender')->icon('fa-male')->datalist(['男','女']);

            // 单选按钮
            $form->radio('gender','性别')->options(['0'=>'男',1=>'女'])->default(1);
            // 竖排的单选按钮
            $form->radio('gender','性别')->options(['0'=>'男',1=>'女'])->default(1)->stacked();
            $form->radioButton('gender','性别')->options(['0'=>'男',1=>'女'])->default(1);
            $form->radioCard('gender','性别')->options(['0'=>'男',1=>'女'])->default(1);

            $form->email('email')->icon('fa-pencil');
        });

        return $form;
    }


    public function setting(Content $content)
    {

        return $content
            ->title('网站设置')
            ->body(new Setting());
    }
}
