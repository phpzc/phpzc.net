@extends('layouts.main')
@section('head')
    <link rel="stylesheet" href="{{ CUBE() }}css/libs/select2.css" type="text/css" />

    <style>
        .form-control{width:300px !important;}
        #autoreqmark{display:none;}
        .form-group{margin-bottom:0px;padding-top:20px;}
        .input-group{line-height:30px;}
        .input-group-addon{word-break:normal;width:250px;}
        .form-group .btn-info{margin-left:20px;}
        .img1,.img2{visibility:hidden !important;}
        .fa-eye,.fa-pencil,.fa-trash-o{cursor:pointer;}
        .project-img-div,.mortgaged-img-div{position:absolute;width:100%;height:100%;top:0;display:none;background:#eee;}
        .fa-eye{position:absolute;top:48%;left:27%;}
        .fa-trash-o{position:absolute;top:48%;left:67%;}
        .project-img-list,.mortgaged-img-list{display:inline-block;position:relative;margin:5px;}
        #project-img-list,#mortgaged-img-list{display:inline-block;}
        label{width:120px;text-align:right;}
        .radio input[type=radio] + label:before, .radio input[type=radio]:hover + label:before{border-color:#03a9f4;}
        .radio label{text-align:center;}
        .mortgaged-img-list{margin:1em;}
    </style>
    <link rel="stylesheet" href="{{ CUBE() }}css/libs/lightbox.css" media="screen"/>
    <!-- 表单验证样式文件 -->
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/bootstrapValidator.min.css">
    <!-- 提醒框样式 -->
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-default.css"/>
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-style-bar.css"/>
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-style-theme.css"/>
    <!--select 样式-->
    <link rel="stylesheet" href="{{ CUBE() }}css/libs/select2.css" type="text/css" />
    <!-- 图片预览 -->
    <link rel="stylesheet" href="{{ CUBE() }}css/libs/lightbox.css" media="screen"/>
    <!-- 提示 -->
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-default.css"/>
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-style-growl.css"/>
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-style-bar.css"/>
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-style-attached.css"/>
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-style-other.css"/>
    <link rel="stylesheet" type="text/css" href="{{ CUBE() }}css/libs/ns-style-theme.css"/>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="main-box">
                <header class="main-box-header clearfix">
                    <h2>Album-photo create form</h2>
                </header>

                <div class="main-box-body clearfix">
                    <form class="form-horizontal" role="form" action="/album/create_page" method="post" id="current_form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label  class="col-lg-2 control-label">相册选择：</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="uid">

                                    @foreach($album_list as $v)
                                        <option value="{{ $v['id'] }}">{{ $v['title'] }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label  class="col-lg-2 control-label">upload image：</label>
                            <div class="form-group form-inline">
                                <div id="mortgaged-img-list"></div>
                                <button type="button" class="btn btn-primary up-mortgaged" style="margin-left:50px;">
                                    <span class=""></span>upload image
                                </button>

                                <link rel="stylesheet" href="{{ KINDEDITOR() }}themes/default/default.css" />
                                <script src="{{ KINDEDITOR() }}kindeditor-all-min.js"></script>
                                <script charset="utf-8" src="{{ KINDEDITOR() }}lang/zh-CN.js"></script>

                                <script>
                                    KindEditor.ready(function(K) {
                                        var editor = K.editor({
                                            allowFileManager : true
                                        });
                                        K('.up-mortgaged').click(function() {
                                            editor.loadPlugin('image', function() {
                                                editor.plugin.imageDialog({
                                                    imageUrl : K('#mortgaged-img').val(),
                                                    clickFn : function(url, title, width, height, border, align) {
                                                        $('#hidden').children('div').addClass('mortgaged-img-list');
                                                        $('#hidden').find('div').find('a').attr('data-lightbox','example-set');
                                                        $('#hidden').find('div').find('a').attr('href',url);
                                                        $('#hidden').find('div').find('a').find('img').attr('src',url);
                                                        $('#hidden').find('div').find('div').addClass('mortgaged-img-div');
                                                        $('#hidden').find('div').find('div').find('.fa-eye').addClass('mortgaged-img-edit');
                                                        $('#hidden').find('div').find('div').find('.fa-eye').attr('onclick','eye(this)');
                                                        $('#hidden').find('div').find('div').find('.fa-trash-o').addClass('mortgaged-img-del');
                                                        $('#hidden').find('div').find('div').find('.fa-trash-o').attr('onclick','mortgageddel(this)');
                                                        $('#hidden').find('div').find('input').attr('name','mortgaged-img-url[]');
                                                        $('#hidden').find('div').find('input').attr('value',url);
                                                        var html = $('#hidden').html();
                                                        $('#mortgaged-img-list').append(html);
                                                        $('#mortgaged-img').siblings('*:last').hide();
                                                        $('button.btn-info').prop('disabled',false);
                                                        $('#hidden').children('div').removeClass('mortgaged-img-list');
                                                        $('#hidden').find('div').find('a').attr('data-lightbox','');
                                                        $('#hidden').find('div').find('a').attr('href','');
                                                        $('#hidden').find('div').find('a').find('img').attr('src','');
                                                        $('#hidden').find('div').find('div').removeClass('mortgaged-img-div');
                                                        $('#hidden').find('div').find('div').find('.fa-eye').removeClass('mortgaged-img-edit');
                                                        $('#hidden').find('div').find('div').find('.fa-eye').attr('onclick','');
                                                        $('#hidden').find('div').find('div').find('.fa-trash-o').removeClass('mortgaged-img-del');
                                                        $('#hidden').find('div').find('div').find('.fa-trash-o').attr('onclick','');
                                                        $('#hidden').find('div').find('input').attr('value','');
                                                        editor.hideDialog();
                                                    }
                                                });
                                            });
                                        });
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input  type="submit"  class="btn btn-success" value="Submit" id="submit_button"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="hidden" id="hidden">
        <div>
            <a class="example-image-link" href="" title=""> <img class="example-image" src="" alt="plants: image 1 0f 4 thumb" width="150px" height="100px"/></a><input name="" type="text" class="hidden" value="">
            <div class="">
                <i class="fa fa-eye"></i>
                <i class="fa fa-trash-o"></i>
            </div>
        </div>
    </div>
@endsection

@section('after')
    <!-- 公共 -->
    <script src="{{ CUBE() }}js/modernizr.custom.js"></script>
    <script src="{{ CUBE() }}js/classie.js"></script>

    <!-- 预览 -->
    <script src="{{ CUBE() }}js/lightbox-2.6.min.js"></script>
    <!-- 表单验证文件 -->
    <script src="{{ CUBE() }}js/bootstrapValidator.min.js"></script>
    <!-- 提醒框js -->
    <script src="{{ CUBE() }}js/classie.js"></script>
    <script src="{{ CUBE() }}js/notificationFx.js"></script>
    <!-- this page specific scripts -->
    <script src="{{ CUBE() }}js/select2.min.js"></script>

    <!-- 提示 -->
    <script src="{{ CUBE() }}js/snap.svg-min.js"></script>
    <script src="{{ CUBE() }}js/notificationFx.js"></script>

    <script>
        $(document).on("mouseover",".project-img-list",function(){
            $(this).find(".project-img-div").show();
        })

        $(document).on("mouseout",".project-img-list",function(){
            $(this).find(".project-img-div").hide();
        })

        $(document).on("mouseover",".mortgaged-img-list",function(){
            $(this).find(".mortgaged-img-div").show();
        })

        $(document).on("mouseout",".mortgaged-img-list",function(){
            $(this).find(".mortgaged-img-div").hide();
        })


        function tipmsg(status,content,url){

            // create the notification
            var notification = new NotificationFx({
                message : '<span class="icon fa fa-bullhorn fa-2x"></span><p>'+content+'</p>',
                layout : 'bar',
                effect : 'slidetop',
                type : 'error', // notice, warning or error
                ttl:2000,
                onClose : function() {
                    //bttnSlideOnTop.disabled = false;
                    if(status==1){
                        window.location.href=url;
                    }
                }
            });

            // show the notification
            notification.show();

            // disable the button (for demo purposes only)
            this.disabled = true;
        }

        //预览
        function eye(thi){
            var parent = thi.parentNode;
            var prev = parent.parentNode;
            var previous = prev.children[0];
            previous.click();
        }

        //表单
        var type = '';
        $(document).on("blur",".form-control",function(){
            var val = $(this).val();
            var content = $(this).attr("placeholder");
            if(val == ''){
                $(this).parent().addClass("has-error");
                $(this).parent().removeClass("has-success");
                type = 'false';
                return type;
            }else{
                $(this).parent().removeClass("has-error");
                $(this).parent().addClass("has-success");
            }
            $('#submit_button').prop('disabled',false);
        })

        //图片验证
        function jude(){
            var mortgaged = $("#mortgaged-img-list").children("div[class='mortgaged-img-list']").length;
            if(parseInt(mortgaged) == 0){
                tipmsg("0","请上传图片","");
                $("#project-img").val("1");
                $("#mortgaged-img").val("");
                return false;
            }else{
                $("#project-img").val("1");
                $("#mortgaged-img").val("1");
                return true;
            }
        }

        //删除相关资料
        function mortgageddel(thi){
            var mortgaged = document.getElementById("mortgaged-img-list").getElementsByClassName("mortgaged-img-list").length;
            if(parseInt(mortgaged) > 1){
                if(confirm("是否删除该图片？") == true){
                    thi.parentNode.parentNode.remove();
                }else{
                    tipmsg("0","取消删除","");
                }
            }else{
                tipmsg("0","图片数需要大于1张","");
            }
        }

        $(function() {


            $('#current_form')
                .bootstrapValidator({})
                .on('success.form.bv', function(e) {

                    // Prevent form submission
                    e.preventDefault();
                    // Get the form instance
                    var $form = $(e.target);

                    // Get the BootstrapValidator instance
                    var bv = $form.data('bootstrapValidator');

                    // Use Ajax to submit form data
                    $.post($form.attr('action'), $form.serialize(), function(result) {
                        tipmsg(result.status,result.content,result.url);

                    }, 'json');
                });
        });


    </script>
@endsection
