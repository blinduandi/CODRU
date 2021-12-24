<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use PHPMailer\PHPMailer\PHPMailer;

class Manager extends Controller
{
    function addcategory(Request $req) {
         $cat = $req->input('name');
        DB::insert('insert into category (name) values (?)', [$cat]);
        return redirect()->back();
      }
       /////
      function addundcategory(Request $req) {
        $cat = $req->input('name');
        $id = $req->input('slctcategory');
          DB::insert('insert into undercategory (NAME,CATEGORY_ID) values (?,?)', [$cat,$id]);
         return redirect()->back();
      }
      ////////////
      function addspecg(Request $req) {
         $cat = $req->input('name');
         $id = $req->input('slctundcategory');
        DB::insert('insert into specification_group (name,UNDERCATEGORY_ID) values (?,?)', [$cat,$id]);
        return redirect()->back();
      } 
      /////////////
      function addspec(Request $req) {
         $cat = $req->input('name');
         $id = $req->input('slctsg');
        DB::insert('insert into specification (name,specification_group_id) values (?,?)', [$cat,$id]);
        return redirect()->back();
      }
      ///////////////
    function delcategory(Request $req) {
         $cat = $req->input('id');
DB::delete('delete from category where category.CATEGORY_ID = ?', [$cat]);

 return redirect()->back();
      }

