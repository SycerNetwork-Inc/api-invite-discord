<?php
  /*
  --------------------------------------------------------
  > ทำเพือการศึกษา โดย TinnerKun
  > Facebook https://www.facebook.com/sycertinnerkung
  > GitHub https://github.com/TinnerKung
  > Website https://sycer.network
  --------------------------------------------------------
  */

  // Blacklist Id
  $fibacklist = array("11");
  $idbacklist = str_replace($fibacklist,"",@$_GET["id"] ?: "699832081643077662");

  $id = str_replace("/","",$idbacklist);

  // ระบบ Fuliter
  $verify = array("699177149298638859","699832081643077662","485833931283890188");

  // Web html
  header('Content-Type: text/html; charset=UTF-8');

  // Get widget

  $re = json_decode(file_get_contents("https://discord.com/api/guilds/".$id."/widget.json"),true);

$urlinvitefix = str_replace("https://discord.com/invite/","",$re['instant_invite']);
$getdatainvite = json_decode(file_get_contents("https://discord.com/api/v9/invites/".$urlinvitefix."?with_counts=true&with_expiration=true"),true);


$imgall = "https://cdn.discordapp.com/icons/".$getdatainvite["guild"]["id"]."/".$getdatainvite["guild"]["icon"]."?size=4096";

if($getdatainvite["guild"]["banner"] == null){
  $banners = $imgall;
} else {
  $banners = "https://cdn.discordapp.com/banners/".$getdatainvite["guild"]["id"]."/".$getdatainvite["guild"]["banner"]."?size=4096";
}

@$description = $getdatainvite["guild"]["welcome_screen"]["description"];
@$ogtitle = $getdatainvite["guild"]["name"];

@$im = imagecreatefrompng($imgall);
@$rgb = imagecolorat($im, 350, 120);
@$colors = imagecolorsforindex($im, $rgb);
@$sHexValue = dechex($colors["red"]) . dechex($colors["green"]) . dechex($colors["blue"]);

  // หาลายชื่อ Server ไม่ติด หรือ เขียนมั้ว

if ($id == '485833931283890188') {
  header( "location: https://bot.sycer.network" );
  exit(0);
} else {

  if(@$re['guild_id'] != null or @$re['code'] == "50004" or @$re['code'] == "10004"){
  echo "สถานะ Code = " .$re['code'];
  } else {

  // หา invite link ไม่เจอไม่สามารถดึง meta และ รูปมาได้
  if($re['instant_invite'] == null) {
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="twitter:site" content="@discord" />
  <meta property="og:site_name" content="Sycer Invite" />
  <title><?php echo $re['name']; ?> Discord</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <style>
  @import url(https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap);
  * {
      font-family: 'krub';
  }
  body {
      background-color: black;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      backdrop-filter: blur(25px);
      height: 100%;
  }
  .vbg {
      background: rgb(230,113,106);
      background: linear-gradient(135deg, rgba(230,113,106,1) 0%, rgba(253,217,131,1) 46%, rgba(15,225,250,1) 79%);
  }

  .wrapper {
  height: 100%;
  width: 100%;
  left:0;
  right: 0;
  top: 0;
  bottom: 0;
  background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
  background-size: 1800% 1800%;

  -webkit-animation: rainbow 18s ease infinite;
  -z-animation: rainbow 18s ease infinite;
  -o-animation: rainbow 18s ease infinite;
  animation: rainbow 18s ease infinite;}

  @-webkit-keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  @-moz-keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  @-o-keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  @keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  </style>
  </head>
  <body>

  <div class="view bg-hero" style="min-height:100vh;">
    <div class="mask flex-center">
      <div class="dark-text text-center col-sm-3">
      <div class="card">
         <div class="card-body">
             <h4 class="card-title"><a><?php echo $re['name']; ?></a></h4>
             <p class="card-text">มีคนออนไลน์ขณะนี้ : <span class="badge badge-danger"><?php echo $re['presence_count']; ?></span> คน</p>
             <h4></h4>
             </div>
         <a href="https://www.facebook.com/sycertinnerkung" style="margin-bottom: 10px;">© Copyright TinnerKun</a>
      </div>
      </div>
    </div>
  </div>

  <?php } else { ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="theme-color" content="<?php echo '#' . $sHexValue; ?>">
  <link rel="icon" type="image/png" href="<?php echo $imgall ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="<?php echo $description ?>" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@discord" />
  <meta name="twitter:title" content="<?php echo $ogtitle ?>" />
  <meta name="twitter:description" content="<?php echo $description ?>" />
  <meta property="og:title" content="<?php echo $ogtitle ?>" />
  <meta property="og:url" content="<?php echo $re['instant_invite']; ?>" />
  <meta property="og:description" content="<?php echo $description ?>" />
  <meta property="og:site_name" content="Sycer Invite" />
  <meta property="og:image" content="<?php echo $imgall ?>" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="4096" />
  <meta property="og:image:height" content="4096" />
  <title><?php echo $re['name']; ?> Discord</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <style>
  @import url(https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap);
  * {
      font-family: 'krub';
  }
  body {
      background-image: url("<?php echo $banners ?>");
      background-color: black;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      backdrop-filter: blur(25px);
      height: 100%;
  }
  .vbg {
      background: rgb(230,113,106);
      background: linear-gradient(135deg, rgba(230,113,106,1) 0%, rgba(253,217,131,1) 46%, rgba(15,225,250,1) 79%);
  }

  .wrapper {
  height: 100%;
  width: 100%;
  left:0;
  right: 0;
  top: 0;
  bottom: 0;
  background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
  background-size: 1800% 1800%;

  -webkit-animation: rainbow 18s ease infinite;
  -z-animation: rainbow 18s ease infinite;
  -o-animation: rainbow 18s ease infinite;
  animation: rainbow 18s ease infinite;}

  @-webkit-keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  @-moz-keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  @-o-keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  @keyframes rainbow {
    0%{background-position:0% 82%}
    50%{background-position:100% 19%}
    100%{background-position:0% 82%}
  }
  </style>
  </head>
  <body>

      <div class="view bg-hero" style="min-height:100vh;">
        <div class="mask flex-center">
          <div class="dark-text text-center col-sm-3">
          <div class="card">
             <img class="card-img-top" src="<?php echo $imgall ?>" alt="" style="background-color: black;">
             <div class="card-body">
                 <h4 class="card-title"><a><?php echo $re['name']; ?></a></h4>
                 <p class="card-text"><?php echo $description;?></p>
                 <p class="card-text">มีคนออนไลน์ขณะนี้ : <span class="badge badge-danger"><?php echo $getdatainvite['approximate_presence_count'].' / '.$getdatainvite['approximate_member_count'] ?></span> คน</p>
                   <hr>
                 <a href="<?php echo @$re['instant_invite']; ?>" target="_blank" class="btn btn-black btn-block btn-lg" style="color: white; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;"><i class="fab fa-discord"></i> เข้าร่วม Discord ของเรา</a>
             </div>
             <a href="https://www.facebook.com/sycertinnerkung" style="margin-bottom: 10px;">© Copyright TinnerKun</a>
          </div>
          </div>
        </div>
      </div>
    <?php } ?>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
  </body>
  </html>
<?php }} ?>
