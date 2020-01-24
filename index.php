<!DOCTYPE html>
<html lang="en">

<?include_once("./phpParts/head.php")?>
    <?php
if(isset($_POST['submit_row']))
{
 include_once("database.php");
 $link=$_POST['link'];
 $quantity=$_POST['quantity'];
 $size=$_POST['color'];
 $price=$_POST['price'];
 $brand=$_POST['brand'];
 $message=$_POST['message'];
 $perproduct=$_POST['perproduct'];

 //echo print_r($perproduct);
 ?>
        <script>
            //console.log('<?echo ($perproduct)?>')
        </script>
        <?
 //echo $message;
 $_SESSION['message'] = $message;

 function generateRandomString($length = 6) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }

 $orderId = generateRandomString();
 for($i=0;$i<count($link);$i++)
 {

  if($link[$i]!="" && $quantity[$i]!="" && $price[$i]!="")
  {

   $sql = "INSERT INTO `ordMgmt_orders`(`orderId`, `productLink`, `quantity`, `size`, `color`, `priceGBP`, `brand`, `perproduct`) 
            VALUES ('$orderId','$link[$i]','$quantity[$i]','$size[$i]','$color[$i]','$price[$i]','$brand[$i]', '$perproduct[$i]')";  

      if(!mysqli_query($con,$sql))
        {
        echo"can not";
        }

  }
 }
 //move to checkout
 ?>

            <script type="text/javascript">
                window.location = "./checkout.php?trackingId=<?echo $orderId?>";
            </script>
            <?
}
?>
                <script>
                    var conversion_rate = 202.63;
                </script>

                <body>
                    <!--================Header Menu Area =================-->
                    <?include("./phpParts/navBar.php")?>
                        <!--================Header Menu Area =================-->

                        <!--================Home Banner Area =================-->
                        <section class="home_banner_area mb-40">
                            <div class="banner_inner d-flex align-items-center">
                                <div class="container">
                                    <div class="banner_content row">
                                        <div class="col-lg-12">
                                            <p class="sub text-uppercase">We bring the world closer to you.</p>
                                            <h3><span style="color:black; background-color:white; padding:0px;border-radius:5px;">Original Brands</span> at 
            <br />your <span style="color:black; background-color:white; padding:0px;border-radius:5px;">Door Steps</span></h3>
                                            <a class="main_btn mt-40" href="#placeOrder">Place Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!--================End Home Banner Area =================-->

                        <!-- Start feature Area -->
                        <!--
  <section class="feature-area section_gap_bottom_custom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-3" style="width:25%;">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-money"></i>
              <h3>Cheap Services</h3>
            </a>
            <p>Our service charges are unbelievably low</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-3" style="width:25%;">
          <div class="single-feature">
            <a href="#" class="title">
              <i class="flaticon-truck"></i>
              <h3>On-time Delivery</h3>
            </a>
            <p>Our delivery is always on time</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-3">
          <div class="single-feature" style="width:25%;">
            <a href="#" class="title">
              <i class="flaticon-support"></i>
              <h3>On-call Support</h3>
            </a>
            <p>We are always here to listen to you</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-3">
          <div class="single-feature" style="width:25%;">
            <a href="#" class="title">
              <i class="flaticon-blockchain"></i>
              <h3>Safe Delivery</h3>
            </a>
            <p>We treat you packages with great care</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  -->
                        <!-- End feature Area -->

                        <!--================ Feature Product Area =================-->

                        <section class="feature-area section_gap_bottom_custom">
                            <div class="container">
                                <div class="col-lg-12">
                                    <div class="main_title">
                                        <h2><span>Brands that we order</span></h2>
                                    </div>
                                </div>
                                <div class="row" style="justify-content: center;">
                                    <div class="col-lg-2 col-md-6 col-sm-3" style="width:25%;margin:5px;">
                                        <div style="width:25%;">
                                            <a class=" " href="https://www.zara.com/uk" target="_blank" tabindex="0">
                                                <img src="https://importfox.com/wp-content/uploads/AmazonServices/1557404002.jpg" alt="ZARA" width="100">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-3" style="width:25%;margin:5px;">
                                        <div style="width:25%;">
                                            <a class=" " href="https://www.marksandspencer.com/" target="_blank" tabindex="0"><img src="https://importfox.com/wp-content/uploads/AmazonServices/1557488890.jpg" alt="M&amp;S" width="100"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-3" style="width:25%;margin:5px;">
                                        <div style="width:25%;">
                                            <a class=" " href="https://www.next.co.uk" target="_blank" tabindex="-1"><img src="https://importfox.com/wp-content/uploads/AmazonServices/1557404774.jpg" alt="NEXT" width="100"></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-3" style="width:25%;margin:5px;">
                                        <div style="width:25%;">
                                            <a class=" " href="https://www.tkmaxx.com/" target="_blank" tabindex="-1"><img src="https://importfox.com/wp-content/uploads/AmazonServices/1557404843.jpg" alt="TkMaxx" width="100"></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                        <section class="feature_product_area section_gap_bottom_custom" id="placeOrder">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="main_title">
                                            <h2><span>Place Order</span></h2>
                                            <p>Importing something to Pakistan has never been easier.</p>
                                        </div>
                                    </div>
                                </div>

                                <form method="post" action="">
                                    <div>

                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div id="employee_table" align=center>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-2">
                                                            <div class="form-group">
                                                                <select class="form-control" name="brand[]" id="link" type="text" placeholder="Brand" style='width: 100%'>
                                                                    <option value="ZARA">ZARA</option>
                                                                    <option value="NEXT">NEXT</option>
                                                                    <option value="Marks And Spencer">Marks And Spencer</option>
                                                                    <option value="TKMAXX">TKMAXX</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 col-md-5 col-lg-4">
                                                            <div class="form-group">
                                                                <select class="form-control perproduct" name="perproduct[]" id="perproduct" type="text" placeholder="Brand" style='width: 100%' onchange="calculatePrice()">

                                                                    <option value="299">Rs299each Shirt/Trouser</option>
                                                                    <option value="999">Rs999each Shoes/Slippers</option>
                                                                    <option value="999">Rs999each Light Jacket/Coats</option>
                                                                    <option value="1499">Rs1499each Heavy Jacket/Coats</option>
                                                                    <option value="999">Rs999each Handbag</option>
                                                                    <option value="999">Rs999each Watch/Sunglasses</option>
                                                                    <option value="999">Rs999each Small Electronics</option>
                                                                    <option value="999">Rs999each Books</option>
                                                                    <option value="299">Rs299each Accessories/Misc. items</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input class="form-control" name="link[]" id="link" type="text" placeholder="Paste product link...">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <input class="form-control quantity" name="quantity[]" id="quantity" type="number" placeholder="Quantity" onkeyup="calculatePrice();">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <input class="form-control" name="size[]" id="size" type="text" placeholder="Size">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <input class="form-control" name="color[]" id="color" type="text" placeholder="Color">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-11 col-lg-3">
                                                            <div class="form-group">
                                                                <input class="form-control price" name="price[]" id="price" type="text" placeholder="Price of 1 (in GBP)" onkeyup="calculatePrice();">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-lg-1">
                                                            <div class="form-group" style="background-color:#c4c4c4;height: 70%;border-radius: 5px;color:white;" onclick="delete_row();">
                                                                X
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Any comments, product code... (Optional)"></textarea>
                                                </div>

                                            </div>

                                            <div class="col-lg-4">
                                                <div class="order_box">
                                                    <h2>Total Breakup</h2>
                                                    <ul class="list list_2">
                                                        <li>
                                                            <a href="#">Buying Cost
                      <span>Rs. <span id="totalItemsCost">0</span></span>
                    </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">UK to PK Shipping
                      <span>Rs. <span id="shippingCost">0</span></span>
                    </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">20% Service Charges
                      <span>Rs. <span id="serviceCharges">0</span></span>
                    </a>
                                                        </li>

                                                        <li style="background-color:#555;color:white;padding:5px 10px 5px 10px;; border-radius:5px;">
                                                            <div style="color:white">Total
                                                                <span style="color:white; right:1px; float:right;">Rs. <span id="totalPKR">0</span></span>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                    <!--
                                                <div class="creat_account">
                                                    <label for="f-option4">Currency Conversion: 1 GBP = <span id="conversion_rate">0</span> PKR </label>
                                                </div>
                                                -->
                                                    <br>
                                                    <input type="submit" name="submit_row" style="width:100%;" value="Checkout" class="main_btn">
                                                    <!--
                                                <button class="main_btn" type="submit" ></button>
                                                -->
                                                </div>

                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                    <input type="button" onclick="add_row();" value="Add More" class="main_btn">
                                </form>

                            </div>
                            </div>
                            </div>
                        </section>

                        <!--================ End Feature Product Area =================-->

                        <!--================ End Blog Area =================-->

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
                            <!--
                        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
                        -->
                            <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
                            <script src="vendors/isotope/isotope-min.js"></script>
                            <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
                            <script src="js/jquery.ajaxchimp.min.js"></script>
                            <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
                            <script src="vendors/counter-up/jquery.counterup.js"></script>
                            <script src="js/mail-script.js"></script>
                            <script src="js/theme.js"></script>

                            <script type="text/javascript">
                                function add_row() {
                                    $rowno = $("#employee_table tr").length;
                                    $rowno = $rowno + 1;

                                    $("#employee_table").append('<div class="row" id="row_'+$rowno+'"><div class="col-sm-6 col-md-6 col-lg-2"><div class="form-group"><select class="form-control" name="brand[]" id="link" type="text" placeholder="Brand" style="width: 100%"><option value="ZARA">ZARA</option><option value="NEXT">NEXT</option><option value="Marks And Spencer">Marks And Spencer</option><option value="TKMAXX">TKMAXX</option></select></div></div><div class="col-sm-6 col-md-5 col-lg-4"><div class="form-group"><select class="form-control perproduct" name="perproduct[]" id="perproduct" type="text" placeholder="Brand" style="width: 100%" onchange="calculatePrice()"><option value="299">Rs299each Shirt/Trouser</option><option value="999">Rs999each Shoes/Slippers</option><option value="999">Rs999each Light Jacket/Coats</option><option value="1499">Rs1499each Heavy Jacket/Coats</option><option value="999">Rs999each Handbag</option><option value="999">Rs999each Watch/Sunglasses</option><option value="999">Rs999each Small Electronics</option><option value="999">Rs999each Books</option><option value="299">Rs299each Accessories/Misc. items</option></select></div></div><div class="col-lg-6"><div class="form-group"><input class="form-control" name="link[]" id="link" type="text" placeholder="Paste product link..."></div></div><div class="col-lg-3"><div class="form-group"><input class="form-control quantity" name="quantity[]" id="quantity" type="number" placeholder="Quantity" onkeyup="calculatePrice();"></div></div><div class="col-lg-2"><div class="form-group"><input class="form-control" name="size[]" id="size" type="text" placeholder="Size"></div></div><div class="col-lg-3"><div class="form-group"><input class="form-control" name="color[]" id="color" type="text" placeholder="Color"></div></div><div class="col-sm-11 col-lg-3"><div class="form-group"><input class="form-control price" name="price[]" id="price" type="text" placeholder="Price of 1 (in GBP)" onkeyup="calculatePrice();"></div></div><div class="col-sm-12 col-lg-1"><div class="form-group" style="background-color:red;height: 70%;border-radius: 5px;color:white;" onclick="delete_row(`row_'+$rowno+'`);">X</div></div></div><hr>');
                                    //     $("#employee_table").append('<div class="row"><div class="col-sm-12"><div class="form-group"><input class="form-control" name="link[]" id="link" type="text" placeholder="Paste product link..."></div></div><div class="col-sm-2"><div class="form-group"><input class="form-control" name="quantity[]" id="quantity" type="number" placeholder="Quantity"></div></div><div class="col-sm-2"><div class="form-group"><input class="form-control" name="size[]" id="size" type="text" placeholder="Size"></div></div><div class="col-sm-3"><div class="form-group"><input class="form-control" name="color[]" id="color" type="text" placeholder="Color"></div></div><div class="col-sm-4"><div class="form-group"><input class="form-control" name="price[]" id="price" type="text" placeholder="Price of 1 (in GBP)"></div></div><div class="col-sm-1"><div><button class="main_btn form-group" style="margin:5px;background-color:red;">a</button></div></div></div><hr>');

                                    /**
                                         $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='name[]' placeholder='Enter Name'></td><td><input type='text' name='age[]' placeholder='Enter Age'></td><td><input type='text' name='job[]' placeholder='Enter Job'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
                                         **/
                                }

                                function delete_row(rowno) {
                                    console.log("delete_row")
                                    $('#' + rowno).remove();
                                }

                                function calculatePrice() {
                                    console.log("cal")
                                    var l = $('.price').length;
                                    //Initialize default array
                                    //var result = [];
                                    var totalItemsCost = 0;
                                    var shippingCost = 0
                                    for (i = 0; i < l; i++) {
                                        //Push each element to the array
                                        //result.push(parseFloat($('.price').eq(i).val()));

                                        totalItemsCost += (parseFloat($('.quantity').eq(i).val()).toFixed(1)) * (parseFloat($('.price').eq(i).val()).toFixed(1));

                                        var a = parseFloat(((parseFloat($('.perproduct').eq(i).val())).toFixed(1)) * (parseFloat($('.quantity').eq(i).val()).toFixed(1))).toFixed(1);

                                        shippingCost = parseFloat(parseFloat(shippingCost) + parseFloat(a));
                                        console.log(shippingCost, parseFloat(a))

                                        //totalItemsCost+= parseFloat(a);

                                    }
                                    shippingCost = parseFloat(shippingCost).toFixed(1)
                                    totalItemsCost = (totalItemsCost * conversion_rate).toFixed(1);
                                    //print the array or use it for your further logic
                                    //console.log(totalItemsCost);
                                    document.getElementById("totalItemsCost").innerHTML = totalItemsCost;
                                    /**
                                    var shippingCost = (totalItemsCost * .05).toFixed(1);
                                    **/
                                    document.getElementById("shippingCost").innerHTML = shippingCost;

                                    var serv_temp = (parseFloat(totalItemsCost) + parseFloat(shippingCost)).toFixed(1);

                                    var serviceCharges = (serv_temp * .20).toFixed(1);
                                    document.getElementById("serviceCharges").innerHTML = serviceCharges;

                                    var total = (parseFloat(totalItemsCost) + parseFloat(serviceCharges) + parseFloat(shippingCost)).toFixed(1);
                                    //document.getElementById("total").innerHTML = total;
                                    /**
                                    document.getElementById("conversion_rate").innerHTML = conversion_rate;
                                    **/
                                    //var totalPKR = total*conversion_rate;
                                    document.getElementById("totalPKR").innerHTML = total;

                                }
                                /**
                                document.getElementById("conversion_rate").innerHTML = conversion_rate;
                                **/

                                $this = $(this);
                                $.ajaxSetup({
                                    cache: false
                                });

                                function timeLeft() {
                                    $.ajax({
                                        type: "GET",
                                        url: "https://free.currconv.com/api/v7/convert?q=GBP_PKR&compact=ultra&apiKey=16e795bf56e035757416",
                                        dataType: "html",
                                        success: function(result) {
                                            $this.html(result);
                                            conversion_rate = $.parseJSON(result).GBP_PKR
                                            console.log(conversion_rate)

                                            createCookie("conversion_rate", conversion_rate, 30);

                                            function createCookie(name, value, days) {
                                                console.log("createCookie")
                                                var expires;
                                                if (days) {
                                                    var date = new Date();
                                                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                                                    expires = "; expires=" + date.toGMTString();
                                                } else {
                                                    expires = "";
                                                }
                                                document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
                                            }

                                            /**
                                            document.getElementById("conversion_rate").innerHTML = conversion_rate;
                                            **/
                                        }
                                    });
                                }
                                timeLeft();
                            </script>
                </body>

</html>