@extends('layouts.master')

@section('title')
        Developer's Best Friend
@stop

@section('tool_name')
        Your software development sidekick.
@stop

@section('tool_description')
        DBF's time-saving tools make your life as a programmer a little easier.
@stop

@section('homeLink')
#
@stop

@section('loremLink')
<li><a href="/lorem">
@stop

@section('rugLink')
<li><a href="/rug">
@stop

@section('xkcdLink')
<li><a href="/xkcd">
@stop

@section('content')
<div class="panel panel-default">
        <table class="table table-striped table-hover ">
                <tbody>
                        <tr class="danger">
                                <td><a href="/lorem">Lorem Ipsum Generator</td>
                                <td>
                                        The DBF Lorem Ipsum generator automatically creates filler text
                                        for your websites or other documents. Choose from:
                                        <ul>
                                                <li>Traditional Latin text or a popular theme including Monty
                                                Python, movie quotes or song lyrics.</li>
                                                <li>Filler text in the form of paragraphs or unordered or ordered lists.</li>
                                                <li>Output as regular text or HTML.</li>
                                        </ul>
                                </td>
                        </tr>
                        <tr class="warning">
                                <td><a href="/rug">Random User Generator</td>
                                <td>
                                        The DBF random user generator creates mass sample data records to save
                                        you time when testing. Data returned in JSON, PHP array, CSV,
                                        YAML or MySQL formats.
                                </td>
                        </tr>
                        <tr class="success">
                                <td><a href="/rug">XKCD Password Generator</td>
                                <td>
                                        The DBF XKCD password generator instantly creates an easily memorable but highly
                                        secure password (visit the
                                        <a href="https://xkcd.com/936/" target="_blank">xkcd website</a>
                                        to learn more about the underlying concept).
                                </td>
                        </tr>
                </tbody>
      </table> 
</div>
@stop