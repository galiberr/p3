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
<form name="rug_form" id="rug_form" class="form-horizontal">
        <fieldset>
                <div class="row">
                        {{-- Sub-form for selecting field elements --}}
                        {{-- Available fields --}}
                        <div class="col-lg-4">
                                <div class="form-group">
                                        <label for="select" class="col-lg-2 control-label">Data fields</label>
                                        <div class="col-lg-10">
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
                                        <label for="select" class="col-lg-2 control-label">Selected fields</label>
                                        <div class="col-lg-10">
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
                        <div class="col-lg-9">
                                <div class="form-group">
                                  <label for="rug_num_records" class="col-lg-2 control-label">Number of sample records</label>
                                  <div class="col-lg-10">
                                    <input class="form-control" name="rug_num_records" id="rug_num_records" placeholder="Number of records" type="text">
                                  </div>
                                </div>                                
                        </div>
                        <div class="col-lg-3">
                                <p class="text-danger">Please select between 1 and 100 data records.</p>
                        </div>
                </div>
                {{-- Remainder of main form - output options --}}
                <div class="row">
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <label class="col-lg-2 control-label">Output</label>
                                        <div class="col-lg-10">
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
                                <div class="checkbox">
                                        <label>
                                                <input type="checkbox" name="rug_csv_header" id="rug_csv_header" > Include header
                                        </label>
                                </div>
                                <div class="form-group">
                                        <label class="col-lg-2 control-label">.csv separator</label>
                                        <div class="col-lg-10">
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

                </div>
                <div class="row">
                        <div class="col-lg-12">
                                <div class="checkbox">
                                        <label>
                                                <input type="checkbox" name="rug_clipboard" id="rug_clipboard" > Copy to clipboard
                                        </label>
                                </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-lg-12">
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Generate sample data</button>
                                </div>                  
                        </div>
                </div>
        </fieldset>
</form>
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
        <script src="/css/multiSelectMove.js"></script>
@stop
