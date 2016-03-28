@extends('layouts.master')

@section('title')
        DBF - Lorem Ipsum Generator
@stop

@section('tool_name')
        Lorem Ipsum Generator
@stop

@section('tool_description')
        This DBF tool generates filler text 
@stop

@section('content')
{{-- Input parm form panel --}}
<div class="panel panel-default">
        <form name="lorem_form" id="lorem_form" class="form-horizontal" method="POST" action="/lorem">
                <fieldset>
                        {{-- Theme selector --}}
                        <div class="row">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Theme</label>
                                                <div class="col-lg-9">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="traditional" type="radio">
                                                                        Traditional Latin
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="python" type="radio">
                                                                        Monty Python
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="movie" type="radio">
                                                                        AFI top film quotes 
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_theme" id="lorem_theme" value="beatles" type="radio">
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
                                                                        <input name="lorem_format" id="lorem_format" value="paragraph" type="radio" checked="">
                                                                        Paragraph
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_format" id="lorem_format" value="unordered_list" type="radio">
                                                                        Bullet list
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_format" id="lorem_format" value="ordered_list" type="radio">
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
                                                        <input class="form-control" id="lorem_num_sentences" name="lorem_num_sentences" placeholder="Number of sentences per paragraph" type="text">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">Number of sentences must be between 5 and 30.</p>
                                </div>
                        </div>
                        <div class="row" name="lorem_num_paragraphs_div" id="lorem_num_paragraphs_div">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label for="lorem_num_paragraphs" class="col-lg-3 control-label">No. paragraphs</label>
                                                <div class="col-lg-9">
                                                        <input class="form-control" id="lorem_num_paragraphs" name="lorem_num_paragraphs" placeholder="Total number of paragraphs" type="text">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">Number of paragraphs must be between 1 and 50.</p>
                                </div>
                        </div>

                        {{-- List selector parameters --}}
                        <div class="row" name="lorem_num_items_div" id="lorem_num_items_div">
                                <div class="col-lg-8">
                                        <div class="form-group">
                                                <label for="lorem_num_items" class="col-lg-3 control-label">No. list items</label>
                                                <div class="col-lg-9">
                                                        <input class="form-control" id="lorem_num_items" name="lorem_num_items" placeholder="Total number of list items" type="text">
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-4">
                                        <p class="text-danger">Number of list items must be between 5 and 100.</p>
                                </div>
                        </div>
                        {{-- Output format / copy to clipboard --}}
                         <div class="row">
                                 <div class="col-lg-8">
                                        <div class="form-group">
                                                <label class="col-lg-3 control-label">Output as</label>
                                                <div class="col-lg-3">
                                                        <div class="radio">
                                                                <label>
                                                                        <input name="lorem_output" id="lorem_output" value="text" type="radio">
                                                                        Text
                                                                </label>
                                                                <label>
                                                                        <input name="lorem_output" id="lorem_output" value="html" type="radio">
                                                                        HTML code
                                                                </label>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6 checkbox">
                                                        <label>
                                                                <input type="checkbox" name="lorem_clipboard" id="lorem_clipboard" > Copy to clipboard
                                                        </label>
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
                                </div>
                        </div>
                </fieldset>
        </form>
</div>
{{-- Output panel --}}     
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
@stop