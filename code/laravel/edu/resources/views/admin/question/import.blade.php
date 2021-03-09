<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="Bookmark" href="/favicon.ico">
  <link rel="Shortcut Icon" href="/favicon.ico" />
  <!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
  <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
  <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
  <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
  <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
  <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
  <link rel="stylesheet" type="text/css" href="/admin/lib/webuploader/0.1.5/webuploader.css" />
  <!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
  <!--/meta 作为公共模版分离出去-->

  <title>导入试题 - H-ui.admin v3.1</title>
  <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
  <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>

<body>
  <article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
    
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">所属试卷：</label>
        <div class="formControls col-xs-8 col-sm-9">
          <span class="select-box" >
            <select class="select" size="1" name="paper_id">
              <option value="" selected>请选择所属试卷</option>
              @foreach ($papers as $i)
              <option value="{{$i->id}}">{{$i->paper_name}}</option>
              @endforeach
            </select>
          </span>

        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3">选择文件：</label>
        <div class="formControls col-xs-8 col-sm-9"> <span class="form-group">
            <div id="uploader-demo">
              <!--用来存放item-->
              <div id="fileList" class="uploader-list"></div>
              <div id="filePicker">选择文件</div>
            </div>
            <!-- 用于存储头像的隐藏域 -->
            <input type="hidden" name='excelpath' value=''>
            <!-- <input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px">
            <a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
            <input type="file" multiple name="file-2" class="input-file">
          </span>  -->
        </div>
      </div>
    

      {{csrf_field()}}
      <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
          <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
      </div>
    </form>
  </article>

  <!--_footer 作为公共模版分离出去-->
  @include('admin.footer')
  <!--/_footer 作为公共模版分离出去-->

  <!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
  <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
  <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
  <script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
  <script type="text/javascript" src="/admin/lib/webuploader/0.1.5/webuploader.js"></script>
  <script src="/statics/js/excel.js"></script>
  <script type="text/javascript">
    $(function() {

      // 监听change事件
      // country.change(function() {
      //   // 获取国家id
      //   var id = $(this).val();
      //   // 查省份
      //   $.get('/admin/member/getareabyid', {
      //     id: id
      //   }, function(data) {
      //     // 清除旧的省份，然后循环追加新的省份选项
      //     var html = '';
      //     $.each(data, function(index, el) {
      //       html += '<option value ="' + el.id + '">' + el.area + '</option>';
      //     })
      //     province.find('option:gt(0)').remove();
      //     province.append(html);
      //   }, 'json')
      // })

      $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
      });

      $("#form-member-add").validate({
        rules: {

          // uploadfile: {
          //   required: true,
          // },

        },
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function(form) {
          $(form).ajaxSubmit({
            type: 'post',
            url: "",
            success: function(data) {
              if (data == '1') {

                layer.msg('添加成功!', {
                  icon: 1,
                  time: 1000
                }, function() {
                  var index = parent.layer.getFrameIndex(window.name);
                  parent.location.reload()

                  parent.layer.close(index);
                });
              } else {
                layer.msg('添加失败!', {
                  icon: 5,
                  time: 1000
                });
              }

            },
            error: function(XmlHttpRequest, textStatus, errorThrown) {
              layer.msg('error!', {
                icon: 1,
                time: 1000
              });
            }
          });
        }
      });
    });
  </script>
  <!--/请在上方写此页面业务相关的脚本-->
</body>

</html>