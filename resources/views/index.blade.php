@extends('layout')


{{-- meta and includes --}}
@section('title', 'A simple and fast URL Shortener')
@section('description', 'A simple and fast URL shortener')
@section('keywords', 'url, shortener, tiny')
@section('file', 'index')

{{-- Scripts --}}
@section('extendScript')
  <script src="https://cdn.jsdelivr.net/clipboard.js/1.5.13/clipboard.min.js"></script>
@stop

{{-- Styling and Fonts --}}
@section('extendHead')
<!--
  <script>
    $(function() {
       $("body").css("background", '#F9F9F9 url("https://unsplash.it/' + window.innerWidth + '/' + window.innerHeight + '/?random") no-repeat');
    })
  </script>
-->
  <link href='https://fonts.googleapis.com/css?family=Oswald:300|Dosis|Ubuntu:300italic' rel='stylesheet' type='text/css'>
@stop

{{-- Body --}}
@section('body')

  @if($maintainance)
    <div class="alert alert-danger fade in" style="border-radius: 0px !important;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><span class="glyphicon glyphicon-warning-sign"></span></strong> This site is under Maintainance. Come back after some time.
    </div>
  @endif

  <div class="box">
    <div class="text">
      <img src="img/logo.svg" alt="" height="300px" width="600px">
      <kbd>BETA</kbd>
    </div>
    <div class="container cbox text-center">
      <input type="text" class="url-box enter-trig" placeholder="Paste a link to shorten it" name="pin">
      <div class="break"><br></div>
      <button type="button" class="btn btn-color url-button trigg" id="submit-code">SHORTEN</button>
      <br><br>
    </div>
    <p class="advanced">Advanced</p>
    <div id="advanced"><b><br>Custom alias : www.links.gq/</b> <input type="text" class="key-box enter-trig"></div>
  </div>
  <footer>
    <code><a href="http://aravindvasudev.github.io/">&copy; AravindVasudev</a></code>
  </footer>

@stop