<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\UserProfile;
use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Widgets\Card;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Contracts\Support\Renderable;
use \Admin;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->wrap(function (Renderable $view) {
                $tab = Tab::make();

                $tab->add('示例', $view);
                $tab->add('示例2', '123213');
//                $tab->add('代码', $this->code(), true);

                return $tab;
            });
// 开启字段选择器功能
            $grid->showColumnSelector();
            $grid->enableDialogCreate();
            $grid->model()->setConstraints([
                'key1' => 'v1',
            ]);
//            $grid->column('id')->sortable();
//            $grid->column('id');
            $grid->column('id')
                ->display('查看') // 设置按钮名称
                ->modal(function ($modal) {
                    // 设置弹窗标题
                    $modal->title('邮箱 '.$this->email);

                    // 自定义图标
                    $modal->icon('feather icon-user');

                    $card = new Card('性别', $this->gender==0?'男':'女');

                    return "<div style='padding:10px 10px 0'>$card</div>";
                })->help('提示信息');

            $grid->column('name');
            $grid->column('email')->badge('danger');
            $grid->column('email_verified_at');
            $grid->column('created_at')->expand(function (Grid\Displayers\Expand $expand) {
                // 设置按钮名称
//                $expand->button('详情');

                // 返回显示的详情
                // 这里返回 content 字段内容，并用 Card 包裹起来
                $card = new Card(null, $this->created_at);

                return "<div style='padding:10px 10px 0'>$card</div>";
            });

            $grid->column('updated_at')->sortable();
//            $grid->gender()->using([0=>'男',1=>'女']);
            $grid->gender()->switch();
            $grid->user->display('View')->expand(UserProfile::make(['type' => 1]));
//            ->click表示点击选中
            $grid->rowSelector()->style('info')->background(Admin::color()->dark50())->click();
            $grid->addTableClass(['table-text-center']);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });


        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('id');
            $show->field('name');
            $show->field('email');
            $show->field('email_verified_at');
            $show->field('password');
            $show->field('remember_token');
            $show->field('gender');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('email');
            $form->text('email_verified_at');
            $form->text('password');
            $form->text('remember_token');
            $form->text('gender');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
