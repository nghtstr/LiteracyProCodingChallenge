@extends('master')

@section('title', 'Albums')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-primary addNew" href="#" role="button"><i class="glyphicon glyphicon-plus"></i> Album</a>
                </div>
                <div class="col-sm-12">
                    <table class="table table-hover table-bordered table-striped albumTable">
                        <thead>
                            <tr>
                                <td>
                                    <select class="form-control bandSelect">
                                        <option value="">All</option>
                                        @foreach($bands as $band)
                                        <option value="{{ $band->id }}">{{ $band->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($albums as $album)
                            @component('dataField2Col', ['model' => $album])
                            @endcomponent
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <form method="post" action="/album" data-id="" class="form-horizontal hidden">
                {{ csrf_field() }}
                <fieldset>

                    <!-- Form Name -->
                    <legend>Album Editor</legend>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="band_id">Band</label>
                        <div class="col-md-8">
                            <select id="band_id" name="band_id" class="form-control required">
                                <option value="">Please Select Band</option>
                                @foreach($bands as $band)
                                <option value="{{ $band->id }}">{{ $band->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">Album Name</label>
                        <div class="col-md-8">
                            <input id="name" name="name" type="text" placeholder="Album Name" class="form-control input-md required">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="number_of_tracks">Number of Tracks</label>
                        <div class="col-md-2">
                            <input id="number_of_tracks" name="number_of_tracks" type="text" placeholder="#" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="label">Label</label>
                        <div class="col-md-8">
                            <input id="label" name="label" type="text" placeholder="Label" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="producer">Producer</label>
                        <div class="col-md-8">
                            <input id="producer" name="producer" type="text" placeholder="Producer" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="genre">Genre</label>
                        <div class="col-md-8">
                            <input id="genre" name="genre" type="text" placeholder="Genre" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="recorded_date">Recorded Date</label>
                        <div class="col-md-8">
                            <div class="input-group" id="recorded_date">
                                <input name="recorded_date" type="text" placeholder="Date" class="form-control dateField">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="release_date">Release Date</label>
                        <div class="col-md-8">
                            <div class="input-group" id="release_date">
                                <input name="release_date" type="text" placeholder="Date" class="form-control dateField">
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

                </fieldset>
            </form>
        </div>
    </div>
@endsection