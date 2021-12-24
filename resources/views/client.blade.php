<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/7c9d8cabea7f4697dde2e98c001c5f2d?family=Futura+PT+Light" rel="stylesheet"
        type="text/css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}" />
<script src="{{ URL::asset('js/admin.js') }}"></script>
  

</head>
<body class="antialiased" style="font-family:Futura-Pt Light;">
   
<?php
function getCategoryName($id){
  echo 'sadsadasdsa';
$result = DB::select('select * from category where CATEGORY_ID = ?', [$id]);
echo $result[0];
}


function update($value){
// echo 'Afisare: '.$value;
// var_dump($value);
// print_r($value);
// print_r (explode(" ", $value));
// print($value);
$a = str_replace($value,$value,$value);
echo $a;
print_r (explode(" ", $a));
}


?>

<div id='fff'></div>

<div id="myModal" class="modal">


  <div class="modal-content">
    <span class="close" style="float: right;">&times;</span>
   <center> 
     <form action="/admin/addcat" method="POST">
      @csrf
      <label for="name" class="label">Name:</label>
      <input type="text" name="name" class="input" id="catnam">
      <input type="submit" name="Submit" class="btn btn-secondary">
    </form>
    </center>
  </div>
</div>




<div id="myModall" class="modal">


  <div class="modal-content">
    <span class="closee" style="float: right;">&times;</span>
    <div id="catcontent"><div class="catid"></div></div>
   <center> 


     <form action="/admin/addundcat" method="POST">
      @csrf
      <label for="name" class="label">Name:</label>
      <input type="text" name="name" class="input" id="catnam"><br>
      <label for="slctcategory">Choose a category:</label>
      <select name="slctcategory" id="slctcategory" >
        <?php
          $users = DB::table('category')->get();
        foreach ($users as $user)
        {
             echo '     <option value="'.$user->CATEGORY_ID.'">'.$user->NAME.'</option>';

        }
                  ?> 
      </select>
                  
      <input type="submit" name="Submit" class="btn btn-secondary">
    </form>
    </center>
    <div class="undercatinfo">

    </div>
  </div>
</div>




<div id="myModalsg" class="modal">


  <div class="modal-content">
    <span class="closesg" style="float: right;">&times;</span>
   
   <center> 


     <form action="/admin/addsg" method="POST">
      @csrf
      <label for="name" class="label">Name:</label>
      <input type="text" name="name" class="input" id="catnam"><br>
      <label for="slctundcategory">Choose an undercategory:</label>
      <select name="slctundcategory" id="slctundcategory" >
        <?php
          $users = DB::table('undercategory')->get();
        foreach ($users as $user)
        {
             echo '     <option value="'.$user->UNDERCATEGORY_ID.'">'.$user->NAME.'</option>';

        }
                  ?> 
      </select>
                  
      <input type="submit" name="Submit" class="btn btn-secondary">
    </form>
    </center>
  </div>
</div>



<div id="myModals" class="modal">


  <div class="modal-content">
    <span class="closes" style="float: right;">&times;</span>

   <center> 


     <form action="/admin/adds" method="POST">
      @csrf
      <label for="name" class="label">Name:</label>
      <input type="text" name="name" class="input" id="catnam"><br>
      <label for="slctsg">Choose a Specification Group:</label>
      <select name="slctsg" id="slctsg" >
        <?php
          $users = DB::table('SPECIFICATION_GROUP')->get();
        foreach ($users as $user)
        {
             echo '     <option value="'.$user->SPECIFICATION_GROUP_ID.'">'.$user->NAME.'</option>';

        }
                  ?> 
      </select>
                  
      <input type="submit" name="Submit" class="btn btn-secondary">
    </form>
    </center>
   
  </div>
</div>

