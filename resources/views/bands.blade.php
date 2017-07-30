@extends('master')

@section('title', 'Bands')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-primary addNew" href="#" role="button"><i class="glyphicon glyphicon-plus"></i> Band</a>
                </div>
                <div class="col-sm-12">
                    <table class="table table-hover table-bordered table-striped bandTable">
                        @foreach($bands as $band)
                        @component('dataField', ['model' => $band])
                            @endcomponent
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <form method="post" action="/band" data-id="" class="form-horizontal hidden">
                <fieldset>
                {{ csrf_field() }}

                    <!-- Form Name -->
                    <legend>Band Editor</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Band Name</label>
                        <div class="col-md-8">
                            <input id="name" name="name" type="text" placeholder="Band Name" class="form-control input-md required">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="label">Website</label>
                        <div class="col-md-8">
                            <input id="label" name="website" type="text" placeholder="Website" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="producer">Still Active</label>
                        <div class="col-md-8">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="still_active" value="1" id="option1" autocomplete="off"> Yes
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="still_active" value="0" id="option2" autocomplete="off"> No
                                </label>
                            </div>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="release_date">Start Date</label>
                        <div class="col-md-8">
                            <div class="input-group" id="release_date">
                                <input name="start_date" type="text" placeholder="Date" class="form-control dateField">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="release_date">Albums</label>
                        <div class="col-md-8 albumList">

                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection