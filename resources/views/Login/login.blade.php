<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Panda Login</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="panda">
  <div class="ear"></div>
  <div class="face">
    <div class="eye-shade"></div>
    <div class="eye-white">
      <div class="eye-ball"></div>
    </div>
    <div class="eye-shade rgt"></div>
    <div class="eye-white rgt">
      <div class="eye-ball"></div>
    </div>
    <div class="nose"></div>
    <div class="mouth"></div>
  </div>
  <div class="body"> </div>
  <div class="foot">
    <div class="finger"></div>
  </div>
  <div class="foot rgt">
    <div class="finger"></div>
  </div>
</div>
<form action="{{route('CheckLogin969')}}" method="POST">
  @if (Session::has('fail'))
  <div class="alert alert-danger"></div>
  @endif
  @csrf
  <div class="hand"></div>
  <div class="hand rgt"></div>
  <h1>Panda Login</h1>
  <div class="form-group">
    <input id="id" name="id" required="required" class="form-control"/>
    <label class="form-label">Username</label>
  </div>
  <div class="form-group">
    <input id="password" name="password" type="password" required="required" class="form-control"/>
    <label class="form-label">Password</label>
    <p class="alert">Invalid Credentials..!!</p>
    <button class="btn" type="submit">Login</button>
    <button class="btn" type="backhome" onclick="goBack()">Back Home</button>
  </div>
</form>
<!-- partial -->
<script>
  function goBack() {
    window.location.href = "{{ URL::to('Homepage/homepage') }}";
  }
  </script>
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
</body>
</html>