<div id="myModalAddNewProduct" class="modal" style="position: absolute; top: 0px;">
<div class="modal-content">
    <span class="closeaddp" style="float: right;">&times;</span>

  


     <form action="/admin/addnewproduct" method="POST" enctype="multipart/form-data">
      @csrf
      
      <div class="form-group mb-3">
      <label for="name" class="label">Name</label><br>
      <input type="text" name="prodnam" class="input form-control" id="prodnam"><br>
      </div>
      <div class="form-group mb-3">
      <label for="textarea" class="label">Description</label><br> 
      <textarea type="textarea" name="proddes" class="input form-control" id="proddes"  ></textarea><br>
      </div>
      <div class="form-group mb-3">
      <label for="slctsg">Choose a Category</label><br> 
      <select name="slccat" id="slccat"  class="form-control" >
        <?php
          $users = DB::table('category')->get();
        foreach ($users as $user)
        {
             echo '     <option value="'.$user->CATEGORY_ID.'">'.$user->NAME.'</option>';

        }
                  ?> 
      </select><br>
      </div>
      <div class="form-group mb-3">
      <label for="slctsg">Choose an Undercategory</label><br> 
      <select name="slcucat" id="slcucat"  class="form-control" >
        <?php
          $users = DB::table('undercategory')->get();
        foreach ($users as $user)
        {
             echo '     <option value="'.$user->UNDERCATEGORY_ID.'">'.$user->NAME.'</option>';

        }
                  ?> 
      </select><br>
      </div>
      <div class="form-group mb-3">
      <label for="name" class="label">Price</label><br> 
      <input type="text" name="prodprice" class="input form-control" id="prodprice"  ><br>
      <div class="form-group mb-3"></div>
      <label for="name" class="label">Image</label><br> 
      <input  type="file" name="img_prod[]" multiple class="form-control" ><br>
      <div class="form-group mb-3"></div>
      <label for="name" class="label">Stoc</label><br> 
      <input type="number" name="prodstoc" class="input form-control" id="prodstoc"  ><br>
      <div class="form-group mb-3"></div>
      <label for="name" class="label">Sale</label><br> 
      <input type="number" name="prodsale" class="input form-control" id="prodsale"  ><br> <br><br>   
      </div>
      <input type="submit" name="Submit" class="btn btn-secondary" class="form-control" >
      </div>
    </form>
  
   
  </div>