      function addNewProduct(Request $req){



        $prodname = $req->input('prodnam');
        $description = $req->input('proddes');
        $category = $req->input('slccat');
        $undercategory = $req->input('slcucat');
        $price = $req->input('prodprice');
        $stoc = $req->input('prodstoc');
        $sale = $req->input('prodsale');
        
       DB::insert('insert into products (name,description,category_id,undercategory_id,price,stoc_total,
       stoc_avaible,uploaded_by,uploaded_date,sale) values (?,?,?,?,?,?,?,?,?,?)', [$prodname,$description,$category,$undercategory,
       $price,$stoc,$stoc,Auth::user()->id,date('Y-m-d H:i:s'),$sale]);

       $id = array();
      $id =  DB::table('products')->orderBy('products_id','desc')->first();

        $files = $req->file('img_prod');

          if($req->hasFile('img_prod')){
            $i = 0;
            foreach ($files as $file) {
      $file = $req->file('img_prod');
      //$extension = $file->extension();
      $filename = time()+ (rand(5,50) *rand(5,50) *rand(5,50) * rand(5,50)).'.'.rand(5,50)."-".date('his')."-".rand(3,10)."."."jpeg";
      $file[$i]->move('public/produse/', $filename);
    $i++;
    
    DB::insert('insert into image (adress,type,products_id) values (?,?,?)', [$filename,0,$id->PRODUCTS_ID]);

    }

      }


      return redirect()->back();
    }


 


    function updateUser(Request $req){
      
      $data = $req->except('_token');

$k=0;
      foreach ($data as $key => $value) {

          if($k==0){
            $id=$value;
          }
          if($k==2){

            switch($value){
            case 'Seller' : {DB::table('users')->where('id', $id)->update(['TIP' => 1]);break;}
            case 'Admin' : {DB::table('users')->where('id', $id)->update(['TIP' => 111]);break;}
            case 'Client' : {DB::table('users')->where('id', $id)->update(['TIP' => 0]);break;}
            }
          }

          if($k==3 && $value == 'on'){
            DB::table('users')->where('id', $id)->update(['ACTIV' => 0]);
            $k=-1;
          }
          else if($k==3  && $value != 'on'){
            
           DB::table('users')->where('id', $id)->update(['ACTIV' => 1]); 
         


           $k=0;

          }
          $k++;
          
      }
    
      
      return redirect()->back();
    }

    function addCos(Request $req){
      $a = DB::select('select * from comand where USER_ID = ? and status=?', [Auth::user()->id,0]);
      
      if($a == Null){
       DB::insert('insert into comand (user_id) values (?)', [Auth::user()->id]);
      }
     $id_com = DB::select('select * from comand where USER_ID = ? and status=?', [Auth::user()->id,0]);

      $product = $req->input('idd');
      $quant = $req->input('quant');
      $total = $req->input('price')*$quant;

      DB::insert('insert into cart (user_id,comand_id,products_id,quantity,total) values (?,?,?,?,?)', [Auth::user()->id,$id_com[0]->COMAND_ID, $product, $quant, $total]);

    
      return redirect('/cos');
    }

    function comandaProcesing(Request $req){

      $country= $req->input('country');
      $city = $req->input('city');
      $adress = $req->input('adress');
      $zip_c = $req->input('zip_c');
      $payment = $req->input('card');
      $promo=$req->input('promo');
      $phone_n=$req->input('phone');
      $shipping_p = $req->input('shipping_p');
      $total = $req->input('total');
      $id = $req->input('id');

      DB::update('update comand set country = ? where comand_id = ?', [$country,$id]);
      DB::update('update comand set city = ? where comand_id = ?', [$city,$id]);
      DB::update('update comand set adress = ? where comand_id = ?', [$adress,$id]);
      DB::update('update comand set zip_code = ? where comand_id = ?', [$zip_c,$id]);
      DB::update('update comand set payment_type = ? where comand_id = ?', [$payment,$id]);
      DB::update('update comand set promo = ? where comand_id = ?', [$promo,$id]);
      DB::update('update comand set phone_number = ? where comand_id = ?', [$phone_n,$id]);
      DB::update('update comand set shipping_price = ? where comand_id = ?', [$shipping_p,$id]); 
      DB::update('update comand set total = ? where comand_id = ?', [$total,$id]);    
      DB::update('update comand set status = ? where comand_id = ?', [1,$id]);   

      
$com = DB::table('comand')->where('comand_id',$id)->get();
     
     $body = '<!DOCTYPE html>
     <html>
     <head>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
     </head>
     <body>
     
     
     <h1>Factura #'.$com[0]->COMAND_ID.'</h1>
      <h3>Country:'.$com[0]->COUNTRY.'</h3>
      <h3>Zip Code:'.$com[0]->CITY.'</h3>
      
      <h3>Address:'.$com[0]->ADRESS.'</h3>
      <h3>Zip Code:'.$com[0]->ZIP_CODE.'</h3>
      <h3>Payment type:'.$com[0]->PAYMENT_TYPE.'</h3>


     <center>
      
      <table class="table"  style="width:100%;">
      <th>Product</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Total</th>
     ';
    
     $cos = DB::table('cart')->where('comand_id',$com[0]->COMAND_ID)->get();
foreach($cos as $key => $cos_c){
$products= DB::table('products')->where('products_id',$cos_c->PRODUCTS_ID)->get();
      foreach($products as $key => $product){
        $body.='<tr><td>'.$product->NAME.'</td>';
        $body.='<td>'.$cos_c->QUANTITY.'</td>';
        $body.='<td>'.$product->PRICE.'</td>';
        $body.='<td>'.$cos_c->TOTAL.'</td></tr>';
      }
    }



     $body.='</table>
     <h2>Total: $'.$com[0]->TOTAL.'</h2>
     </center>
     </body>




     </html>';



     try{
       $mail = new PHPMailer(true);
       
       
       
       // require_once('D:\xamppp\htdocs\29-03-2021\PHPMailer\PHPMailer\PHPMailer\PHPMailerAutoload.php');
       
       // $mail= new PHPMailer();
       $mail->isSMTP();
       $mail->SMTPAuth = true;
       $mail->SMTPSecure = 'ssl';
       $mail->Host = 'smtp.gmail.com';
       $mail->Port = 465;
       $mail->isHTML();
       $mail->Username = 'chisinau.mda@gmail.com';
       $mail->Password = 'moldova1457'; 
       $mail->From = 'chisinau.mda@gmail.com';
       $mail->Subject = 'HelloWorld!';
       $mail->Body = $body;
       $mail->AddAddress(Auth::user()->email);
      
    
       var_dump(   $mail->Send());
    
       
       
       }
        catch (Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
       }
/////
      return redirect('/') ;
    }


    function sendOrder(Request $req){
      $id = $req->input('id');

      DB::update('update comand set status = 2 where comand_id = ?', [$id]);

      return redirect()->back();

    }
  
      function finishOrder(Request $req){
      $id = $req->input('id');

      DB::update('update comand set status = 3 where comand_id = ?', [$id]);

      return redirect()->back();

    }
  }
