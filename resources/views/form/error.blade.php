@extends('layouts.layout')
@section('content_title')
@endsection
@section('content')

    <div class="alert alert-icon alert-danger" role="alert">
        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
        <strong>{{ urldecode($title) }}  Failed!</strong>
        <a href="{{ urldecode($url) }}" id="target_url" class="alert-link">立即跳转至目标页</a>.
    </div>

@endsection

@section('footer')
    <script>
        (function(){
            var wait = {{ $sec }},href = $("#target_url").attr("href");
            var interval = setInterval(function(){
                var time = --wait;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
@endsection
