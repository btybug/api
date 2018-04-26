<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Avatarbug</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
</head>

<body>
<script type="text/javascript">

    var finish = function (){
        if (window.opener != null && !window.opener.closed) {
            console.log(1);
            window.opener.cms.callback('x');
        }
        window.close();
    }

</script>

<button onclick="finish()">Close Window</button>
</body>
</html>