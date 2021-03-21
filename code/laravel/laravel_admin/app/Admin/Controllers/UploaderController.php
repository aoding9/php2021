<?php


namespace App\Admin\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use zgldh\QiniuStorage\QiniuStorage;

class UploaderController extends Controller
{
    public function webuploader(Request $request)
    {
//        dd($request->file());
        $file = $request->file('file');
        // 先判断有没有文件,有没有正常上传
        if ($request->hasFile('file') && $file->isValid()) {
            // 拼接唯一文件名
            $filename = sha1(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

            // 保存文件
            // 使用storage保存图片 php artisan storage:link创建软链接(就是快捷方式)
            // 去config/filesystems.php 看使用的哪个磁盘驱动
            // 获取临时文件的内容,然后保存到disk磁盘
            Storage::disk('public')->put($filename, file_get_contents($file->path()));

            // 执行的结果
            $result = [
                'errno' => '0',
                'msg' => '上传成功',
                'data' => [
                    [
                        'url' => '/storage/' . $filename,
                        'alt' => "图片文字说明",
                        'href' => "跳转链接"

                    ],
                ],
            ];
        } else {
            $result = [
                'errno' => '001',
                'msg' => $file->getErrorMessage(),
            ];
        }
        // 返回结果
        return response()->json($result);
    }


    public function qiniu(Request $request)
    {
        $file = $request->file('file');
        // 先判断有没有文件,有没有正常上传
        if ($request->hasFile('file') && $file->isValid()) {
            // 拼接唯一文件名
            $filename = sha1(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

            // 保存文件
            // 使用storage保存图片 php artisan storage:link创建软链接(就是快捷方式)
            // 去config/filesystems.php 看使用的哪个磁盘驱动
            // 获取临时文件的内容,然后保存到disk磁盘
            // $disk = Storage::disk('qiniu');
            $disk = QiniuStorage::disk('qiniu');
            $disk->put($filename, file_get_contents($file->path()));

            // 执行的结果
            $result = [
                'errno' => '0',
                'msg' => '上传成功',
                'data' => [
                    [
                        'url' => $disk->downloadUrl($filename),
                        'alt' => "图片文字说明",
                        'href' => "跳转链接"

                    ],
                ],
            ];
        } else {
            $result = [
                'errno' => '001',
                'msg' => $file->getErrorMessage(),
            ];
        }
        // 返回结果
        return response()->json($result);
    }
}
