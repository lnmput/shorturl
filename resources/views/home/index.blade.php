<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>短链生成器</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/url.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">

    <h1>短链生成器</h1>
    <form method="post" action="short">
    <div class="input-group myurl">
        {{csrf_field()}}
        <input type="text" class="form-control" name="url" id="url" placeholder="请输入超链接" aria-describedby="basic-addon2">
        <span  class="input-group-addon" id="submit">生成</span>
    </div>
    </form>


    <h2 id="shorturl"></h2>
    <p class="bg-danger" id="errorInfo"></p>
</div>


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/url.js')}}"></script>
</body>
</html>