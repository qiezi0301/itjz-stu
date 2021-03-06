<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>php stu</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/font-awesome-4.7.0/css/font-awesome.css') }}">
</head>
<body>
<div id="application">
    <app></app>
</div>

<div id="fixedTools" class="hidden-xs hidden-sm" style="border: none">
    <a id="backtop" class="border-bottom elevator">
        <i class="fa fa-angle-up"></i>
        <span>回到顶部</span>
    </a>
</div>

<script src="{{asset('/js/app.js')}}"></script>

<script>
    (function () {
        $('#backtop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });
        $(document).scroll(function () {
            $(this).scrollTop() > 720 ? $("#fixedTools").removeClass("hidden") : $("#fixedTools").addClass("hidden")
        });
    })();
</script>
</body>
</html>
