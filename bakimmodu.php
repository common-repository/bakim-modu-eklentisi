<?php
/**
Plugin Name: Bakım Modu Eklentisi
Plugin URI: https:///
Description: "Yapım Aşamasında veya Bakım sayfasında bir Sayfa Açmanızı sağlar." .
Author: Barış Aktaş
Author URI: https://eticoxs.com/
Version: 1.2
*/

if ( ! defined( 'ABSPATH' ) ) exit; 

add_action( 'wp_enqueue_scripts', 'custom_csn_jquery' );

     
function bakimmodu_csn_jquery()
        {
            if ( ! wp_script_is( 'jquery', 'enqueued' ))
                {
                wp_enqueue_script( 'jquery' );
                              
              }
             
        }

add_action('admin_menu','bakimmodu_csn_menu');


if(!function_exists('bakimmodu_csn_menu')):
function bakimmodu_csn_menu(){

	add_options_page('Bakım Modu','Bakım Modu','manage_options','bakimmodu','bakimmodu_csn_setting');

}
endif;


add_action('admin_init','bakimmodu_csn_fields');


if(!function_exists('bakimmodu_csn_fields')):
        function bakimmodu_csn_fields(){
                register_setting('ccs_setting_options','ccs_status');
                register_setting('ccs_setting_options','ccs_title');
                register_setting('ccs_setting_options','ccs_theme');
                register_setting('ccs_setting_options','ccs_heading'); 
                register_setting('ccs_setting_options','ccs_main_logo');
                register_setting('ccs_setting_options','ccs_logo');
                register_setting('ccs_setting_options','ccs_message');
                register_setting('ccs_setting_options','ccs_background_color');
                register_setting('ccs_setting_options','ccs_texth_color');
                register_setting('ccs_setting_options','ccs_text_color');
                register_setting('ccs_setting_options','ccs_enable_wall');
                register_setting('ccs_setting_options','ccs_wall_width');
                              
} 
endif;

