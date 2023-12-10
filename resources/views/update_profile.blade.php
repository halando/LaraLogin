<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
   
<div class="update-profile">

   <form action="{{ url('/update_profile') }}" method="post" enctype="multipart/form-data">
      @csrf
      <img src="{{ asset($user->image ? 'uploaded_img/' . $user->image : 'images/default-avatar.png') }}">
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
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="{{ old('update_name', $user->name) }}" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="{{ old('update_email', $user->email) }}" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="new_pass_confirmation" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="{{ url('home') }}" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>
