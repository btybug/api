
{{--{!! $code !!}--}}
<script type="javascript">
    alert(123)
    if (window.opener != null && !window.opener.closed) {
        console.log(1);
        window.opener.cms.callback('x');
    }
        window.close();

</script>


