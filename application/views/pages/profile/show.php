<div class="wrap">                  
        <div class="main_info">
            <div class="profile_name">
                <div id="img_contrainer"> 
                        <img id='img' src="<?="..".explode("/home/o/o968434f/o968434f.beget.tech/public_html", $checkUser[0]["Avatar"])[1];?>" alt="">
                </div>
            </div>
            <div class="profile_name">
                <div><?=$checkUser[0]["Firstname"];?></div>
                <div>
                     <?=$checkUser[0]["Status"] == 1 ? "Online" : "Offline";?>
                </div>
            </div>
</div>
<html lang="en">
    <link rel="stylesheet" type="text/css" href="../source/css/profile.css">
</html>