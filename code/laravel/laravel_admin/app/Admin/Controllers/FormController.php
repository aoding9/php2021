<?php
namespace App\Admin\Controllers;

use App\Admin\Forms\Steps;
use App\Admin\Forms\Settings;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\MultipleSteps;

class FormController extends Controller
{
    public function settings(Content $content)
    {
        $forms = [
            'basic'    => Settings\Basic::class,
            'site'     => Settings\Site::class,
            'upload'   => Settings\Upload::class,
//            'database' => Settings\Database::class,
//            'develop'  => Settings\Develop::class,
        ];

        return $content
            ->title('系统设置')
            ->body(Tab::forms($forms));
    }


    public function register(Content $content)
    {
        $steps = [
            'info'     => Steps\Info::class,
            'profile'  => Steps\Profile::class,
            'password' => Steps\Password::class,
        ];

        return $content
            ->title('注册用户')
            ->body(MultipleSteps::make($steps));
    }
}
