<!DOCTYPE html>
<html lang="en">
<?
include("database.php");

?>
<?include_once("./phpParts/head.php");

$orderId = $_GET['trackingId'];
$query = "SELECT *  FROM ordMgmt_orders WHERE orderId='$orderId'";
$result = $con->query($query);


$arr_link=array();
$arr_quantity=array();
$arr_size=array();
$arr_color=array();
$arr_price=array();

$itemDetails = "";
$totalItemsCost = 0;
$shippingCost = 0;
$conversion_rate =  $_COOKIE["conversion_rate"]; //202.63;

if($conversion_rate=='' || $conversion_rate==0){
    $conversion_rate = 202.585038;
}

$query_calculate = "SELECT *  FROM ordMgmt_orders WHERE orderId='$orderId'";
$result_calculate = $con->query($query_calculate);
if ($result_calculate->num_rows > 0){
    while($row = $result_calculate->fetch_assoc()) 
    { 
        $totalIndi = $row['priceGBP']* $row['quantity'];
        $totalItemsCost = $totalItemsCost + $totalIndi;
        
        $shippingCost = $shippingCost + (($row['perproduct'])*$row['quantity']);
        
        $itemDetails = $itemDetails .$row['brand']." - " .$row['productLink']." (".$row['quantity'].") - Size: ".$row['size'].", Color: ".$row['color']." - Price of 1 (GBP) = ".$row['priceGBP']."<br>";
        /**
        array_push($arr_link,$row['productLink']);
        array_push($arr_quantity,$row['quantity']);
        array_push($arr_size,$row['size']);
        array_push($arr_color,$row['color']);
        array_push($arr_price,$row['price']);
        **/

    }
}

$totalItemsCost = round($totalItemsCost*$conversion_rate, 1);
$shippingCost = round($shippingCost,1);
$serviceCharges = round(($totalItemsCost+$shippingCost)*.20,1);
$total = $totalItemsCost+$serviceCharges+$shippingCost;
$totalPKR = round($total,1);



if(isset($_POST["name"])&&isset($_POST["number"])&&isset($_POST["email"])){
    $name = $_POST["name"];
    $phone = $_POST["number"];
    $customerEmail = $_POST["email"];
    $company = $_POST["company"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    
    $message = $_SESSION['message'];
    
    date_default_timezone_set("Asia/Karachi");
    $timeAdded = time();
    $sql="INSERT INTO `ordMgmt_ordersCheckedOut`(`id`,`trackingId`, `buyingCost`, `shipping`, `serviceCharges`,
    `totalGBP`, `totalPKR`, `conversion`, `timeAdded`, `name`, `company`, `phone`, `email`, `address`, `message`, `dob`) VALUES
    ('1','$orderId','$totalItemsCost','$shippingCost','$serviceCharges','$total','$totalPKR',
    '$conversion_rate','$timeAdded','$name','$company','$phone','$customerEmail','$address', '$message', '$dob')";

    if(!mysqli_query($con,$sql))
    {
    echo"<br><h1 style='text-align:center;color:red;'>Error Occurred.</h1>";
    }else{
        //
        
       $emailContent_customer= "Dear Customer,
<br>
Thanks for ordering at importLines.com  This is to confirm that we have received and processed your order to be purchased! 
<br>
Rules to remember:
<br>
<ul>
  <li>Delivery batch details are already mentioned on the Booking Form.</li>
  <li>In case, you need to change the order. Please reply to this email within 15 mins of placing the order</li>
  <li>If there's an item(s) out of stock from your order, we will proceed with purchasing rest of the items</li>
  <li> If you're travelling around delivery batch dates, then please ensure that someone at your address knows about the delivery. We cannot have courier company hold parcels for too long.</li>
</ul>
<br>
Simply, reply to this email for any tracking related queries later.
<br>
<hr>
Your order details:<br>
OrderId: ".$orderId."<br>
Total (PKR): ".$totalPKR."<br>
Your Cart:<br>".$itemDetails."<br>
Message: <br>".$message."<br>"
;

$emailContent_admin = "
A new order has been placed.<br>
Name: ".$name."<br>
Phone: ".$phone."<br>
Email: ".$customerEmail."<br>
Company: ".$company."<br>
Address: ".$address."<br>

<hr>
Your order details:<br>
OrderId: ".$orderId."<br>
Total (PKR): ".$totalPKR."<br>
Cart:<br>".$itemDetails."<br>
Message: <br>".$message."<br>
";
        

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


  // Get raw posted data
  //send email
  error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

    set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/php" . PATH_SEPARATOR . get_include_path());
    require_once "Mail.php";

    $host = "mail.importlines.com";
    $username = "orders@importlines.com";
    $password = "importLines123$";
    $port = "587";
    
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    
    //email admin
    $to = "orders@importlines.com";
    $email_from = "Orders - Import Lines<orders@importlines.com>";
    $email_address = "orders@importlines.com";
    $headers = array (
        'MIME-Version'=> ' 1.0',
        'Content-type'=> 'text/html;charset=iso-8859-1' ,
        'From' => $email_from,
        'To' => $to, 'Subject' => "New Order Placed - OrderID: ".$orderId, 
        'Reply-To' => $email_address
        );
    $email_body = $emailContent_admin;
    $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => false, 'username' => $username, 'password' => $password));
    $mail = $smtp->send($to, $headers, $email_body);
    if (PEAR::isError($mail)) {
    echo("<p>" . $mail->getMessage() . "</p>");
    } else {
    //echo("<p>Message successfully sent!</p>");
    }
    
    
    //email customer
    $to =$customerEmail;
    $email_from = "Orders - Import Lines<orders@importlines.com>";
    $email_address = "orders@importlines.com";
    $headers = array (
        'MIME-Version'=> ' 1.0',
        'Content-type'=> 'text/html;charset=iso-8859-1' ,
        'From' => $email_from,
        'To' => $to, 'Subject' => "New Order Placed - OrderID: ".$orderId, 
        'Reply-To' => $email_address
        );
    $email_body = $emailContent_customer;
    $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => false, 'username' => $username, 'password' => $password));
    $mail = $smtp->send($to, $headers, $email_body);
    if (PEAR::isError($mail)) {
    echo("<p>" . $mail->getMessage() . "</p>");
    } else {
    //echo("<p>Message successfully sent!</p>");
    }
        
        ?>
        <script type="text/javascript">
            window.location = "./orderSuccess.php";
        </script>
        <?
    }
    
    
}




