<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use zgldh\QiniuStorage\QiniuStorage;

class UploaderController extends Controller
{
    public function webuploader(Request $request)
    {
      $file = $request->file('file');
      // 先判断有没有文件,有没有正常上传
      if($request->hasFile('file')&&$file->isValid()){
        // 拼接唯一文件名
        $filename = sha1(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

        // 保存文件
        // 使用storage保存图片 php artisan storage:link创建软链接(就是快捷方式)
        // 去config/filesystems.php 看使用的哪个磁盘驱动
        // 获取临时文件的内容,然后保存到disk磁盘
        Storage::disk('public')->put($filename,file_get_contents($file->path()));

        // 执行的结果
        $result = [
          'code'=>'0',
          'msg'=>'上传成功',
          'path'=>'/storage/'.$filename
        ];
      }else{
        $result = [
          'code'=>'001',
          'msg'=>$file->getErrorMessage(),
        ];
      }
      // 返回结果
      return response()->json($result);
    }


    public function qiniu(Request $request)
    {
      $file = $request->file('file');
      // 先判断有没有文件,有没有正常上传
      if($request->hasFile('file')&&$file->isValid()){
        // 拼接唯一文件名
        $filename = sha1(time().$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();

        // 保存文件
        // 使用storage保存图片 php artisan storage:link创建软链接(就是快捷方式)
        // 去config/filesystems.php 看使用的哪个磁盘驱动
        // 获取临时文件的内容,然后保存到disk磁盘
        // $disk = Storage::disk('qiniu');
        $disk = QiniuStorage::disk('qiniu');
        $disk->put($filename,file_get_contents($file->path()));

        // 执行的结果
        $result = [
          'code'=>'0',
          'msg'=>'上传成功',
          // 'path'=>   $disk->getDriver()->downloadUrl($filename)
          'path'=>   $disk->downloadUrl($filename)
        ];
      }else{
        $result = [
          'code'=>'001',
          'msg'=>$file->getErrorMessage(),
        ];
      }
      // 返回结果
      return response()->json($result);
    }
}
