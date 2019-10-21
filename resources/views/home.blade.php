@extends('layouts.app')
@section('title','Bienvenido')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>LISTADO DE ARTÍCULOS</h2>
        <hr/>
        <article-list></article-list>
    </div>
</div>
@endsection
@push('jsCustom')
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
        /*Pusher.logToConsole = true;

        var pusher = new Pusher('a31bfdf1fda40c186074', {
            cluster: 'us2',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });*/

        var channel = Echo.channel('lcabrera');
            channel.listen('.articles', function(data) {
               console.log(JSON.stringify(data));

               appVue.$message({
                    type: 'info',
                    message: data.message
                });

            });
    });
</script>
@endpush