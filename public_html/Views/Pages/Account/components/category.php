<?php
 $catsId = [];
 for ($i=0; $i < count($me["categories"]); $i++) { 
    $catsId[] = $me["categories"][$i]["id_cat"];
 }
 
?>
<div class="acc-setting">
    <h3>Catégories</h3>
    <form class="form" id="common-form-update-categories" action="/update-categories" method="POST">
        <div class="d-flex flex-wrap">
            <div class="col-lg-12 mt-1">
                <div class="message-update-categories"></div>
            </div>
            <?php foreach($data['categoriesList'] as $item){ ?>
                <div class="form-group p-4">
                    <label for="cat-<?=$item['id']?>"><?=$item['name']?></label>
                    <input type="checkbox" id="cat-<?=$item['id']?>" class="ml-1" <?php if(in_array($item['id'], $catsId)){echo "checked='checked'";} ?> name="id_cat[]" value="<?=$item['id']?>">
                </div>
            <?php } ?>
           
        </div>
        <div class="save-stngs pd2">
            <ul>
                <li>
                    <input type="hidden" name="id_user" value="<?=$me['info']['id']?>">
                    <button type="submit" class="form-button" rel="update-categories">Enregistrer</button>
                </li>
            </ul>
        </div><!--save-stngs end-->
    </form>
</div><!--acc-setting end-->