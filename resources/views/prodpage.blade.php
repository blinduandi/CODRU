<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="{{ URL::asset('css/product.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/welcome.css') }}" />

</head>
<body>
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

   


          <div class="container">
            <div class="row">
              <div class="col-sm">
           <?php
                 $id = str_replace("{", "", $id);
                 $id = str_replace("}", "", $id);

            $images = DB::select('select `ADRESS` from image where PRODUCTS_ID = ?', [$id]);
                 foreach ($images as $key => $img) {
                     echo   '<img class="card-img-top mt-5" src="'.'http://127.0.0.1:8000/public/produse/'.$img->ADRESS.'" style=" width:auto; height:400px;">';
                 }
            ?>
                
               

              </div>
              <div class="col-sm">



                <?php
            
            $product = DB::table('products')->where('PRODUCTS_ID',$id)->get();

               echo' <h1 >                  
                        '.$product[0]->NAME.'
                </h1>
                <p>
                    '.$product[0]->DESCRIPTION.'
                </p>
                
                <div class="m-bot15"> <strong>Price : </strong> <span class="pro-price"> $'.$product[0]->PRICE.'</span></div>
                <div class="form-group">';
                    
                    echo  '<form method="POST" action="/addcos">
                       '.csrf_field().'
                    <label>Quantity</label>
                    <input type="number" placeholder="1" class="form-control" min="1" name="quant" required>
                    <input type="text" name="idd" value="'.$id.'" hidden>
                    <input type="text" name="price" value="'.$product[0]->PRICE.'" hidden>
                     <button  class="btn btn-round btn-danger mt-5" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                     </form>
                </div>
                <p>
                   
                </p> ';
                
                
                ?>
              </div>
            </div>
          </div>

          <div class="container-fluid bg-dark p-5 mt-5 text-justify" style="text-decoration: none; color:white;font-size:25px; position: relative; botom:0;">
            <center><a href="tel:+37378235087" ><i class="fas fa-phone"></i>+37378235087</a><br>
            <a href="mailto:andi.blindu04@gmail.com" ><i class="fal fa-envelope-open"></i>andi.blindu04@gmail.com</a><br>
            <a href="https://github.com/blinduandi" ><i class="fab fa-github"></i>blinduandi</a><br></center>
          </div>

</body>
</html>