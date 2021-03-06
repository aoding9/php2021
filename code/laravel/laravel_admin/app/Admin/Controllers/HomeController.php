<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        // return $content
            // ->title('我是标题')
            // ->description('我是描述')
            // ->row(Dashboard::title())
            // ->row(function (Row $row){
            //     $row->column(4,function (Column $column) {
            //         $column->append(Dashboard::environment());
            //     });
            // });
           /*  ->row(function (Row $row) {
                $row->column(4, 'xxx');

                $row->column(8, function (Column $column) {
                    $column->row('111');
                    $column->row('222');
                    $column->row('333');
                });
            }); */

        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
