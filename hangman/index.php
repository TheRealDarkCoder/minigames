<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Minigames | Hangman</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>

</head>

<body>
<div class='root'>
<div class="game d-inline-flex justify-content-center align-middle flex-wrap flex-column">
    <div class="display ">
    </div>
    <div class="keypad align-content-center ">
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="A">A</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="B">B</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="C">C</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="D">D</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="E">E</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="F">F</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="G">G</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="H">H</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="I">I</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="J">J</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="K">K</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="L">L</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="M">M</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="N">N</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="O">O</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="P">P</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="Q">Q</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="R">R</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="S">S</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="T">T</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="U">U</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="V">V</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="W">W</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="X">X</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="Y">Y</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <span onclick='javascript:pressKey(this)' class="letter" data-letter="Z">Z</span>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <div class="info">
      <ul id='info-ul'>
        <li>Chances left: <span id='turns'></span></li>
      </ul>

      <a href="index.php" id='refresh' class="btn btn-success">New Game</a>
    </div>

</div>

</div>
</body>

</html>