?>

    <body>
        <!--================Header Menu Area =================-->
        <?include_once("./phpParts/navBar.php");?>
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Checkout Area =================-->
        <section class="checkout_area section_gap">
            <form class="container" action="" method="post">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            
                            
                            
                            <h3>Products List</h3>
                            
                            <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">Brand</th>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                  
                <?
                if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) 
                { 
                ?>
                    <tr>
                        <td>
                    <h5><?echo $row['brand']?></h5>
                  </td>
                  <td>
                      <h5>  <?echo $row['productLink']?></h5>
                    
                  </td>
                  <td>
                    <h5> <span>&#163; </span>  <?echo $row['priceGBP']?></h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <input type="text" name="qty" id="sst" maxlength="12" value="<?echo $row['quantity']?>" title="Quantity:" class="input-text qty" readonly>
                    </div>
                  </td>
                  <td>
                      <?
                        $totalIndi = $row['priceGBP']* $row['quantity'];
                      ?>
                    <h5> <span>&#163; </span>  <?echo $totalIndi?></h5>
                  </td>
                </tr>
                <?
                    }
                }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
                            
                            
                            
                            <h3>Billing Details</h3>
                            <div class="row contact_form" >
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="first" name="name" required placeholder="Name"/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="number" name="number" placeholder="Phone number" required/>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required/>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" id="add1" name="address" placeholder="Address" />
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth" />
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Total Breakup</h2>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Buying Cost
                      <span>Rs. <?echo $totalItemsCost;?></span>
                    </a>
                                    </li>
                                    <li>
                                        <a href="#">UK to PK Shipping
                      <span>Rs. <?echo $shippingCost;?></span>
                    </a>
                                    </li>
                                    <li>
                                        <a href="#">20% Service Charges
                      <span>Rs. <?echo $serviceCharges;?></span>
                    </a>
                                    </li>

                                     <li style="background-color:#555;color:white;padding:5px 10px 5px 10px;; border-radius:5px;">
                                        <div style="color:white">Total
                      <span style="color:white; right:1px; float:right;">Rs. <?echo $totalPKR;?></span>
                    </div>
                                    </li>
                                    
                                </ul>
                                <!--
                                <div class="creat_account">
                                    <label for="f-option4">Currency Conversion: 1 GBP = <?echo $conversion_rate?> PKR </label>
                                </div>
                                -->
                                <br>
                                <button class="main_btn" type="submit" style="width:100%;">Submit Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!--================End Checkout Area =================-->

        <!--================ start footer Area  =================-->
        <?include_once("./phpParts/footer.php")?>
            <!--================ End footer Area  =================-->

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/popper.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/stellar.js"></script>
            <script src="vendors/lightbox/simpleLightbox.min.js"></script>
            <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
            <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
            <script src="vendors/isotope/isotope-min.js"></script>
            <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/jquery.ajaxchimp.min.js"></script>
            <script src="js/mail-script.js"></script>
            <script src="vendors/jquery-ui/jquery-ui.js"></script>
            <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
            <script src="vendors/counter-up/jquery.counterup.js"></script>
            <script src="js/theme.js"></script>
    </body>

</html>