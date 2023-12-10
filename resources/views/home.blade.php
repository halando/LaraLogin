<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
   
<div class="container">

   <div class="profile">
      @if(empty($user->image))
         <img src="{{ asset('images/default-avatar.png') }}">
      @else
         <img src="{{ asset('uploaded_img/' . $user->image) }}">
      @endif
      <h3>{{ $user->name }}</h3>
      <a href="{{ url('update_profile') }}" class="btn">update profile</a>
      <a href="{{ route('logout') }}" class="delete-btn">logout</a>
      <p>new <a href="{{ url('login') }}">login</a> or <a href="{{ url('register') }}">register</a></p>
   </div>

</div>

</body>
</html>