if(!function_exists('bakimmodu_csn_setting')):
        function bakimmodu_csn_setting()
           { ?>
                 <script>
                   jQuery(document).ready(function($){
                                $('#upload-btn').click(function(e) {
                                        e.preventDefault();
                                        var image = wp.media({ 
                                                title: 'Resim Yok',
                                                multiple: false
                                        }).open()
                                        .on('select', function(e){
                                                var uploaded_image = image.state().get('selection').first();
                                                console.log(uploaded_image);
                                                var image_url = uploaded_image.toJSON().url;
                                                $('#ccs_logo').val(image_url);
                                        });
                                });
                                
                                        $('#upload-btn-logo').click(function(e) {
                                        e.preventDefault();
                                        var image = wp.media({ 
                                                title: 'Logo Yükle',
                                                multiple: false
                                        }).open()
                                        .on('select', function(e){
                                                var uploaded_image = image.state().get('selection').first();
                                                console.log(uploaded_image);
                                                var image_url = uploaded_image.toJSON().url;
                                                $('#ccs_main_logo').val(image_url);
                                        });
                                });


                        });

                        jQuery(document).ready(function($){
                            $('.my-color-field').wpColorPicker();

                        });


                        </script>
                        <?php 

                        echo $script='<script type="text/javascript">
                                jQuery(document).ready(function(){

                                  jQuery(".ccs-tab-section").hide();
                                jQuery("#ccs_tabs a").bind("click", function(e){
                                        jQuery("#ccs_tabs a.current").removeClass("current");
                                        jQuery(".ccs-tab-section:visible").hide();
                                        jQuery(this.hash).show();
                                        jQuery(this).addClass("current");
                                        e.preventDefault();
                                }).filter(":first").click();
                                        })
                                </script>';
                        ?>
                        <div>
                            <div style="width: 80%; padding: 10px; margin: 10px;"> 
                                <h1>Bakım Modu Eklentisi -Eticoxs</h1>
                                    <ul id="ccs_tabs">
                                        <li><a href="#content">İçerik</a></li>
                                        <li><a href="#Design">Tasarım</a></li>
                                        <li><a href="#support">İletişim</a></li>
                                        
                                    </ul>
                                    <div style="float:right;color:#fff;" class="button button-primary"><a href="<?php echo $_SERVER['PHP_SELF'];?>?page=bakimmodu-coming-soon&mode=live-preview" target="_blank" style="color: #fff;text-decoration: none;">Canlı Önizleme</a></div>
                                    
                                <form action="options.php" method="post" id="ccs-settings-form-admin">
                                    <div id="content" class="ccs-tab-section">
                                        <h2>Genel Ayarlar</h2>
                                        <div class="ccs-content-div">

                                            <div>
                                                <?php
                                                  wp_enqueue_style( 'wp-color-picker' );
                                                  wp_enqueue_script( 'wp-color-picker' );
                                                ?>

                                                <label for="name" class="ccs_lable">Durumu:</label>
                                                <div class="ccs_radio">
                                                <input type="radio" class="ccs_input" id="ccs_status" name="ccs_status" value="disabled" checked /> Kapalı
                                                <input type="radio" class="ccs_input" id="ccs_status" name="ccs_status" value="enabled" <?php if(get_option('ccs_status')=="enabled"){?>checked<?php }?>/>Açık
                                                </div>
                                            </div>
                                            <div>
                                                <label for="mail" class="ccs_lable">Sayfa Başlığı:</label>
                                                <input type="text" id="ccs_title" class="ccs_input" name="ccs_title" value="<?php echo get_option('ccs_title'); ?>" />
                                            </div>

                                             <div>
                                                <label for="mail" class="ccs_lable">Ana Başlık:</label>
                                                <input type="text" id="ccs_title" class="ccs_input" name="ccs_heading" value="<?php echo get_option('ccs_heading'); ?>" />
                                            </div>
                                             
                                            <div>
                                                <label for="image_url" class="ccs_lable">Arka Plan Resmi</label>
                                                <input type="text" class="ccs_input"  name="ccs_logo" id="ccs_logo" class="regular-text" value="<?php echo get_option('ccs_logo');?>">
                                                <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Resim Yükle">
                                            </div>
                                            <div>
                                                <label for="msg" class="ccs_lable">Mesajınız:</label>
                                                <br/>
                                                <div class="ccs_editor">
                                                <?php  wp_editor(esc_html( __(get_option('ccs_message', 'Bakim Modu ...'))), 'ccs_message', $settings);?>
                                                </div>
                                               </div>  
                                        </div>
                                    </div>

                                    <div id="Design" class="ccs-tab-section ccs-design">
                                        <h2>Tasarım Ayarları</h2>
                                        <div>
                                            <label for="image_url" class="ccs_lable" id="ccs_lable">Tema Seç</label>
                                            <select name="ccs_tema" id="ccs_tema" class="select-box">
                                                <option value="Default">Varsayılan</option>
                                                <option value="SB">StatikArkaPlan</option>
                                            </select>
                                         </div>
                                        <div>
                                                <label for="image_url" class="ccs_lable">Logo</label>
                                                <input type="text" class="ccs_input_logo"  name="ccs_main_logo" id="ccs_main_logo" class="regular-text" value="<?php echo get_option('ccs_main_logo');?>">
                                                <input type="button" name="upload-btn-logo" id="upload-btn-logo" class="button-secondary" value="Logo Yükle">
                                            </div>
                                        
                                         <div>
                                                <label for="mail" class="ccs_lable_design">Arka Plan Rengi:</label>
                                                <input type="text" value="<?php echo $bcol=get_option('ccs_background_color')==""?'#0f0011':get_option('ccs_background_color'); ?>"  name="ccs_background_color" id="ccs_background_color" class="my-color-field" data-default-color="#effeff" />
                                         </div>
                                        <div>
                                                <label for="mail" class="ccs_lable_design">Başlık metin rengi:</label>
                                                <input type="text" value="<?php echo $heading_text_col=get_option('ccs_texth_color')==""?'#ea353b':get_option('ccs_texth_color'); ?>"  name="ccs_texth_color" id="ccs_texth_color" class="my-color-field" data-default-color="#effeff" />
                                         </div>    

                                        <div>
                                                <label for="mail" class="ccs_lable_design">Metin Rengi:</label>
                                                <input type="text" value="<?php echo $text_col=get_option('ccs_text_color')==""?'#bada55':get_option('ccs_text_color'); ?>"  name="ccs_text_color" id="ccs_text_color" class="my-color-field" data-default-color="#effeff" />
                                         </div>  

                                        <div>
                                                <label for="mail" class="ccs_lables">404 Duvarını etkinleştir:</label>
                                                <input type="checkbox" class="mtop7" value="yes"  name="ccs_enable_wall" <?php if(get_option('ccs_enable_wall')=="yes"){?>checked<?php }?> id="ccs_enable_wall" />
                                         </div>  

                                        <div>
                                                <label for="mail" class="ccs_lables">Duvar Genişliği:</label>
                                                <input type="text" class="mtop7"  value="<?php echo $wall_width=get_option('ccs_wall_width')==""?'400':get_option('ccs_wall_width'); ?>"  name="ccs_wall_width" id="ccs_enable_wall" /> width like 400
                                         </div>  
                                        
                                       
                                    </div>
                                    <div id="support" class="ccs-tab-section ccs-design">
                                        <h2>Yardım</h2>
                                        <p>
                                          Kolayca Yakında veya Bakım Modu sayfası oluşturun. Ziyaretçiler yalnızca sizin oluşturduğunuz sayfayı görürken web sitenizde çalışabilirsiniz. Oluşturduğunuz sayfa tamamen özelleştirilebilir ve Yakında çıkan sayfa olarak normal bir WordPress sayfası da kullanabilirsiniz. Bir Sayfa Şablonu oluşturun ve istediğiniz herhangi bir içeriği göstermek için Bakım Modu sayfası olarak kullanın.<a href="mailto:info@eticoxs.com">Yardım & Destek</a>
                                        </p>
                                    </div>
                                 </div>
                                <?php $ccs_editor_settings = array(
                                    'teeny' => true,
                                    'textarea_rows' => 15,
                                    'tabindex' => 1
                                );
                                ?>   
                            
                            <span class="submit-btn"><?php echo get_submit_button('Kaydet','button-primary','submit','','');?></span>
                                    <?php settings_fields('ccs_setting_options'); ?>
                                </form>
                                        </div>
                                    

                        <!-- Bitiş  Form -->


                        <?php
             }
