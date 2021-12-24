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
            <a class="admilist"  onclick="edittitle(this.text, (document.getElementById('head_name').innerText))"><i class="fad fa-boxes"></i><span>Manage Products</span></a><br>
            <a class="admilist"  onclick="edittitle(this.text, (document.getElementById('head_name').innerText))"><i class="far fa-truck-couch"></i><span>Delivery</span></a><br>
            <a class="admilist"  onclick="edittitle(this.text, (document.getElementById('head_name').innerText))"><i class="fal fa-cog"></i><span>Settings</span></a><br>
            <a href="{{ url('/logout') }}"  class="admilist"><i class="fal fa-sign-out-alt"></i><span>Logout</span></a><br>

        </nav>
      
        <main>
      
          <h1 id="head_name">Dashboard</h1>
      
          <div class="flex-grid" id="div_Dashboard">
            <div>
              <h2>Products sold</h2>
        
              <?php
              
              $k = 0; 
              $uploaded = DB::select('select * from products where uploaded_by = ? ', [Auth::user()->id]);
              foreach ($uploaded as $key => $upl) {

              $comand = DB::select('select * from cart where user_id = ? ', [$upl->UPLOADED_BY]);
               
              foreach ($comand as $key => $com) {
                   $k ++;
                 }
}
            echo ' <i class="fas fa-shopping-cart" style="color: dark;font-size:80px;">⠀⠀</i><span style="font-size:80px;"> '.$k.'</span>';
             ?>

            </div>
            <div>
              <h2>Products for sale</h2>
              
         <?php
              
              $k = 0; 
              $products = DB::select('select * from products where uploaded_by = ? ', [Auth::user()->id]);
              foreach ($products as $key => $prod) {
                  $k++;
              }
            echo ' <i class="fas fa-border-style" style="color: dark;font-size:80px;">⠀⠀</i><span style="font-size:80px;"> '.$k.'</span>';
             ?>

              
            </div>
            <div>
              <h2>Unprocessed Orders</h2>
              <?php
              
              $k = 0; 
              $products = DB::select('select * from comand where status = ? ', [1]);
              foreach ($products as $key => $prod) {
                  $k++;
              }
            echo ' <i class="fas fa-send-back" style="color: dark;font-size:80px;">⠀⠀</i><span style="font-size:80px;"> '.$k.'</span>';
             ?>
            </div>
          </div>
      

          <div class="flex-grid" id="div_Manage_Products" style="display:none;">
            <button class="btn btn-dark" id="btnAddProduct" style="margin: 20px;float: right;" onclick="modalAddNewProduct()">Add new product</button>  
            <div>
               
                  
           

            <table width=100%>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stoc</th>
              <th>Rating</th>
              <th>Options</th>
                <?php 
                
                $products = DB::table('products')->get();
        foreach ($products as $product)
        {
          echo '<tr>';
           echo'<td>'.$product->NAME.'</td>'; 
           echo'<td>'.$product->DESCRIPTION.'</td>'; 
           echo'<td>'.$product->CATEGORY_ID.'</td>';
           echo'<td>'.$product->PRICE.'</td>'; 
           echo'<td>'.$product->STOC_AVAIBLE.'</td>';
            echo'<td>'.$product->RATING.'</td>';

          echo '<td>';
            echo '<button class="btn btn-secondary m-1" style="dysplay:block;" ><i class="fal fa-trash-alt"></i></button>';
            echo '<button class="btn btn-secondary m-1"  ><i class="fal fa-edit"></i></button>';
            echo '<button class="btn btn-secondary m-1"  ><i class="fal fa-parachute-box"></i></button>
                </td>';


          echo'</tr>';
        }
                  ?>
            </table>
            </div>
           
          </div>

          <div class="flex-grid" id="div_Manage_Users" style="display:none;" >
            <div style="overflow: scroll;">
            <form action="/admin/updateuser" method="POST">
              @csrf
              <input type="submit" class="btn btn-danger"  style="margin: 20px;float: right;"> 
            <table style="width: 100%;" class="table">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>ID</th>
                  <th>Status</th>
                  <th>Active</th>
                  <th></th>
                </tr>
                
              
                <?php
          $users = DB::table('users')->get();
        foreach ($users as $user)
        {


          echo '<tr>';
           echo'<td>'.$user->name.'</td>'; 
           echo'<td>'.$user->email.'</td>'; 
           echo'<td>'.$user->id.'</td>';

           echo '<input type="hidden" name="id'.$user->id.'" value="'.$user->id.'"/>';
           echo '<input type="hidden" name="name'.$user->id.'" value="'.$user->name.'"/>';
          


           echo '<td><select name="TIP'.$user->id.'" id="tip" class="form-select" >';
                 if($user->TIP == '111')  echo'<option value="Admin" selected>Admin</option>';
                  else echo'<option value="Admin">Admin</option>';
                 if($user->TIP == '1')  echo'<option value="Seller" selected>Seller</option>';
                 else echo'<option value="Seller">Seller</option>';
                 if($user->TIP == '0') echo'<option value="Client" selected>Client</option>';
                 else echo'<option value="Client">Client</option>
                </select></td>';
         //  echo'<td>'.$user->TIP.'</td>';  
           
    

          echo '<td>';
            if($user->ACTIV=='0'){
          echo'<label class="switch">
  <input type="checkbox" checked name="activ'.$user->id.'">
  <span class="slider round"></span>
</label>';    
          }
        else {
          echo'<label class="switch">
  <input type="checkbox"  name="activ'.$user->id.'">
  <span class="slider round"></span>
</label>';
          }



           
            echo '</td>';


          echo'</tr>';
        }
                  ?>
              </table>

            </form>  
         </div>
          </div>

          <div class="flex-grid" id="div_Delivery" style="display:none;">
            <?php 
            $comand = DB::select('select * from comand where user_id = ? and (status = 1)', [Auth::user()->id]);
  
           if(isset($comand[0]->COMAND_ID)){    
             
       echo '     <div>
                <h2>Unprocesed orders</h2>
          
    <table class="table"  width="100%">
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
                    echo '<td>
                      <form method="POST" action="/sendorder">';
            echo csrf_field();
            echo '
                        <input type="text" hidden value="'.$com->COMAND_ID.'" name="id">
                        <input type="submit" class="btn btn-primary" value="Send">
                        </form>
                      </td>';
                    echo '<td>'.$com->TOTAL.'</td>
                    </tr>';
                  }
                  
  
  
                echo '</table></div>';}
  ?>



<?php 
$comand = DB::select('select * from comand where user_id = ? and (status = 2)', [Auth::user()->id]);

if(isset($comand[0]->COMAND_ID)){    
 
echo '     <div>
    <h2>Order On The Road</h2>

<table class="table"  width="100%">
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
        echo '<td>
          <form method="POST" action="/finishorder">';
            echo csrf_field();
            echo '<input type="text" hidden value="'.$com->COMAND_ID.'"  name="id">
            <input type="submit" class="btn btn-primary" value="Order Arrived">
            </form>
          </td>';
        echo '<td>'.$com->TOTAL.'</td>
        </tr>';
      }
      


    echo '</table></div>';}
?>

<?php 
$comand = DB::select('select * from comand where user_id = ? and (status = 3 or status = 4)', [Auth::user()->id]);

if(isset($comand[0]->COMAND_ID)){    
 
echo '     <div>
    <h2>History</h2>

<table class="table"  width="100%">
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
        echo '<td>'.$com->TOTAL.'</td>
        </tr>';
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
