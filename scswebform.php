<?php
/**
 * Plugin Name: SCS Web Form
 * Plugin URI: http://www.anushkar.com/plugins/scswebforms
 * Description: The custom web form integration with shortcode Ex : [scswebform formmethod="post" width="500" actionurl="http://www.silvercodesolutions.com" buttontext="Click Here" newtaburl="https://www.anushkar.com" emailtext="Email Gose Here..."]
 * Version: 1.0.0
 * Db Version: 1.0.0
 * Db Remove: No
 * Author: Anushka K R
 * Author URI: http://www.anushkar.com/
 * License: scswebform
 * Text Domain: scswebform
 * Icon URL: icon.png
 * License Srv Url: http://www.anushkar.com/plugins/scswebform/license
 * License Secert: RGVtbyBMaWNlbnNl
 * UserDocumentation: http://www.anushkar.com/plugins/scswebform/userdoc
 * DevDocumentation: http://www.anushkar.com/plugins/scswebform/devdoc
 * HelpAndSupport: http://www.anushkar.com/plugins/scswebform/help
 * Environment: Live
 *
 * */
define ("SCSWEBFORM_PLUGIN_PATH",__FILE__);
define ("SCSWEBFORM_PLUGIN_URL" , plugin_dir_url(dirname(__FILE__)).'/scswebform');
class ScsWebForms{
    public function __construct(){
        add_shortcode('scswebform',array($this,'genarateWebForm'));
        wp_enqueue_style( 'scswebform-css', SCSWEBFORM_PLUGIN_URL.'/css/style.css', array(), null, 'all' );
        wp_enqueue_script( 'scswebform-js', SCSWEBFORM_PLUGIN_URL.'/js/script.js',array('jquery'),null,true);
    }
    public function genarateWebForm($atts){
        $atts = shortcode_atts( array(
            'actionurl' => '#',
            'newtaburl' => 'http://www.anushkar.com',
            'buttontext' => 'get instance access',
            'emailtext' => 'Your Email Address Here...',
            'emailfieldname' => 'email',
            'width' => '500',
            'formmethod' => 'post'
        ), $atts, 'scswebform' );
        $_scswebform = <<<WEBFORM
<div class="scs-form-container" style="width:{$atts['width']}px;">
    <form  method="{$atts['formmethod']}"  id="scswebform" action="{$atts['actionurl']}" data-newtaburl="{$atts['newtaburl']}">
        <div class="elm-container">
        <div class="email-field-holder"><i class="fa fa-envelope"></i><input name="{$atts['emailfieldname']}" type="email" class="email-field" placeholder="{$atts['emailtext']}"></div>
        </div>
        <div class="elm-container">
            <input type="submit" value="{$atts['buttontext']}" class="submit-button" id="submit-button">
        </div>
    </form>
</div>
WEBFORM;

        return $_scswebform;
    }
}
new ScsWebForms();