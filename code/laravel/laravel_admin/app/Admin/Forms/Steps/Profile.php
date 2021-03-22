<?php

namespace App\Admin\Forms\Steps;

use Encore\Admin\Widgets\StepForm;
use Illuminate\Http\Request;

class Profile extends StepForm
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '简介表单';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
//        dd($this->all());
        return $this->next($request->all());

//        admin_success('Processed successfully.');

//        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
//        前面的return $this->next($request->all()); 将数据保存到了session的steps中,可以通过$this->all()来获取
//        dump(session()->all());
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