</div>


    <div class="wrapper">

        <nav class="bg-dark">
          <a  href="{{ url('/') }}"><img class="logo" src="{{ url('/img/logo2.0.png') }}" style="margin-bottom: 30px;"></a>
          <header>
            <?php
                use Illuminate\Support\Facades\Auth;
                $user = Auth::user()->name;
                echo '<i style="font-size: 25px;margin-left:5px; " class="fas fa-user-circle"></i><h6 maxlength="25" style="margin-left:39px; margin-bottom:30px;">'.$user.'</h6>';
            ?>
        
          </header>

           <center style="margin-bottom:20px;"> <span style="color: white;font-size:20px;font-weight:800; ">Navigation</span><br></center>

            <a class="active admilist" onclick="edittitle(this.text, (document.getElementById('head_name').innerText))"><i class="fal fa-tachometer-fastest"></i><span>Dashboard</span></a><br>
            <a class="admilist"  onclick="edittitle(this.text, (document.getElementById('head_name').innerText))"><i class="far fa-truck-couch"></i><span>Delivery</span></a><br>
            <a class="admilist"  onclick="edittitle(this.text, (document.getElementById('head_name').innerText))"><i class="fal fa-cog"></i><span>Settings</span></a><br>
            <a href="{{ url('/logout') }}"  class="admilist"><i class="fal fa-sign-out-alt"></i><span>Logout</span></a><br>

        </nav>
      
        <main>
      
          <h1 id="head_name">Dashboard</h1>
      
          <div class="flex-grid" id="div_Dashboard">
            <div>
              <h2>CODRU Points</h2>
             
                 <?php
                   $comand = DB::select('select * from comand where user_id = ? and (status = 4 or 3 or 2 or 1)', [Auth::user()->id]);
                  $coin_v = 0;    
                   foreach ($comand as $key => $com) {
                        $coin_v += ($com->TOTAL)/1000+5;
                      }

                 echo ' <i class="fas fa-coins" style="color: gold;font-size:80px;">⠀⠀</i><span style="font-size:80px;"> '.$coin_v.'</span>';
                  ?>
            </div>
            <div>
              <h2>Saved Money</h2>
                <?php
                   $comand = DB::select('select * from comand where user_id = ? and (status <> 0)', [Auth::user()->id]);
                  $saved_m = 0.00;    
                   foreach ($comand as $key => $com) {
                        $saved_m +=($com->TOTAL)-($com->TOTAL)/($com->PROMO);
                      }
                      $saved_m = number_format($saved_m, 2);
                 echo ' <i class="fas fa-dollar-sign"style="color: green;font-size:80px;">⠀⠀</i><span style="font-size:80px;"> '.$saved_m.'</span>';
                  ?>
            </div>
            <div>
              <h2>Orders Placed</h2>
             
              <?php
                   $comand = DB::select('select * from comand where user_id = ?', [Auth::user()->id]);
              
                      
                 echo ' <i class="fas fa-box-open"style="color: black;font-size:80px;">⠀⠀</i><span style="font-size:80px;"> '.count($comand).'</span>';
                  ?>
              
            </div>
          </div>
      

          
          <div class="flex-grid" id="div_Delivery" style="display:none;">
          <?php 
          $comand = DB::select('select * from comand where user_id = ? and (status = 1 or 2 or 3)', [Auth::user()->id]);

         if(isset($comand[0]->COMAND_ID)){    
           
     echo '     <div>
              <h2>Orders in progress</h2>
        
  <table class="table"  width="100%">
                <th>Comand ID</th>
                <th>Status</th>
                <th>Country</th>
                <th>City</th>
                <th>ZIP Code</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Total</th>';

                
               
                
                foreach ($comand as $key => $com) {
                  echo '<tr><td>'.$com->COMAND_ID.'</td>';
                    if($com->STATUS=='1') echo '<td>Confirmed</td>';
                        else if($com->STATUS=='2') echo '<td>Sent</td>';
                        else if($com->STATUS=='3') echo '<td>Reached the destination</td>';
                  echo '<td>'.$com->COUNTRY.'</td>';
                  echo '<td>'.$com->CITY.'</td>';
                  echo '<td>'.$com->ZIP_CODE.'</td>';
                  echo '<td>'.$com->ADRESS.'</td>';
                  echo '<td>'.$com->PHONE_NUMBER.'</td>';
                  echo '<td>'.$com->TOTAL.'</td></tr>';
                }
                


              echo '</table></div>';}
?>


            <?php 

           echo' <div>';
              
              $comand = DB::select('select * from comand where user_id = ? and (status = 4)', [Auth::user()->id]);
    
             if(isset($comand[0]->COMAND_ID)){    
               
         echo '     <div>
                  <h2>History</h2>
            
      <table border="1" width="100%">
                    <th>Comand ID</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>ZIP Code</th>
                    <th>Address</th>
                    <th>Phone number</th>
                    <th>Total</th>';
    
                    
                   
                    
                    foreach ($comand as $key => $com) {
                      echo '<tr><td>'.$com->COMAND_ID.'</td>';
                      echo '<td>'.$com->COUNTRY.'</td>';
                      echo '<td>'.$com->ZIP_CODE.'</td>';
                      echo '<td>'.$com->ADRESS.'</td>';
                      echo '<td>'.$com->PHONE_NUMBER.'</td>';
                      echo '<td>'.$com->TOTAL.'</td></tr>';
                    }
                    
    
    
                  echo '</table></div>';}
    ?>
            
        
          

        


          </div>
          
          <div class="flex-grid" id="div_Settings" style="display:none;">
            <div>
              <h2>Clean Settings</h2>
              <ul>
                <li>no position: absolute</li>
                <li>no float</li>
                <li>no clearfix</li>
                <li>no faux columns</li>
                <li>no javascript</li>
              </ul>
            </div>
            <div>
              <h2>Font Awesome</h2>
              <ul>
                <li>no images</li>
                <li>no extra retina sprites</li>
              </ul>
            </div>
            <div>
              <h2>SCSS</h2>
              <ul>
                <li>no headache :)</li>
              </ul>
            </div>
          </div> 

        </main>
      
      </div>

</body>
<script src="{{ URL::asset('js/admin_2.js') }}"></script>


</html>
