<?php
use Models\Common;
$categoriesList = Common::categories();
?>
<div class="post-project">
    <h3>Création de la mission</h3>
    <div class="post-project-fields">
        <form class="form" id="common-form-create-post" action="/create-post" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="message-create-post"></div>
                </div>
                <div class="col-lg-12">
                    <label for="" class="mb-2">Intitulé de la mission (<span class="text-danger">*</span>)</label>
                    <input type="text" name="title" class="require">
                </div>
                <div class="col-lg-12">
                    <label for="" class="mb-2">Image mis en avant</label>
                    <input type="file" name="background" accept="image/png, image/gif, image/jpeg, image/svg" >
                </div>
                <div class="col-lg-12">
                    <label for="" class="mb-2">Décrivez en quoi consiste la mission (<span class="text-danger">*</span>)</label>
                    <textarea name="description" id="" rows="15" class="require"></textarea>
                </div>
                <div class="col-lg-12 mb-2">
                    <h4 class="text-bold mb-2">Catégories : </h4>
                    <?php foreach($categoriesList as $item){ ?>
                        <label for="cat-<?=$item['id']?>" class="p-2"><?=$item['name']?> 
                            <input type="checkbox" id="cat-<?=$item['id']?>" class="" name="id_cat[]" value="<?=$item['id']?>">
                        </label>
                    <?php } ?>
                </div>
                <div class="col-lg-6">
                    <div class="price-br">
                        <label for="" class="mb-2">Date de début (<span class="text-danger">*</span>)</label>
                        <input type="date" name="start_date" class="require" placeholder="Date de début">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="price-br">
                        <label for="" class="mb-2">Date de fin (<span class="text-danger">*</span>)</label>
                        <input type="date" name="end_date" class="require" placeholder="Date de fin">
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul>
                        <li>
                            <input type="hidden" name="id_user" value="<?=$me['info']['id']?>">
                            <button class="form-button active" rel="create-post" type="submit" value="post">Publier</button>
                        </li>
                        <li><a href="#" title="">Annuler</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </div><!--post-project-fields end-->
    <a href="#" title=""><i class="la la-times-circle-o"></i></a>
</div><!--post-project end-->