<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
   
<div class="form-container">

   <form action="{{ url('/login') }}" method="post" enctype="multipart/form-data">
      @csrf
      <h3>login now</h3>
      @if($errors->has('message'))
         <div class="message">{{ $errors->first('message') }}</div>
      @endif
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="{{ url('register') }}">register now</a></p>
   </form>

</div>

</body>
</html>
