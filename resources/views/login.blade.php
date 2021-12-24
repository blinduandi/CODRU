<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Acasa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
            <link href="//db.onlinewebfonts.com/c/7c9d8cabea7f4697dde2e98c001c5f2d?family=Futura+PT+Light" rel="stylesheet" type="text/css"/>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    .body{
        background-color: aliceblue;    
    }
.logo{
    display: block;
  margin-left: auto;
  margin-right: auto;
  background-color: black;
  padding: 40px;

}
.login{
    padding-bottom: 60px;
    padding-left: 30px;
    padding-top: 30px;
    border: 1px solid black;    
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 380px;  
   
}
</style>

    </head>
    <?php
                use Illuminate\Support\Facades\Auth;

                try{
                if(Auth::user()->TIP==111){
                   echo' <script type="text/javascript">
                    window.location.href = "admin";
                    </script>';
                }
                 if(Auth::user()->TIP==0){
                   echo' <script type="text/javascript">
                    window.location.href = "client";
                    </script>';
                }
                if(Auth::user()->TIP==1){
                   echo' <script type="text/javascript">
                    window.location.href = "seller";
                    </script>';
                }}
                catch (Exception $e) {}
            ?>


    <body class="antialiased" style="font-family:Futura-Pt Light;">
        
        <img class="logo" src="{{ url('/img/logo2.0.png') }}">
<div class="login">
<center><h3 style="font-weight:bold;">Log in</h3></center>
{{-- 
<form action="/dashboard" method="POST">
<label for="name" style="font-weight:bold;width: 150%; margin-left:+20%; ">Nume</label><br>
<center><input type="text" name="name" required><br></center>
<label for="email" style="font-weight:bold;width: 100%; margin-left:+20%; ">Email</label><br>
<center><input type="email" name="email" required><br></center>
<label for="name" style="font-weight:bold;width: 100%; margin-left:+20%; ">Parola</label><br>
<center><input type="text" name="name" required><br></center>
<label for="name" style="font-weight:bold;width: 100%; margin-left:+20%; ">Reintrodu parola</label><br>
<center><input type="text" name="name" required><br></center>
<center><input type="submit" value="Inscriete" class="btn btn-dark" style="width: 80%; margin-top:30px;"></center>

</form> --}}
<center class="pt-5">
<button onclick="window.location='{{ url("auth/google") }}'" class="btn">
    <i class="fab fa-google" style="font-size: 75px;"></i>
</button>
<button onclick="window.location='{{ url("auth/facebook") }}'" class="btn">
    <i class="fab fa-facebook" style="font-size: 75px;"></i>
</button>
<button onclick="window.location='{{ url("auth/apple") }}'" class="btn">
    <i class="fab fa-apple" style="font-size: 75px;"></i>
</button>
</center>
</div>

<div class="container-fluid bg-dark p-5 mt-5 text-justify" style="text-decoration: none; color:white;font-size:25px;position:absolute;bottom: 0;">
    <center><a href="tel:+37378235087" ><i class="fas fa-phone"></i>+37378235087</a><br>
    <a href="mailto:andi.blindu04@gmail.com" ><i class="fal fa-envelope-open"></i>andi.blindu04@gmail.com</a><br>
    <a href="https://github.com/blinduandi" ><i class="fab fa-github"></i>blinduandi</a><br></center>
  </div>

</body>
</html>
