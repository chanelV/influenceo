<?php
 $socialsId = [];
 for ($i=0; $i < count($me["social_network"]); $i++) { 
    $socialsId[] = $me["social_network"][$i]["id_social"];
 }
 
?>
<div class="acc-setting">
    <h3>Réseaux Sociaux</h3>
    <form class="form" id="common-form-update-socials-networks" action="/update-socials-networks" method="POST">
        <div class="d-flex flex-wrap">
            <div class="col-lg-12 mt-1">
                <div class="message-update-socials-networks"></div>
            </div>
            <?php foreach($data['social_networkList'] as $item){ ?>
                <div class="form-group p-4">
                    <label for="social-<?=$item['id']?>"><?=$item['name']?></label>
                    <input type="checkbox" id="social-<?=$item['id']?>" class="ml-1" <?php if(in_array($item['id'], $socialsId)){echo "checked='checked'";} ?> name="id_social[]" value="<?=$item['id']?>">
                </div>
            <?php } ?>
           
        </div>
        <div class="save-stngs pd2">
            <ul>
                <li>
                    <input type="hidden" name="id_user" value="<?=$me['info']['id']?>">
                    <button type="submit" class="form-button" rel="update-socials-networks">Enregistrer</button>
                </li>
            </ul>
        </div><!--save-stngs end-->
    </form>
</div><!--acc-setting end-->