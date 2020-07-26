<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
<?php 
    $uri = service('uri');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="/">Paperly</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
  <?php if(session()->get('isLoggedIn')): ?>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($uri->getSegment(1) == 'dashboard') {echo('active');} ?>">
        <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if($uri->getSegment(1) == 'profile') {echo('active');} ?>">
        <a class="nav-link" href="/profile">Profile</a>
      </li>
      </ul>
      <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
      </li>
      </ul>
    
  <?php else: ?>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($uri->getSegment(1) == '') {echo('active');} ?>">
        <a class="nav-link" href="/">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if($uri->getSegment(1) == 'register') {echo('active');} ?>">
        <a class="nav-link" href="/register">Register</a>
      </li>
    </ul>
    <?php endif; ?>
    </div>
  </div>
</nav>