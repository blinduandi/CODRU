<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Acasa</title>

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
    <link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}" />
    

    <style>



    </style>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 5000
            })
        });
    </script>

</head>


<body class="antialiased" style="font-family:Futura-Pt Light;">
  



    <div class="searchh">
        <i class="fal fa-search"></i>
    </div>

    <div class="container-fluid p-3 mt-0 search_bar">

        <a href="/"><img class="logo" src="{{ url('/img/logo2.0.png') }}"></a>

        <form action="/products/t" method="GET" style="display: inline;">
            @csrf
            <input type="text" name="search" placeholder="Cautare" class="search">
        </form>
        <div class="btnn">
            <a href="{{ url('/cos') }}" style=" color:white; font-size:1.5rem; margin-left:3%" class="btn"> <span style="margin-right: 3px;">
                <?php
                if(Auth::user()!=NULL){
                   $cart=NULL;
                    $comand = DB::table('comand')->where('user_id',Auth::user()->id)->where('status',0)->get();
                    foreach ($comand as $key => $value) {

                    $cart = DB::table('cart')->where('comand_id',$value->COMAND_ID)->get();
                    }
                    if($cart!=NULL)echo count($cart); 
                    else echo '0';
                }
        
                    else echo '0';
                    ?>
                
                
                
                </span> <i class="fal fa-shopping-bag"></i> </a>
            <a href="{{ url('/login') }}"  style=" color:white; font-size:1.5rem; margin-left:0.5%" class="btn"> <i
                    class="fal fa-user-circle"></i></a>
            <a href="{{ url('/favorite') }}"  style=" color:white; font-size:1.5rem; margin-left:0.5%" class="btn"> <i
                    class="fal fa-heart"></i></a>
        </div>


    </div>

    <div class="category p-2">
        <div class="btn-group dropright">

            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
            <a href="/products" class="cat-btn btn btn-dark" style="margin-left: 15%;">Toate</a>
            <a href="/products/r" class="cat-btn btn btn-dark">Reduceri</a>
   <div class="dropdown-menu">

                <?php
                 $prod = '/products'; 
                  $categories = DB::table('category')->get();
                   
        foreach ($categories as $category)
        {
            
              echo'  <a href="/products/{'.$category->CATEGORY_ID.'}" class="dropdown-item" href="#"><b>'.$category->NAME.'</b></a>';
              $undercategories = DB::table('undercategory')->where('category_id',$category->CATEGORY_ID)->get();
                foreach ($undercategories as $undercategory) {
                    echo  '<a href="/products/under{'.$undercategory->UNDERCATEGORY_ID.'}"   class="dropdown-item" href="#">'.$undercategory->NAME.'</a>';
                }            

            
                echo '<div class="dropdown-divider"></div>';
        }
            
            ?>
            
        </div>
        </div>
    </div>



 
    <hr>

 <div class="container mt-5">
    <?php
    

    $url =  url()->current();
  
if (str_contains($url, 'under')) {
      $id = str_replace("{", "", $id);
  $id = str_replace("}", "", $id);
  $id = str_replace("under", "", $id);
    $products = DB::table('products')->where('undercategory_id',$id)->get();

}
else if(str_contains($url, 's/r')){
$products = DB::select('select * from products where sale != 0 or sale !=null');
    
}
else if(str_contains($url, 's/t')){
  
$data = $_GET['search'];

$products = DB::select('select * from products where name  like "%'.$data.'%" or description like "%'.$data.'%"');
    
}
else if(str_contains($url, 's/')){
   
  $id = str_replace("{", "", $id);
  $id = str_replace("}", "", $id);


$products = DB::table('products')->where('category_id',$id)->get();
 
}

else {
  $products = DB::table('products')->get(); 
}

$asd='';

$k=1;

foreach($products as $product){
       if($k==1) {echo '<div class="row">';}
           
            
            
                $image = DB::select('select * from image where PRODUCTS_ID=? LIMIT 1', [$product->PRODUCTS_ID]);
                foreach ($image as $img) {
                    $asd=$img->ADRESS;
                }

               
                

                echo '<div class="card m-5 col-3" >
                <img class="card-img-top" src="'.'http://127.0.0.1:8000/public/produse/'.$asd.'" style="  max-width: 100%; height: 100%;width: auto;">
                <div class="card-body" >
                    <h5 class="card-title">'.$product->NAME.'</h5>
                    <p class="card-text"><small class="text-muted">'.$product->DESCRIPTION.'</small></p>
                    <p class="card-text"><b>'.$product->PRICE.'$</b></p>

    <a href="/prodpage/{'.$product->PRODUCTS_ID.'}" type="button" class=""btn btn-primary btn-sm mr-1 mb-2">
      <i class="fas fa-info-circle pr-2"></i>Details
    </a>
                </div>
            </div>';

                

                if($k==3) {
                    echo '</div>';
                    echo '<br>';
                $k=0;
                }
$k++;
            }           
            ?>
           
 </div>
    </div>
    <div class="container-fluid bg-dark p-5 mt-5 text-justify" style="text-decoration: none; color:white;font-size:25px;">
        <center><a href="tel:+37378235087" ><i class="fas fa-phone"></i>+37378235087</a><br>
        <a href="mailto:andi.blindu04@gmail.com" ><i class="fal fa-envelope-open"></i>andi.blindu04@gmail.com</a><br>
        <a href="https://github.com/blinduandi" ><i class="fab fa-github"></i>blinduandi</a><br></center>
      </div>
      
</body>

</html>
