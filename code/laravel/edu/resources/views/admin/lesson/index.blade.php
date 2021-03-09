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
  <!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
  <title>课时列表</title>
</head>

<body>
  <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 课时管理 <span class="c-gray en">&gt;</span> 课时列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a></nav>
  <div class="page-container">
    <div class="text-c"> 日期范围：
      <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
      -
      <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
      <input type="text" class="input-text" style="width:250px" placeholder="输入课时名称" id="" name="">
      <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
        <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
        <a href="javascript:;" onclick="admin_add('添加课时','admin-add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i>
          添加课时</a>
          </span> 
          <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
      <thead>
        <tr>
          <th scope="col" colspan="10">员工列表</th>
        </tr>
        <tr class="text-c">
          <th width="25"><input type="checkbox" name="" value=""></th>
          <th width="40">ID</th>
          <th width="150">课时名</th>
          <th width="90">所属课程</th>
          <th width="50">排序</th>
          <th width="50">视频时长</th>
          <th width="90">播放</th>
          <th width="130">创建时间</th>
          <th width="50">是否已启用</th>
          <th width="100">操作</th>
        </tr>
      </thead>
      <tbody>


        @foreach ($data as $item)
        <tr class="text-c">
          <td><input type="checkbox" value="{{ $item->id }}" name=""></td>
          <td>{{ $item->id }}</td>
          <td>{{ $item->lesson_name }}</td>
          <td>{{ $item->course->course_name }}</td>
          <td>{{ $item->sort }}</td>
          <td>{{ $item->video_time }}</td>
          <td>  <a href="javascript:;" onclick="video_play('{{ $item->lesson_name }}','/admin/lesson/play?id={{ $item->id }}','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe6e6;</i>
          播放</a></td>
          <td>{{ $item->created_at }}</td>
          <td class="td-status">
            @if($item->status=='2')
            <span class="label label-success radius">已启用</span>
            @else
            <span class="label radius">已停用</span>
            @endif
          </td>
          <td class="td-manage">
            @if($item->status=='2')
            <a style="text-decoration:none" onClick="admin_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
            @else
            <a style="text-decoration:none" onClick="admin_start(this,'10001')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>
            @endif

            <a title="编辑" href="javascript:;" onclick="admin_edit('课时编辑','admin-add.html','{{$item->id}}','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
            <a title="删除" href="javascript:;" onclick="admin_del(this,'{{$item->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!--_footer 作为公共模版分离出去-->
  @include('admin.footer')
  <!--/_footer 作为公共模版分离出去-->

  <!--请在下方写此页面业务相关的脚本-->
  <script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js">
  </script>
  <script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js">
  </script>
  <script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
  <script type="text/javascript">
    // 实例化datatables插件
    $('table').dataTable({
      // 第一列是checkbox列，不需要排序，所以需要禁用掉。 https://www.cnblogs.com/huiy/p/9037732.html
      // 'ordering' : true,   打开排序功能，若为false，则所有列全部不可用。
      // columnDefs : [ { targets : 0, "orderable" : false } ], "order" : [ [ 1, 'asc' ] ]  必须同时存在。
      // 在指定索引为0的列关闭排序时，必须同时指定要指定排序的列的，否则禁用排序无效。
      columnDefs: [{
        targets: 0,
        orderable: false
      }],
      order: [
        [4, 'desc']
      ]
    })

    /*
      参数解释：
      title	标题
      url		请求的url
      id		需要操作的数据id
      w		弹出层宽度（缺省调默认值）
      h		弹出层高度（缺省调默认值）
    */
    /*课时-播放*/
    function video_play(title, url, w, h) {
      layer_show(title, url, w, h);
    }
    /*课时-增加*/
    function admin_add(title, url, w, h) {
      layer_show(title, url, w, h);
    }
    /*课时-删除*/
    function admin_del(obj, id) {
      layer.confirm('确认要删除吗？', function(index) {
        $.ajax({
          type: 'POST',
          url: '',
          dataType: 'json',
          success: function(data) {
            $(obj).parents("tr").remove();
            layer.msg('已删除!', {
              icon: 1,
              time: 1000
            });
          },
          error: function(data) {
            console.log(data.msg);
          },
        });
      });
    }

    /*课时-编辑*/
    function admin_edit(title, url, id, w, h) {
      layer_show(title, url, w, h);
    }
    /*课时-停用*/
    function admin_stop(obj, id) {
      layer.confirm('确认要停用吗？', function(index) {
        //此处请求后台程序，下方是成功后的前台处理……

        $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
        $(obj).remove();
        layer.msg('已停用!', {
          icon: 5,
          time: 1000
        });
      });
    }

    /*课时-启用*/
    function admin_start(obj, id) {
      layer.confirm('确认要启用吗？', function(index) {
        //此处请求后台程序，下方是成功后的前台处理……


        $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
        $(obj).remove();
        layer.msg('已启用!', {
          icon: 6,
          time: 1000
        });
      });
    }
  </script>
</body>

</html>