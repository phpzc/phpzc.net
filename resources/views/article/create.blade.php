@extends('layouts.layout')

@section('content')


    <div class="row">
        <div class="container">
            <div class="row">
                <form class="card"  action="/article/dealCreate" method="post" id="current_form">
                    <div class="card-header">
                        <h3 class="card-title">Create Article</h3>
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

                                    <script id="myEditor" name="form_article" type="text/plain" style="height:200px;"></script>

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
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('current_form').submit()" >Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <script type="text/javascript" charset="utf-8" src="{{ UEDITOR('ueditor.config.js')  }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ UEDITOR('ueditor.all.min.js') }}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="{{ UEDITOR('lang/zh-cn/zh-cn.js') }}"></script>
    <!--公式插件 -->
    <script type="text/javascript" charset="utf-8" src="/Public/baidu/UEditor/kityformula-plugin/addKityFormulaDialog.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/baidu/UEditor/kityformula-plugin/getKfContent.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/baidu/UEditor/kityformula-plugin/defaultFilterFix.js"></script>

    <!-- this page specific scripts -->
    <script>
        var ue = UE.getEditor('myEditor',{
            wordCount:true,          //是否开启字数统计
            maximumWords:500,      //允许的最大字符数
            autoClearinitialContent:true,
            elementPathEnabled:false

        });


    </script>
@endsection
