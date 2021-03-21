<?php


namespace App\Admin\Extensions;

use Encore\Admin\Form\Field;

class WangEditor extends Field
{
    protected $view = 'admin.wang-editor';

//    protected static $css = [
//        '/vendor/wangEditor4.6.10/wangEditor.css',
//    ];

    protected static $js = [
        '/vendor/wangEditor4.6.10/wangEditor.js',
    ];

    public function render()
    {
        $name = $this->formatName($this->column);

        $this->script = <<<EOT

var E = window.wangEditor
var editor = new E('#{$this->id}');
editor.config.zIndex = 5
editor.config.uploadImgShowBase64 = true
//editor.config.uploadImgServer = '/uploader/webuploader' // 本地上传
editor.config.uploadImgServer = '/uploader/qiniu'  // 七牛云
editor.config.uploadFileName = 'file'
editor.config.onchange = function (html) {
    $('input[name=\'$name\']').val(html);
}
editor.create()

EOT;
        return parent::render();
    }
}
