@extends('layouts.layout-editormd')
@section('content_title')
@endsection
@section('content')
    <link rel="stylesheet" href="{{ MD() }}css/editormd.css" />

    <div class="row">
        <div class="container">
            <div class="row">
                <form class="card" action="/article/dealCreateMarkdown" method="post" id="current_form">
                    <div class="card-header">
                        <h3 class="card-title">Create Article——Use Markdown</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4 col-md-2">
                                    <label class="form-label">
                                        Category<span class="form-required">*</span>
                                    </label>

                                    <select class="custom-select" name="form_category">
                                        @foreach($WebsiteCategory as $v)
                                            <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            <div class="form-group col-sm-8 col-md-10">
                                    <label class="form-label">
                                        Title <span class="form-required">*</span>
                                    </label>
                                    {{ csrf_field() }}
                                    <input type="text" class="form-control" id="form_title" placeholder="Title" name="form_title" />
                                </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <div  id="test-editormd" >
                                    <textarea class="editormd-markdown-textarea" name="id-markdown-doc"></textarea>

                                    <textarea class="editormd-html-textarea" name="id-html-code" ></textarea>

                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Labels,use , as delimiter</label>
                                    <input type="text" class="form-control"  id="form_tag" placeholder="Labels" name="form_tag">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('current_form').submit()" >Make request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <script src="{{ MD() }}examples/js/jquery.min.js"></script>
    <script src="{{ MD() }}editormd.js"></script>
    <!-- this page specific scripts -->
    <script>

        var testEditor;

        $(function() {
            testEditor = editormd("test-editormd", {
                width   : "99%",
                height  : 400,
                syncScrolling : "single",
                path    : "{{ MD() }}lib/",
                tocm            : true,
                saveHTMLToTextarea : true,
                emoji : true,
                taskList : true,
                searchReplace : true,
                codeFold : true,
                imageUpload : true,
                imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL : "{{ MD() }}examples/php/upload.php",

            });

        });
    </script>

@endsection
