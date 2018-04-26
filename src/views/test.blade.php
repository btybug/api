{{--{!! $code !!}--}}

<script type="javascript">

    var finish = function (){
        if (window.opener != null && !window.opener.closed) {
            console.log(1);
            window.opener.cms.callback('x');
        }
        window.close();
    }

</script>

<button onclick="finish()">Close Window</button>