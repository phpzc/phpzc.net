@extends('layouts.layout')

@section('content')
    <div class="row">
        <form class="card" action="/album/create_album" method="post" id="current_form">
            {{ csrf_field() }}
            <div class="card-body">
                <h3 class="card-title">Album create </h3>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">相册名称：</label>
                            <input type="text" class="form-control" id="form_title" placeholder="Title" name="title" />
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">相册描述：</label>
                            <textarea class="form-control" name="content"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                    <div class="form-group">
                        <label  class="form-label">可见性：</label>
                        <div class="custom-controls-stacked">


                            <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="optionsRadios" id="optionsRadios1" value="0" checked>
                                <div class="custom-control-label">不可见</div>
                            </label>

                            <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="optionsRadios" id="optionsRadios2" value="1" >
                                <div class="custom-control-label">可见</div>
                            </label>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-12">

                        <div class="form-group">

                            <button  type="button" onclick="document.getElementById('current_form').submit()" class="btn btn-success">Submit</button>

                        </div>
                    </div>
            </div>


        </form>

    </div>
@endsection
