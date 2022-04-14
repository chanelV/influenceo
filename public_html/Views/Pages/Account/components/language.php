<?php
 $langsId = [];
 for ($i=0; $i < count($me["language"]); $i++) { 
    $langsId[] = $me["language"][$i]["id_lang"];
 }
 
?>
<div class="acc-setting">
    <h3>Langues</h3>
    <form class="form" id="common-form-update-languages" action="/update-languages" method="POST">
        <div class="d-flex flex-wrap">
            <div class="col-lg-12 mt-1">
                <div class="message-update-languages"></div>
            </div>
            <?php foreach($data['languagesList'] as $item){ ?>
                <div class="form-group p-4">
                    <label for="languages-<?=$item['id']?>"><?=$item['name']?></label>
                    <input type="checkbox" id="languages-<?=$item['id']?>" class="ml-1" <?php if(in_array($item['id'], $langsId)){echo "checked='checked'";} ?> name="id_lang[]" value="<?=$item['id']?>">
                </div>
            <?php } ?>
           
        </div>
        <div class="save-stngs pd2">
            <ul>
                <li>
                    <input type="hidden" name="id_user" value="<?=$me['info']['id']?>">
                    <button type="submit" class="form-button" rel="update-languages">Enregistrer</button>
                </li>
            </ul>
        </div><!--save-stngs end-->
    </form>
</div><!--acc-setting end-->