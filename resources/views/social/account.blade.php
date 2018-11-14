@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2>Account</h2>
                </header>

                <div class="main-box-body clearfix">
                    <div class="tabs-wrapper">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-home" data-toggle="tab">New</a></li>
                            <li><a href="#tab-help" data-toggle="tab">Bind</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-home">
                                <form class="form-horizontal" role="form" action="/user/accountBindNew" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group ">
                                        <label for="inputName1" class="col-lg-2 control-label">Name</label>
                                        <div class="col-lg-10 has-success">
                                            <input type="text" class="form-control" id="inputName1" placeholder="Name" name="name" value="{{ $username or '' }}"/>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAvatar" class="col-lg-2 control-label">Avatar</label>

                                        <div class="col-lg-10 has-success">
                                            <img src='{{ $avatar_img or CUBE('/img/samples/scarlet-159.png') }}' id="inputAvatar" width=80 height=80/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                        <div class="col-lg-10 has-success">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="username" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Password1" class="col-lg-2 control-label">Password</label>
                                        <div class="col-lg-10 has-success">
                                            <input type="password" class="form-control" id="Password1" placeholder="Password" name="password" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-success" id="join" data-loading-text="Loading..." >Join</button>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="tab-help">
                                <form class="form-horizontal" role="form" action="/user/accountBindOld">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                                        <div class="col-lg-10 has-success">
                                            <input type="hidden" name="type" value="{$type}" id="current_type" />
                                            <input type="hidden" name="code" value="{$Think.session.form.code}" id="form_code" />
                                            <input type="email" class="form-control" id="inputEmail1" placeholder="Email" name="username">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
                                        <div class="col-lg-10 has-success">
                                            <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="password">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-success" id="bind" data-loading-text="Loading...">Bind</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('after')
    <!-- this page specific scripts -->
    <script src="__PHPJS__/strings/strlen.js"></script>
    <script src="__JS__/account.js"></script>
@endsection