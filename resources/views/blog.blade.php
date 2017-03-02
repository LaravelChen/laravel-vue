<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('./css/app.css')}}"rel="stylesheet">
    <link href="{{asset('./css/navbar.css')}}" rel="stylesheet">
    <link href="{{asset('./css/style.css')}}" rel="stylesheet">
    <link href="{{asset('./css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('./css/element.css')}}" rel="stylesheet">
</head>
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<body>

<div id="app">

</div>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("js/element.js")}}"></script>
</body>
</html>
