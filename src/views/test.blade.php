<script src="{{ url("public/js/jquery-3.2.1.min.js") }}" type="text/javascript"></script>

<script>
    //    $(document).ready(function () {
    //        var url_string = this.document.location.href;
    //        var url = new URL(url_string);
    //        var c = url.searchParams.get('code');

    if (window.opener != null && !window.opener.closed) {
        var txtName = window.opener.document.getElementById("qaq");
        txtName.innerHTML = window.document.location.href;
    }
    console.log(window.opener.cms.callback('{!! $code !!}'));
    window.close();
</script>
