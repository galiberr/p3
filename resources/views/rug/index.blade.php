@extends('layouts.master')

@section('title')
        DBF - Random User Generator
@stop

@section('tool_name')
        Random User Generator
@stop

@section('tool_description')
        Random User Generator
@stop

@section('content')
<div class="panel panel-default">
        <form name="rug_form" id="rug_form" class="form-horizontal" method="POST" action="/rug">
                <fieldset>
                        <div class="row">
                                {{-- Sub-form for selecting field elements --}}
                                {{-- Available fields --}}
                                <div class="col-lg-4">
                                        <div class="form-group">
                                                <label for="select" class="col-lg-6 control-label">Available fields</label>
                                                <div class="col-lg-6">
                                                        <select name="available_fields" id="available_fields" multiple="" class="form-control">
                                                                <option value="rug_last_name">Last name</option>
                                                                <option value="rug_first_name">First name</option>
                                                                <option value="rug_email">Email address</option>
                                                       </select>
                                                </div>
                                        </div>                                
                                </div>
                                {{-- Buttons to add/remove fields --}}
                                <div class="col-lg-1">
                                        <a href="#" class="btn btn-primary btn-xs" onClick="SelectMoveRows(document.rug_form.available_fields, document.rug_form.selected_fields)">Add ></a><br />
                                        <a href="#" class="btn btn-primary btn-xs" onClick="SelectMoveRows(document.rug_form.selected_fields, document.rug_form.available_fields)">Remove <</a><br />
                                        <a href="#" class="btn btn-primary btn-xs" onClick="SelectMoveAll(document.rug_form.available_fields, document.rug_form.selected_fields)">Add all</a><br />
                                        <a href="#" class="btn btn-primary btn-xs" onClick="SelectMoveAll(document.rug_form.selected_fields, document.rug_form.available_fields)">Remove all</a>
                                </div>
                                {{-- Selected fields --}}
                                <div class="col-lg-4">
                                        <div class="form-group">
                                                <label for="select" class="col-lg-6 control-label">Selected fields</label>
                                                <div class="col-lg-6">
                                                        <select name="selected_fields" id="selected_fields" multiple="" class="form-control">
                                                       </select>
                                                </div>
                                        </div>                                
                                </div>
                                {{-- Selected field error messages --}}
                                <div class="col-lg-3">
                                        <p class="text-danger">Please select at least one data field.</p>
                                </div>
                        </div>
                        {{-- Remainder of main form - output options --}}
                        <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-group">
                                          <label for="rug_num_records" class="col-lg-6 control-label">No. records</label>
                                          <div class="col-lg-6">
                                            <input class="form-control" name="rug_num_records" id="rug_num_records" placeholder="Number of records" type="text">
                                          </div>
                                        </div>                                
                                </div>
                                <div class="col-lg-5">
                                </div>
                                <div class="col-lg-3">
                                        <p class="text-danger">Please select between 1 and 100 data records.</p>
                                </div>
                        </div>
                        {{-- Remainder of main form - output options --}}
                        <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                                <label class="col-lg-4 control-label">Output</label>
                                                <div class="col-lg-8">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="rug_output" id="rug_output" value="mysql" type="radio">
                                                                        MySQL
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" id="rug_output" value="yaml" type="radio">
                                                                        YAML
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" id="rug_output" value="json" type="radio">
                                                                        JSON array
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" id="rug_output" value="php" type="radio">
                                                                        PHP array
                                                                </label>
                                                                <label>
                                                                        <input name="rug_output" id="rug_output" value="csv" type="radio">
                                                                        csv
                                                                </label>
                                                        </div>

                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="checkbox">
                                                <label>
                                                        <input type="checkbox" name="rug_clipboard" id="rug_clipboard" > Copy to clipboard
                                                </label>
                                        </div>
                                </div>
                        </div>
                        {{-- Remainder of main form - csv options --}}
                        <div class="row" name="rug_separator_div" id="rug_csv_parm_div">
                                <div class="col-lg-2">
                                        
                                </div>
                                <div class="col-lg-4">
                                        <div class="form-group">
                                                <label class="col-lg-5 control-label">CSV separator</label>
                                                <div class="col-lg-7">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="rug_separator" id="rug_separator" value="tab" type="radio">
                                                                        tab
                                                                </label>
                                                                <label>
                                                                        <input name="rug_separator" id="rug_separator" value="comma" type="radio">
                                                                        comma
                                                                </label>
                                                                <label>
                                                                        <input name="rug_separator" id="rug_separator" value="pipe" type="radio">
                                                                        pipe
                                                                </label>
                                                        </div>

                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <div class="checkbox">
                                                <label>
                                                        <input type="checkbox" name="rug_csv_header" id="rug_csv_header" > Include CSV header
                                                </label>
                                        </div>
                                </div>

                        </div>
                        {{-- Submit button --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                        <button type="submit" class="btn btn-primary">Generate data</button>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                </div>
                        </div>
                </fieldset>
        </form>
</div>
<div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Output</h3>
        </div>
        <div class="panel-body">
                [name=>'smith']
        </div>
</div>
@stop

@section('body')
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="/css/javascript.js"></script>
        <script src="/css/multiSelectMove.js"></script>
@stop