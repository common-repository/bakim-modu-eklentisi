<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directlys 
$title=get_option('ccs_title');
$heading=get_option('ccs_heading');
$background_color=get_option('ccs_background_color');
$texth_color=get_option('ccs_texth_color');
$ccs_logo=get_option('ccs_logo')==''?$texth_color:get_option('ccs_logo');
$message=get_option('ccs_message');
$text_color=get_option('ccs_text_color');
$enable_wall=get_option('ccs_enable_wall');
$wall_width=get_option('ccs_wall_width');
$wall_height=get_option('ccs_wall_height');
$ccs_main_logo=get_option('ccs_main_logo');
list($r, $g, $b) = sscanf($background_color, "#%02x%02x%02x");
$rgbas="$r, $g, $b";
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title;?></title>
<style type="text/css">
body
    {
        margin:0px; 
        background-color:#ffffff;
        height:100%;
        width:100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center; 
        size:cover
    }
.div_ccs
    {  
       margin: 8% auto;
    }
  
.ccs_title
    {
      color:<?php echo $texth_color;?>;
      font-size: 30px;
      text-align: center;
      font-weight:bold;
    }
.ccs_content
    {
        color:<?php echo $text_color;?>;
        font-size: 16px;
        text-align: center;
    }
 .back_image
    {
     width:100%;
     text-align: center;
     margin-top:70px;
    }
</style>
</head>
<body>
    <div class="back_image">
        <img src='<?php echo plugins_url();?>/bakimmodu-coming-soon/themes/StaticBackground/images/background.png' style="margin:0px auto;width:70%;">
    </div>   
    <div style="text-align: center;">
        <p>&nbsp;</p>
        <div class="ccs_title"><?php echo $heading;?></div>
        <div class="ccs_content"><?php echo $message;?></div>
        <p>&nbsp;</p>
     </div>
</body>
</html>