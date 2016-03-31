@extends('layouts.master')

@section('title')
DBF Random User Generator
@stop

@section('tool_name')
Random User Generator
@stop

@section('tool_description')
Mass data records for testing your applications.
@stop

@section('homeLink')
/
@stop

@section('loremLink')
<li><a href="/lorem">
@stop

@section('rugLink')
<li class="active"><a href="#">
@stop

@section('xkcdLink')
<li><a href="/xkcd">
@stop

@section('content')
<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">
        Select your data record fields/size as well as script format, click the generate data button
        and your code will appear in the section below.
    </h2>
  </div>

<div class="panel-body">
        <form name="rug_form" id="rug_form" class="form-horizontal" method="POST" action="/rug">
                <fieldset>
                        {{ csrf_field() }}
                        <div class="row">
                                {{-- Sub-form for selecting field elements --}}
                                {{-- Available fields --}}
                                <div class="col-lg-4">
                                        <div class="form-group">
                                                <label for="select" class="col-lg-6 control-label">Available fields</label>
                                                <div class="col-lg-6">
                                                        {{-- Values must correspond to RUG class $FIELD_NAMES array positions --}}
                                                        <select name="rug_available_fields[]" id="rug_available_fields" multiple="" class="form-control">
                                                                {!! $available_fields !!}
                                                        </select>
                                                </div>
                                        </div>                                
                                </div>
                                {{-- Buttons to add/remove fields --}}
                                <div class="col-lg-1">
                                        <a href="#" name="rug_add_field" id="rug_add_field" class="btn btn-primary btn-xs" onClick="SelectMoveRows(document.rug_form.rug_available_fields, document.rug_form.rug_selected_fields)">Add &gt;</a><br />
                                        <a href="#" name="rug_remove_field" id="rug_remove_field" class="btn btn-primary btn-xs" onClick="SelectMoveRows(document.rug_form.rug_selected_fields, document.rug_form.rug_available_fields)">Remove &lt;</a><br />
                                        <a href="#" name="rug_add_all" id="rug_add_all" class="btn btn-primary btn-xs" onClick="SelectMoveAll(document.rug_form.rug_available_fields, document.rug_form.rug_selected_fields)">Add all</a><br />
                                        <a href="#" name="rug_remove_all" id="rug_remove_all" class="btn btn-primary btn-xs" onClick="SelectMoveAll(document.rug_form.rug_selected_fields, document.rug_form.rug_available_fields)">Remove all</a>
                                </div>
                                {{-- Selected fields --}}
                                <div class="col-lg-4">
                                        <div class="form-group">
                                                <label for="select" class="col-lg-6 control-label">Selected fields</label>
                                                <div class="col-lg-6">
                                                        <select name="rug_selected_fields[]" id="rug_selected_fields" multiple="" class="form-control">
                                                                {!! $selected_fields !!}
                                                       </select>
                                                </div>
                                        </div>                                
                                </div>
                                {{-- Selected field error messages --}}
                                <div class="col-lg-3">
                                        <p class="text-danger">
                                                @foreach ($errors->get('rug_selected_fields') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        {{-- Remainder of main form - output options --}}
                        <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-group">
                                                <label for="rug_num_records" class="col-lg-6 control-label">No. records</label>
                                                <div class="col-lg-6">
                                                        <input class="form-control" name="rug_num_records" id="rug_num_records" placeholder="1 to 100" type="text" value="{{ old('rug_num_records') }}<?php if (isset($_POST['rug_num_records'])) echo $_POST['rug_num_records'] ?>">
                                                </div>
                                        </div>                                
                                </div>
                                <div class="col-lg-5">
                                </div>
                                <div class="col-lg-3">
                                        <p class="text-danger">
                                                @foreach ($errors->get('rug_num_records') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        {{-- Remainder of main form - output options --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Output</label>
                                                <div class="col-lg-9">
                                                        {{-- Option values must correspond to RUG class $OUTPUT_* values --}}
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="rug_output" value="0" type="radio" <?php if (!isset($_POST['rug_output']) || ($_POST['rug_output'] == '0')) echo 'checked' ?>>
                                                                        JSON
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" value="1" type="radio" <?php if (isset($_POST['rug_output']) && ($_POST['rug_output'] == '1')) echo 'checked' ?>>
                                                                        PHP array
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" value="2" type="radio" <?php if (isset($_POST['rug_output']) && ($_POST['rug_output'] == '2')) echo 'checked' ?>>
                                                                        CSV
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" value="3" type="radio" <?php if (isset($_POST['rug_output']) && ($_POST['rug_output'] == '3')) echo 'checked' ?>>
                                                                        XML
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" value="4" type="radio" <?php if (isset($_POST['rug_output']) && ($_POST['rug_output'] == '4')) echo 'checked' ?>>
                                                                        YAML
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" value="5" type="radio" <?php if (isset($_POST['rug_output']) && ($_POST['rug_output'] == '5')) echo 'checked' ?>>
                                                                        MySQL
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        {{-- Submit button --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                        <button name="rug_submit" id="rug_submit" type="submit" class="btn btn-primary">Generate data</button>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @if(count($errors) > 0)
                                                        Please correct the errors above and try again.
                                                @endif
                                        </p>
                                </div>
                        </div>
                </fieldset>
        </form>
</div>
        </div>
{{-- Output panel --}}     
<div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Output</h3>
        </div>
        <div class="panel-body">
                {{ $output }}
        </div>
</div>
@stop

@section('body')
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="/css/rug.js"></script>
        <script src="/css/multiSelectMove.js"></script>
@stop