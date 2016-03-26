@extends('layouts.master')

@section('title')
DBF - XKCD Password Generator
@stop

@section('content')
<form class="form-horizontal">
        <fieldset>
                <div class="row">
                        <div class="col-lg-6">

                                <div class="panel panel-default">
                                        <div class="panel-body">

                                                <div class="form-group">
                                                        <label for="xkcd_min_length" class="col-lg-2 control-label">Min. overall length<br />(8 to 32)</label>
                                                        <div class="col-lg-10">
                                                                <input class="form-control" id="xkcd_min_length" name="xkcd_min_length" placeholder="Minimum password length" type="text">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="xkcd_num_words" class="col-lg-2 control-label">No. of words<br />(3 to 8, default is 4)</label>
                                                        <div class="col-lg-10">
                                                                <input class="form-control" id="xkcd_num_words" name="xkcd_num_words" placeholder="Number of words" type="text">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-lg-2 control-label">Separator</label>
                                                        <div class="col-lg-10">
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_separator" id="xkcd_separator" value="dash" type="radio">
                                                                                - (default)
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_separator" id="xkcd_separator" value="underscore" type="radio">
                                                                                _
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_separator" id="xkcd_separator" value="period" type="radio">
                                                                                .
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_separator" id="xkcd_separator" value="hash" type="radio">
                                                                                #
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_separator" id="xkcd_separator" value="none" type="radio">
                                                                                None
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                        </div>                
                        <div class="col-lg-6">
                                <div class="panel panel-default">
                                        <div class="panel-body">


                                                <div class="form-group">
                                                        <label class="col-lg-2 control-label">Word case</label>
                                                        <div class="col-lg-10">
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_case" id="xkcd_case" value="lower" type="radio">
                                                                                lower case (default)
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_case" id="xkcd_case" value="upper" type="radio">
                                                                                UPPER CASE
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_case" id="xkcd_case" value="camel" type="radio">
                                                                                Camel Case (1st letter of each word capitalized)
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-lg-2 control-label">Append digit to password</label>
                                                        <div class="col-lg-10">
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_end_num" id="xkcd_end_num" value="none" type="radio">
                                                                                No (default)
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_end_num" id="xkcd_end_num" value="random" type="radio">
                                                                                Add random digit
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_end_num" id="xkcd_end_num" value="specific" type="radio">
                                                                                Add this digit
                                                                                <input id="xkcd_add_this_num" name="xkcd_add_this_num" placeholder="Digit to append" type="text">
                                                                                <br />(must be 0-9)

                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-lg-2 control-label">Append special character to password</label>
                                                        <div class="col-lg-10">
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_end_special" id="xkcd_end_special" value="none" type="radio">
                                                                                No (default)
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_end_special" id="xkcd_end_special" value="random" type="radio">
                                                                                Add random special character
                                                                        </label>
                                                                </div>
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="xkcd_end_special" id="xkcd_end_special" value="specific" type="radio">
                                                                                Add this special character
                                                                                <input id="xkcd_add_this_char" name="xkcd_add_this_char" placeholder="Special character to append" type="text">
                                                                                <br />Must be one of !@$%^&*-_+=:|~?/.;

                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                        </div>
                </div> 
        </fieldset>
</form>
@stop