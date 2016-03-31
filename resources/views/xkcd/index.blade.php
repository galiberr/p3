@extends('layouts.master')

@section('title')
DBF XKCD Password Generator
@stop

@section('tool_name')
        XKCD Password Generator
@stop

@section('tool_description')
        Easily memorable, highly secure passwords for your website accounts.
@stop

@section('homeLink')
/
@stop

@section('loremLink')
<li><a href="/lorem">
@stop

@section('rugLink')
<li><a href="/rug">
@stop

@section('xkcdLink')
<li class="active"><a href="#">
@stop

@section('content')
<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">
            
        Select specifications for your new password, click the generate password button
        and your new password will appear in the section below.
    </h2>
  </div>

<div class="panel-body">
        <form name="xkcd_form" id="xkcd_form" class="form-horizontal" method="POST" action="/xkcd">
                <fieldset>
                        {{ csrf_field() }}
                        {{-- Mininum length --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label for="xkcd_min_length" class="col-lg-3 control-label">Min. length</label>
                                                <div class="col-lg-9">
                                                        <input class="form-control" id="xkcd_min_length" name="xkcd_min_length" placeholder="8 to 32" type="text" value="{{ old('xkcd_min_length') }}<?php if (isset($_POST['xkcd_min_length'])) echo $_POST['xkcd_min_length'] ?>">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @foreach ($errors->get('xkcd_min_length') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        {{-- Number of words in password --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label for="xkcd_num_words" class="col-lg-3 control-label">No. of words</label>
                                                <div class="col-lg-9">
                                                        <input class="form-control" id="xkcd_num_words" name="xkcd_num_words" placeholder="3 to 8" type="text" value="{{ old('xkcd_num_words') }}<?php if (isset($_POST['xkcd_num_words'])) echo $_POST['xkcd_num_words'] ?>">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @foreach ($errors->get('xkcd_num_words') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        {{-- Separator character --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Separator</label>
                                                <div class="col-lg-9">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="xkcd_separator" value="dash" type="radio" <?php if (!isset($_POST['xkcd_separator']) || ($_POST['xkcd_separator'] == 'dash')) echo 'checked' ?>>
                                                                        -
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_separator" value="underscore" type="radio" <?php if (isset($_POST['xkcd_separator']) && ($_POST['xkcd_separator'] == 'underscore')) echo 'checked' ?>>
                                                                        _
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_separator" value="period" type="radio" <?php if (isset($_POST['xkcd_separator']) && ($_POST['xkcd_separator'] == 'period')) echo 'checked' ?>>
                                                                        .
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_separator" value="hash" type="radio" <?php if (isset($_POST['xkcd_separator']) && ($_POST['xkcd_separator'] == 'hash')) echo 'checked' ?>>
                                                                        #
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_separator" value="none" type="radio" <?php if (isset($_POST['xkcd_separator']) && ($_POST['xkcd_separator'] == 'none')) echo 'checked' ?>>
                                                                        None
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                </div>
                        </div>
                        {{-- Word case --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Word case</label>
                                                <div class="col-lg-9">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="xkcd_case" value="lower" type="radio" <?php if (!isset($_POST['xkcd_case']) || ($_POST['xkcd_case'] == 'lower')) echo 'checked' ?>>
                                                                        lower case
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_case" value="upper" type="radio" <?php if (isset($_POST['xkcd_case']) && ($_POST['xkcd_case'] == 'upper')) echo 'checked' ?>>
                                                                        UPPER CASE
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_case" value="camel" type="radio" <?php if (isset($_POST['xkcd_case']) && ($_POST['xkcd_case'] == 'camel')) echo 'checked' ?>>
                                                                        Camel Case
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                </div>
                        </div>
                        {{-- Append digit --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Append digit</label>
                                                <div class="col-lg-9">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="xkcd_end_num" value="none" type="radio" <?php if (!isset($_POST['xkcd_end_num']) || ($_POST['xkcd_end_num'] == 'none')) echo 'checked' ?>>
                                                                        No
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_end_num" value="random" type="radio" <?php if (isset($_POST['xkcd_end_num']) && ($_POST['xkcd_end_num'] == 'random')) echo 'checked' ?>>
                                                                        Add random digit
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_end_num" value="specific" type="radio" <?php if (isset($_POST['xkcd_end_num']) && ($_POST['xkcd_end_num'] == 'specific')) echo 'checked' ?>>
                                                                        Add this digit
                                                                        <input id="xkcd_add_this_num" name="xkcd_add_this_num" placeholder="Enter digit from 0 to 9" type="text" value="{{ old('xkcd_add_this_num') }}<?php if (isset($_POST['xkcd_add_this_num'])) echo $_POST['xkcd_add_this_num'] ?>">
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @foreach ($errors->get('xkcd_add_this_num') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        {{-- Append special character --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Append special character</label>
                                                <div class="col-lg-9">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="xkcd_end_special" value="none" type="radio" <?php if (!isset($_POST['xkcd_end_special']) || ($_POST['xkcd_end_special'] == 'none')) echo 'checked' ?>>
                                                                        No
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_end_special" value="random" type="radio" <?php if (isset($_POST['xkcd_end_special']) && ($_POST['xkcd_end_special'] == 'random')) echo 'checked' ?>>
                                                                        Add random character
                                                                </label>
                                                                <label>
                                                                        <input name="xkcd_end_special" value="specific" type="radio" <?php if (isset($_POST['xkcd_end_special']) && ($_POST['xkcd_end_special'] == 'specific')) echo 'checked' ?>>
                                                                        Add this character
                                                                        <input id="xkcd_add_this_char" name="xkcd_add_this_char" placeholder="Enter one of !@$%^&*-_+=:|~?/.;" type="text" value="{{ old('xkcd_add_this_char') }}<?php if (isset($_POST['xkcd_add_this_char'])) echo $_POST['xkcd_add_this_char'] ?>">
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @foreach ($errors->get('xkcd_add_this_char') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        {{-- Submit button --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                        <button type="submit" class="btn btn-primary">Generate password</button>
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
        <script src="/css/xkcd.js"></script>
@stop