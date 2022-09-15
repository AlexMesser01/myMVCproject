<? //debug($_SESSION); ?>  
    <div class="wrap">
        <div class="main_info">
            <div id="img_contrainer"> 
                <? if(empty($_SESSION)): ?>  
                    <?="<img id='img' src='../source/img/1.png' alt=''>";?>
                <?php else: ?>
                    <img id='img' src="<?="..".explode("/home/o/o968434f/o968434f.beget.tech/public_html", $_SESSION["user"]["is_auth"]["Avatar"])[1];?>" alt="">
                <?php endif; ?>
                    <form method="post" enctype="multipart/form-data" id="imgup" action="/profile/user">
                        <?php if(empty($_SESSION)): ?>    
                                <input id="upload_img" name="ava" type="file" disabled>
                            <?php else: ?>
                                    <input id="upload_img" name="ava" type="file">
                                <?php endif; ?>
                    </form>
            </div>
            <div class="profile_name"><?=$_SESSION["user"]["is_auth"]["Firstname"];?></div>
        </div>
        
        <div class="info_changable">
            <div class="params">

                <div class="about">О себе</div>
                <div class="about">
                    <form id="user_param" method="POST" action="/profile/user">
                        <input type="text" name="username" placeholder="<?=$_SESSION["user"]["is_auth"]["Firstname"]?>">
                        <input type="text" name="city" placeholder="<?=$_SESSION["user"]["is_auth"]["city"]?>">
                        <input placeholder="<?=$_SESSION["user"]["is_auth"]["birthday"]?>" name="birthday" type="text" onfocus="(this.type = 'date')"  id="date">
                        <input type="text" name="number" placeholder="<?=$_SESSION["user"]["is_auth"]["number"]?>">
                        <? if($_SESSION["user"]["is_auth"]["gender"] == "Женский"): ?>
                            <?='<p><input name="gender" type="radio" value="Мужской">Мужской</p><p><input name="gender" type="radio" checked value="Женский">Женский</p>';?>
                        <? else: ?> 
                            <?='<p><input name="gender" type="radio" checked value="Мужской">Мужской</p><p><input name="gender" type="radio" value="Женский">Женский</p>';?>
                        <? endif;?>
                        <input type="submit" value="Сохранить" name="change_user_data">
                        <? if(isset($responseData)): ?>
                        <p><?=$responseData?></p>
                        <? endif; ?>
                    </form>
                </div>
            
            </div>
            <div class="params">
                <div class="about">Настройки входа</div>
                <div class="about">
                    <form id="user_param" method="POST" action="/profile/user">
                        <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}">
                        <input type="password" name="pswrd" minlength="8" maxlenght="30" placeholder="Пароль" required>
                            <input type="submit" value="Сохранить" name="change_user_settings">
                            <? if(isset($alredy_exists)): ?>
                                <?="<p>$alredy_exists</p>";?>
                            <? endif; ?>
                            <? if (isset($responseSetting)): ?>
                                <?="<p>$responseSetting</p>";?>
                            <? endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../source/css/profile.css">
<script src="../source/scripts/uploadImg.js"></script>
</html>