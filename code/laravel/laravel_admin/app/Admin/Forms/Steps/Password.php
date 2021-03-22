<?php

namespace App\Admin\Forms\Steps;

use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class Password extends StepForm
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '密码表单';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {

//        admin_success('Processed successfully.');
        admin_success(($this->all())['info']['username']);

        return back();
//        return $this->next($request->all());
    }


    /**
     * Build a form here.
     */
    public function form()
    {
//        dump($this->all());
        $this->text('name')->rules('required');
        $this->email('email')->rules('email');
        $this->datetime('created_at');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'name' => 'John Doe',
            'email' => 'John.Doe@gmail.com',
            'created_at' => now(),
        ];
    }
}
