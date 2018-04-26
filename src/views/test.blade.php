<script type="text/javascript">

    if (window.opener != null && !window.opener.closed) {
        console.log(1);
        window.opener.cms.callback('x');
    }
    window.close();

</script>