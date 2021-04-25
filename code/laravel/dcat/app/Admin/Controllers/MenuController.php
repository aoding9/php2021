<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Movie;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\MenuController as menu;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Box;
use Dcat\Admin\Widgets\Form as WidgetForm;

class MenuController extends menu
{
    public function index(Content $content)
    {
        return $content
            ->title($this->title())
            ->description(trans('admin.list'))
//            ->body(function (Row $row) {
//                $row->column(7, $this->treeView()->render());
//
//            });
        ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new \Dcat\Admin\Http\Repositories\Menu(), function (Grid $grid) {
            $grid->id;
            $grid->title;

            // 查出所有的权限数据
            $nodes = (new \Dcat\Admin\Models\Menu())->allNodes();

// 传入二维数组（未分层级）
            $grid->menus->showTreeInDialog($nodes);

// 也可以传入闭包
            $grid->menus->showTreeInDialog(function (Grid\Displayers\DialogTree $tree) use (&$nodes) {
                // 设置所有节点
                $tree->nodes($nodes);

                // 设置节点数据字段名称，默认"id"，"name"，"parent_id"
                $tree->setIdColumn('id');
                $tree->setTitleColumn('title');
                $tree->setParentColumn('parent_id');

                // $this->roles 可以获取当前行的字段值
//                foreach (array_column($this->roles, 'slug') as $slug) {
//                    if ($roleModel::isAdministrator($slug)) {
//                        // 选中所有节点
                        $tree->checkAll();
//                    }
//                }
            });

        });
    }

}
