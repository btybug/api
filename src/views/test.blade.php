<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ url("public/js/jquery-3.2.1.min.js") }}" type="text/javascript"></script>

</head>
<body>
<script>
    if (window.opener != null && !window.opener.closed) {
        var txtName = window.opener.document.getElementById("qaq");
        txtName.innerHTML = window.document.location.href;
    }
    window.opener.cms.callback('{!! $code !!}');
    window.opener.cms.done();
</script>
</body>
</html>