endif;
if (isset($_GET['page']) && $_GET['page'] == 'bakimmodu')
    {
             add_action('admin_footer','init_bakimmodu_css_scripts');
    }
if(!function_exists('init_bakimmodu_css_scripts')):
            function init_bakimmodu_css_scripts()
            {
            wp_register_style( 'ccs_admin_style', plugins_url( 'css/ccs_admin.css',__FILE__ ) );
            wp_enqueue_style( 'ccs_admin_style' );
    }
endif;


function bakimmodu_csn_settings_link($links) { 
            $settings_link = '<a href="options-general.php?page=bakimmodu">Ayarlar</a>'; 
            array_unshift($links, $settings_link); 
            return $links; 
}

$plugin = plugin_basename(__FILE__); 

add_filter("plugin_action_links_$plugin", 'bakimmodu_csn_settings_link' );


if( function_exists('register_uninstall_hook') ){
       register_uninstall_hook(__FILE__,'bakimmodu_csn_uninstall');
    }

if(!function_exists('bakimmodu_csn_uninstall')):
    function bakimmodu_csn_deactivation()
    {
            delete_option('ccs_status');
            delete_option('ccs_title');	
            delete_option('ccs_tema');
            delete_option('ccs_heading');	
            delete_option('ccs_logo');	
            delete_option('ccs_message');
            delete_option('ccs_background_color');
            delete_option('ccs_texth_color');
            delete_option('ccs_text_color');
            delete_option('ccs_enable_wall');
            delete_option('ccs_wall_width');
           
    }
endif;

if(isset($_GET['mode'])=="live-preview")
{
	
      get_template_directory();
          if(get_option('ccs_tema')=="SB")
            {
            require dirname(__FILE__).'/temalar/StaticBackground/ccs-statik-arkaplan.php';
            }
            else
            {
            require dirname(__FILE__).'/temalar/default/ccs-tema.php';
            } 
           exit;
}



if(get_option('ccs_status')=='enabled')
{
    add_action( 'template_redirect', 'bakimmodu_csn_template' ); 
    if(!function_exists('bakimmodu_csn_template')):
    
        function bakimmodu_csn_template()
        {
            get_template_directory();
           
            if(get_option('ccs_tema')=="SB")
            {
            require dirname(__FILE__).'/tsemalar/StaticBackground/ccs-statik-arkaplan.php';
            }
            else
            {
            require dirname(__FILE__).'/temalar/default/ccs-tema.php';
            } 
            exit;
        }
        endif;
        
}
 ?>
