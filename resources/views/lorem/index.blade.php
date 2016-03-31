@extends('layouts.master')

@section('title')
        DBF Lorem Ipsum Generator
@stop

@section('tool_name')
        Lorem Ipsum Generator
@stop

@section('tool_description')
        Automatically generated filler text for your websites or other documents.
@stop

@section('homeLink')
/
@stop

@section('loremLink')
<li class="active"><a href="#">
@stop

@section('rugLink')
<li><a href="/rug">
@stop

@section('xkcdLink')
<li><a href="/xkcd">
@stop

@section('content')
{{-- Input parm form panel --}}
<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">
        Select a theme and output type/size/format, click the generate text button
        and your text will appear in the section below.
    </h2>
  </div>

<div class="panel-body">
        <form name="lorem_form" id="lorem_form" class="form-horizontal" method="POST" action="/lorem">
                <fieldset>
                        {{ csrf_field() }}
                        {{-- Theme selector --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Theme</label>
                                                <div class="col-lg-9">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="0" type="radio" <?php if (!isset($_POST['lorem_theme']) || ($_POST['lorem_theme'] == '0')) echo 'checked' ?>>
                                                                        Traditional Latin
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="1" type="radio" <?php if (isset($_POST['lorem_theme']) && ($_POST['lorem_theme'] == '1')) echo 'checked' ?>>
                                                                        Monty Python
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="2" type="radio" <?php if (isset($_POST['lorem_theme']) && ($_POST['lorem_theme'] == '2')) echo 'checked' ?>>
                                                                        Movie quotes 
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="3" type="radio" <?php if (isset($_POST['lorem_theme']) && ($_POST['lorem_theme'] == '3')) echo 'checked' ?>>
                                                                        Beatles lyrics
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                </div>
                        </div>
                        
                        {{-- Paragraph/list selector --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Form</label>
                                                {{-- Paragraph/list selector --}}
                                                <div class="col-lg-9">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="lorem_format" id="lorem_format" value="0" type="radio" <?php if (!isset($_POST['lorem_format']) || ($_POST['lorem_format'] == '0')) echo 'checked' ?>>
                                                                        Paragraph
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_format" id="lorem_format" value="1" type="radio" <?php if (isset($_POST['lorem_format']) && ($_POST['lorem_format'] == '1')) echo 'checked' ?>>
                                                                        Bullet list
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_format" id="lorem_format" value="2" type="radio" <?php if (isset($_POST['lorem_format']) && ($_POST['lorem_format'] == '2')) echo 'checked' ?>>
                                                                        Ordered list
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                </div>
                        </div>
                        
                        {{-- Paragraph parameters --}}
                        <div class="row" name="lorem_num_sentences_div" id="lorem_num_sentences_div">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label for="lorem_num_sentences" class="col-lg-3 control-label">No. sentences</label>
                                                <div class="col-lg-9">
                                                        <input class="form-control" id="lorem_num_sentences" name="lorem_num_sentences" placeholder="1 to 40 sentences per paragraph" type="text" value="{{ old('lorem_num_sentences') }}<?php if (isset($_POST['lorem_num_sentences'])) echo $_POST['lorem_num_sentences'] ?>">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @foreach ($errors->get('lorem_num_sentences') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        <div class="row" name="lorem_num_paragraphs_div" id="lorem_num_paragraphs_div">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label for="lorem_num_paragraphs" class="col-lg-3 control-label">No. paragraphs</label>
                                                <div class="col-lg-9">
                                                        <input class="form-control" id="lorem_num_paragraphs" name="lorem_num_paragraphs" placeholder="1 to 40" type="text" value="{{ old('lorem_num_paragraphs') }}<?php if (isset($_POST['lorem_num_paragraphs'])) echo $_POST['lorem_num_paragraphs'] ?>">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @foreach ($errors->get('lorem_num_paragraphs') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>

                        {{-- List selector parameters --}}
                        <div class="row" name="lorem_num_items_div" id="lorem_num_items_div">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label for="lorem_num_items" class="col-lg-3 control-label">No. list items</label>
                                                <div class="col-lg-9">
                                                        <input class="form-control" id="lorem_num_items" name="lorem_num_items" placeholder="5 to 100" type="text" value="<?php if (isset($_POST['lorem_num_items'])) echo $_POST['lorem_num_items'] ?>">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">
                                                @foreach ($errors->get('lorem_num_items') as $error)
                                                        {{ $error }}<br/>
                                                @endforeach
                                        </p>
                                </div>
                        </div>
                        {{-- Output format --}}
                         <div class="row">
                                 <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Output as</label>
                                                <div class="col-lg-3">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="lorem_output" id="lorem_output" value="0" type="radio" <?php if (!isset($_POST['lorem_output']) || ($_POST['lorem_output'] == '0')) echo 'checked' ?>>
                                                                        Text
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_output" id="lorem_output" value="1" type="radio" <?php if (isset($_POST['lorem_output']) && ($_POST['lorem_output'] == '1')) echo 'checked' ?>>
                                                                        HTML code
                                                                </label>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                 <div class="col-lg-4">
                                 </div>
                        </div>

                        {{-- Submit button --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                        <button type="submit" class="btn btn-primary">Generate text</button>
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
                {!! $output !!}
                {{ $html_output }}
        </div>
</div>
@stop

@section('body')
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="/css/lorem.js"></script>
@stop