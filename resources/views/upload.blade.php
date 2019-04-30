<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <!-- 文件上传需要enctype属性 -->
  <form action="/upload" method="post" enctype="multipart/form-data">
    头像<input type='file' name='profile'>
    {{csrf_field()}}
    <button>点击上传</button>
  </form>
</body>
</html>