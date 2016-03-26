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
<form class="form-horizontal">
        <fieldset>
                <div class="row">
                        <div class="col-lg-12">
                                <div class="panel panel-default">
                                        <div class="panel-body">
                                                <div class="form-group">
                                                        <label class="col-lg-2 control-label">Theme</label>
                                                        <div class="col-lg-10">
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="lorem_theme" id="lorem_theme" value="traditional" type="radio">
                                                                                Traditional Latin text
                                                                        </label>
                                                                        <label>
                                                                                <input name="lorem_theme" id="lorem_theme" value="python" type="radio">
                                                                                Monty Python
                                                                        </label>
                                                                        <label>
                                                                                <input name="lorem_theme" id="lorem_theme" value="movie" type="radio">
                                                                                AFI 100 top film quotes 
                                                                        </label>
                                                                        <label>
                                                                                <input name="lorem_theme" id="lorem_theme" value="beatles" type="radio">
                                                                                Beatles lyrics
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-lg-2 control-label">Form</label>
                                                        <div class="col-lg-10">
                                                                <div class="radio">
                                                                        <label>
                                                                                <input name="lorem_form" id="lorem_form" value="paragraph" type="radio">
                                                                                Paragraph
                                                                        </label>
                                                                        <label>
                                                                                <input name="lorem_form" id="lorem_form" value="bullet_list" type="radio">
                                                                                Bullet list
                                                                        </label>
                                                                        <label>
                                                                                <input name="lorem_form" id="lorem_form" value="num_list" type="radio">
                                                                                Ordered list
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="lorem_num_sentences" class="col-lg-2 control-label">No. of sentences per paragraph</label>
                                                        <div class="col-lg-10">
                                                                <input class="form-control" id="lorem_num_sentences" name="lorem_num_sentences" placeholder="Number of sentences per paragraph" type="text">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="lorem_num_paragraphs" class="col-lg-2 control-label">No. of paragraphs</label>
                                                        <div class="col-lg-10">
                                                                <input class="form-control" id="lorem_num_paragraphs" name="lorem_num_paragraphs" placeholder="Number of paragraphs" type="text">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="lorem_num_items" class="col-lg-2 control-label">No. of list items</label>
                                                        <div class="col-lg-10">
                                                                <input class="form-control" id="lorem_num_items" name="lorem_num_items" placeholder="Number of list items" type="text">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label class="col-lg-2 control-label">Output as...</label>
                                                        <div class="col-lg-10">
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
                                                </div>
                                                <div class="checkbox">
                                                        <label>
                                                                <input type="checkbox" name="lorem_clipboard" id="lorem_clipboard" > Copy to clipboard
                                                        </label>
                                                </div>
                                        </div>
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