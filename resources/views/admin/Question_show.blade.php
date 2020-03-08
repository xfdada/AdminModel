<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://www.layuicdn.com/layui/css/layui.css" />
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
<style>
    .layui-form-label{
        padding:9px 0 !important;
    }
    .layui-form-select dl{
        z-index: 99999!important;
    }
</style>
<div class="content-wrapper" style="margin: 10px">
{!! $data[0]->q_answer !!}
</div>

</body>
</html>

