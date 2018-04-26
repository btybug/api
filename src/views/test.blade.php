{{--{!! $code !!}--}}

<button onclick="finish()">Close Window</button>
<script type="javascript">

    function finish(){
        if (window.opener != null && !window.opener.closed) {
            console.log(1);
            window.opener.cms.callback('x');
        }
        window.close();
    }

</script>