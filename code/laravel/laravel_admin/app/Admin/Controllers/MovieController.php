<?php

namespace App\Admin\Controllers;

use App\Models\Movie;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Box;

// 依赖注入,把被依赖的对象的实例化过程拿到类的外面进行,修改一个时,不需要去修改另一个,实现解耦
// 原理:php检测到index2需要Haha类型的参数时,会触发构造方法,从而初始化一些东西,比如查数据什么的(__get也可以触发)

// 服务容器:
// 把那些可能用到的类或者接口放到容器里面进行管理,在需要依赖时利用依赖注入从容器中获取,实例化是在容器中进行的,只要可以访问容器,就可以随时获取其中的东东
// 服务提供者:
// 实现把东西放到服务容器里面这个过程的类,通常是把类或接口注册到容器里面,并且定义该类被依赖时,要如何注入.一般是返回该类的实例对象,如果是依赖接口,还可以绑定接口的实现类,从而自动返回接口实现后的实例

// 这里的依赖注入是在同一个文件里面,而服务容器则是把这些都放在自己里面,提供者就是执行放进去这个动作的
class Haha
{
    protected $haha;
    public function getHaha()
    {
        $this->haha = '哈哈哈';
    }
}

class MovieController extends AdminController
{
    // 假设当前类依赖于Haha的私有属性haha,把他作为参数传给构造方法或者__set魔术方法,然后绑定为自己的属性,一旦类被实例化,就会去实例化一个Haha,然后类里面都可以访问getHaha了
    protected $haha;
    public function __construct(Haha $haha)
    {
        $this->haha = $haha->getHaha();
    }

