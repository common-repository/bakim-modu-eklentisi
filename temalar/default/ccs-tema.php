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
 html{
    	height:100%;
	background: url("<?php echo get_option('ccs_logo');?>") no-repeat top center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	}
        
   
 .div_abc{  
    max-width: <?php echo $wall_width;?>px;
    min-height: 150px;
    margin: 15% auto;
    background:rgba(<?php echo $rgbas;?>, 0.3);
    border-radius: 10px;
  }
  .div_ccs{  
      margin: 8% auto;
   }
  
 .ccs_title
 {
   color:<?php echo $texth_color;?>;
   font-size: 30px;
   text-align: center;
 }
 .ccs_content
 {
     color:<?php echo $text_color;?>;
     font-size: 16px;
     text-align: center;
 }
 .ccs-logo
 {
     text-align:center;
     padding:5px;
 }
   

</style>

</head>
<body>
   
    <div class="<?php if($enable_wall=="yes"){?>div_abc<?php }else{?>div_ccs<?php }?>">
        <div class="ccs-logo"><?php if($ccs_main_logo!=""){?><img src="<?php echo $ccs_main_logo;?>"><?php }?></div>
        <div class="ccs_title"><?php echo $heading;?></div>
        <div class="ccs_content"><?php echo $message;?></div>
        <p>&nbsp;</p>
     </div>
</body>
</html>