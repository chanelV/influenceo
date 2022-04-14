
<form class="form" id="common-form-user" action="/register" method="POST">
    <div class="row">
    <div class="col-lg-12 message-user"></div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="email" name="email" class="require" placeholder="Email">
        <i class="la la-envelope"></i>
        </div>
    </div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="text" name="username" class="require" placeholder="Pseudo">
        <i class="la la-user"></i>
        </div>
    </div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <select name='genre' class="require">
            <option value="">Genre</option>
            <option value="F">Femme</option>
            <option value="H">Homme</option>
        </select>
        <i class="la la-user"></i>
        <span><i class="fa fa-ellipsis-h"></i></span>
        </div>
    </div>
    
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="password" name="password" class="require" placeholder="Mot de passe">
        <i class="la la-lock"></i>
        </div>
    </div>
    <div class="col-lg-12 no-pdd">
        <div class="sn-field">
        <input type="password" name="confirm_password" class="require" placeholder="Confirmer Mot de passe">
        <i class="la la-lock"></i>
        </div>
    </div>
    <input type="hidden" name="user_type" value="1">
    <div class="col-lg-12 no-pdd">
        <button type="submit" rel="user" class="form-button">S'inscrire</button>
    </div>
    </div>
</form>