    public function index2(Haha $haha)
    {
        dump($this->haha);
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movie';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // Movie::factory()->count(20)->create();

        $grid = new Grid(new Movie);
        // $grid->model()->orderBy('id', 'asc');
        $grid->model()->orderBy('id', 'desc');

        // 第一列显示id字段，并将这一列设置为可排序列
        $grid->column('id', 'ID')->sortable()->filter([
            0 => '未知',
            1 => '已下单',
            2 => '已付款',
            3 => '已取消',
        ]);;

        // 第二列显示title字段，由于title字段名和Grid对象的title方法冲突，所以用Grid的column()方法代替
        $grid->column('title')->filter('like');


        // 第三列显示director字段，通过display($callback)方法设置这一列的显示内容为users表中对应的用户名
        $grid->column('director')->display(function ($userId) {
            // dump($userId);

            // dd(User::factory()->count(10)->create());
            // dump(User::find($userId));
            // dd(User::find($userId)->name);
            return User::find($userId)->name;
        });

        // 第四列显示为describe字段
        $grid->column('describe');

        // 第五列显示为rate字段
        $grid->column('rate');

        // 第六列显示released字段，通过display($callback)方法来格式化显示输出
        $grid->column('released', '上映?')->display(function ($released) {
            return $released ? '是' : '否';
        });

        // 下面为三个时间字段的列显示
        $grid->column('release_at')->date('Y-m-d h:i:s')->filter('date');
        $grid->column('created_at')->date('Y-m-d h:i:s');
        $grid->column('updated_at')->date('Y-m-d h:i:s');

        // filter($callback)方法用来设置表格的简单搜索框
        $grid->filter(function ($filter) {

            // 设置created_at字段的范围查询
            $filter->between('created_at', 'Created Time')->datetime();
        });
        // 默认为每页20条
        $grid->paginate(15);

        // 添加不存在的字段
        $grid->column('操作')->display(function () {
            return '<button>编辑</button><button>删除</button>';
            // display绑定了当前行数据对象
            // return $this->title;
        });
        // 禁用创建按钮
        // $grid->disableCreateButton();
        // 添加列
        // $grid->column('username', '用户名');
        // $grid->username('用户名');


        // $grid = new Grid(new Movie());

        // $grid->column('id', __('Id'))->sortable();
        // $grid->column('title', __('标题'));
        // $grid->column('director', __('导演'));
        // $grid->column('describe', __('描述'));
        // $grid->column('rate', __('评分'));
        // $grid->column('released', __('是否上映'));
        // $grid->column('release_at', __('上映时间'));
        // $grid->column('created_at', __('创建时间t'));
        // $grid->column('updated_at', __('更新时间'));
        $grid->filter(function ($filter) {

            $filter->group('rate', function ($group) {
                $group->gt('大于');
                $group->lt('小于');
                $group->nlt('不小于');
                $group->ngt('不大于');
                $group->equal('等于');
            });
        });

        // 导出
        $grid->export(function ($export) {
            // dump($export);

            // 指定导出的文件名
            $export->filename('movies.csv');

            // 排除
            $export->except(['created_at', 'updated_at']);

            // 只导出
            $export->only(['id', 'title', 'rate', 'describe']);

            // 导出原始数据(因为字段被处理后可能是html内容)
            $export->originalValue(['released', 'release_at']);

            // 自定义导出实现,$value是修改后的数据,$original是原始数据
            $export->column('column_5', function ($value, $original) {
                return $value;
            });
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
        $show = new Show(Movie::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('director', __('Director'));
        $show->field('describe', __('Describe'));
        $show->field('rate', __('Rate'));
        $show->field('released', __('Released'));
        $show->field('release_at', __('Release at'));
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
        /* $form = new Form(new Movie());

        $form->text('title', __('Title'));
        $form->number('director', __('Director'));
        $form->text('describe', __('Describe'));
        $form->switch('rate', __('Rate'));
        $form->text('released', __('Released'));
        $form->datetime('release_at', __('Release at'))->default(date('Y-m-d H:i:s')); */

        $form = new Form(new Movie);

        // 显示记录id
        $form->display('id', 'ID');

        // text 添加text类型的input框
        // default 默认信息
        // autofocus 自动获取焦点
        $form->text('title', '电影标题')->default('流浪地球')->autofocus()->rules([
            'required'
        ]);

        $directors = [
            1 => 'John',
            2 => 'Smith',
            3 => 'Kate',
        ];

        // select 下拉选项
        $form->select('director', '导演')->options($directors)->help('帮助信息');

        // textarea 文本域
        // 添加describe的textarea输入框
        $form->textarea('describe', '简介')->placeholder('请输入描述');

        // number 数字输入框
        // pattern 用正则模式 验证输入的值
        $form->number('rate', '打分')->pattern('[0-5]{1}');

        // switch 添加开关操作
        // $form->switch('released', '发布？')->value('0');
        $form->switch('released', '发布？')->value('1')->attribute(['onchange' => 'alert(111)']);;

        // 添加日期时间选择框
        // readonly只读, 另外disable是禁用
        // $form->datetime('release_at', '发布时间')->readonly();
        $form->datetime('release_at', '发布时间')->disable();

        // 两个时间显示
        $form->datetime('created_at', '创建时间');
        $form->datetime('updated_at', '修改时间');

        // 右上角工具栏
        /* $form->tools(function (Form\Tools $tools) {

            // 去掉`列表`按钮
            $tools->disableList();

            // 去掉`删除`按钮
            $tools->disableDelete();

            // 去掉`查看`按钮
            $tools->disableView();

            // 添加一个按钮, 参数可以是字符串, 或者实现了Renderable或Htmlable接口的对象实例
            $tools->append('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        }); */
        // 设置宽度
        $form->setWidth(10, 2);

        // 设置提交的action
        // $form->setAction('admin/users');

        // 底部
        /*  $form->footer(function ($footer) {

            // 去掉`重置`按钮
            $footer->disableReset();

            // 去掉`提交`按钮
            $footer->disableSubmit();

            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();

        }); */

        $form->confirm('确定更新吗？', 'edit');

        $form->confirm('确定创建吗？', 'create');

        $form->confirm('确定提交吗？');

        return $form;
    }
}
