<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>我是子模板</title>
</head>
<body>

  @extends('admin.test.parent')
  @section('body')
  <p>首先用extends表示继承父模板</p>
  <p>然后用section包裹要填充的区块，并且传入对应父模板的区块名字</p>
  @include('admin.test.include')
  @endsection

</body>
</html>