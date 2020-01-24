<?$filenameLink = basename($_SERVER['PHP_SELF']);?>
<header class="header_area"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          
          <a href="./" class="navbar-brand logo_h">
              <img src="img/logo2.png" alt="" height="45">
              Import Lines
            </a>
            
            <!--
            
            <a class="navbar-brand logo_h" href="./">
            <b style="color:white; background-color:black; padding:10px;border-radius:5px;">Import Lines</b>
          </a>
          
            -->
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                    <li class="nav-item">
                      <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./whyUs.php">Why us?</a>
                    </li>
                    <!--
                    <li class="nav-item">
                      <a class="nav-link" href="./faqs.php">FAQs</a>
                    </li>
                    -->
                    <li class="nav-item">
                      <a class="nav-link" href="./contactUs.php">Contact</a>
                    </li>
                    
                  </ul>
              </div>

             <?if($filenameLink!='checkout.php'){?>
              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                    
                    <a class="main_btn" href="#placeOrder" style="margin-top:11px;">Place Order</a>
                      
                    <!--
                  
                  <a href="#" class="icons">
                        <i class="ti-search" aria-hidden="true"></i>
                      </a>
                  -->
                </ul>
              </div>
              <?}?>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>