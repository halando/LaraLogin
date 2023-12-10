<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
   
<div class="form-container">

   <form action="{{ url('/register') }}" method="post" enctype="multipart/form-data">
      @csrf
      <h3>register now</h3>
      @if($errors->any())
         <div class="message">
            @foreach($errors->all() as $error)
               {{ $error }}<br>
            @endforeach
         </div>
      @endif
      @if(session('success'))
         <div class="message">{{ session('success') }}</div>
      @endif
      <input type="text" name="name" placeholder="enter username" class="box" value="{{ old('name') }}" required>
      <input type="email" name="email" placeholder="enter email" class="box" value="{{ old('email') }}" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="password" name="password_confirmation" placeholder="confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="{{ url('login') }}">login now</a></p>
   </form>

</div>

</body>
</html>
