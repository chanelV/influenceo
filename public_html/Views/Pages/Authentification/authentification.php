<?php   
    require_once APP_ROOT . '/Views/Include/Layout/authentification/header.php';
?>

<div class="sign-in-page">
  <div class="signin-popup">
    <div class="signin-pop">
      <div class="row">
        <div class="col-lg-6">
          <div class="cmp-info">
            <div class="cm-logo">
              <img src="public/images/cm-logo.png" alt="influenceo">
              <p>Influenceo, est une plateforme indépendante, de réseautage social 
                où les influenceurs trouvent des missions auprès de grandes marques dans le monde 
              </p>
            </div><!--cm-logo end-->	
            <img src="public/images/cm-main-img.png" alt="">			
          </div><!--cmp-info  desciption end-->
        </div>

        <div class="col-lg-6">
          <div class="login-sec">
            <ul class="sign-control">
              <li data-tab="tab-1" class="current"><a href="#" title="">S'identifier</a></li>				
              <li data-tab="tab-2"><a href="#" title="">S'inscrire</a></li>		
            </ul>			
            <!-- Forms enregistrement Debut -->
            <div class="sign_in_sec current" id="tab-1">
              <?php   
                  require_once APP_ROOT . '/Views/Pages/Authentification/components/login.php';
              ?>
             
            </div><!--sign_in_sec end-->

 <!-- ----------------------Forms s'identifier end--------------------->
            <!--S'inscrire -->	 
            <div class="sign_in_sec" id="tab-2">
              <div class="signup-tab">
                <i class="fa fa-long-arrow-left"></i>
                <h2>johndoe@example.com</h2>
                <ul>
                  <li data-tab="tab-3" class="current"><a href="#" title="">influenceurs</a></li>
                  <li data-tab="tab-4"><a href="#" title="">Marques</a></li>
                </ul>
              </div><!--signup-tab end-->	
              <div class="dff-tab current" id="tab-3">
                <?php   
                    require_once APP_ROOT . '/Views/Pages/Authentification/components/register_user.php';
                ?>
              </div><!--dff-tab end-->
 <!-- ----------------------Forms s'inscrire end infleuenceurs--------------------->

              <div class="dff-tab" id="tab-4">
                <?php   
                    require_once APP_ROOT . '/Views/Pages/Authentification/components/register_brand.php';
                ?>
              </div><!--dff-tab end-->
               <!-- ----------------------Forms s'inscrire end marques--------------------->
            </div>		
          </div><!--login-sec end-->
        </div>
      </div>		
    </div><!--signin-pop end-->
  </div><!--signin-popup end-->
  <div class="footy-sec">
    <div class="container">
      <ul>
        <li><a href="#" title="">Help Center</a></li>
        <li><a href="#" title="">Privacy Policy</a></li>
        <li><a href="#" title="">Community Guidelines</a></li>
        <li><a href="#" title="">Cookies Policy</a></li>
        <li><a href="#" title="">Career</a></li>
        <li><a href="#" title="">Forum</a></li>
        <li><a href="#" title="">Language</a></li>
        <li><a href="#" title="">Copyright Policy</a></li>
      </ul>
      <p><img src="public/images/copy-icon.png" alt="">Copyright 2022</p>
    </div>
  </div><!--footy-sec end-->
</div><!--sign-in-page end-->
<?php require_once APP_ROOT . '/Views/Include/Layout/authentification/footer.php'; ?>

