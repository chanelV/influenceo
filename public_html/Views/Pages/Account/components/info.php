<div class="acc-setting">
    <h3>Informations personnelles</h3>
    <form class="form" id="common-form-update-info" action="/update-info" method="POST">
        <div class="row">
            <div class="col-lg-12 mt-1">
                <div class="message-update-info"></div>
            </div>
            <div class="col-lg-6 cp-field">
                <h5>Email (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="text" name="email" class="require" value="<?=$me['info']['email']?>">
                    <i class="fa fa-envelope"></i>
                </div>
            </div>
            <div class="col-lg-6 cp-field">
                <h5>Pseudo (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="text" name="username" class="require" value="<?=$me['info']['username']?>">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <?php if($type){ ?>
            <div class="col-lg-6 cp-field">
                <h5>Nom (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="text" name="lastname" class="require" value="<?=$me['info']['lastname']?>">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <div class="col-lg-6 cp-field">
                <h5>Prénom (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="text" name="firstname" class="require" value="<?=$me['info']['firstname']?>">
                    <i class="fa fa-user"></i>
                </div>
            </div>
            <?php } ?>
            
            <?php if(!$type){ ?>
            <div class="col-lg-12 cp-field">
                <h5>Raison sociale (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="text" name="reason_social" class="require" value="<?=$me['info']['reason_social']?>">
                    <i class="fa fa-university"></i>
                </div>
            </div>
            <?php } ?>
            <div class="col-lg-12 cp-field">
                <h5>Adresse</h5>
                <div class="cpp-fiel">
                    <input type="text" name="address" value="<?=$me['info']['address']?>">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
            
            <div class="col-lg-6 cp-field">
                <h5>Code postal (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="number" name="code_postal" class="require" value="<?=$me['info']['code_postal']?>">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
            <div class="col-lg-6 cp-field">
                <h5>Ville (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="text" name="city" class="require" value="<?=$me['info']['city']?>">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
            <div class="col-lg-12 cp-field">
                <h5>Pays (<span class="text-danger">*</span>)</h5>
                <div class="cpp-fiel">
                    <input type="text" name="country" class="require" value="<?=$me['info']['country']?>">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
        <div class="save-stngs pd2">
            <ul>
                <li>
                    <input type="hidden" name="id" value="<?=$me['info']['id']?>">
                    <button type="submit" class="form-button" rel="update-info">Enregistrer</button>
                </li>
            </ul>
        </div><!--save-stngs end-->
    </form>
</div><!--acc-setting end-->