<?php
 /**
 * @package		Joomla.Site
 * @subpackage	com_contact
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$db = JFactory::getDBO();
$db->setQuery("SELECT title, introtext FROM #__content WHERE id = 9");
$contact = $db->loadObject();

$db->setQuery("SELECT name, information FROM #__boutique");
$shops = $db->loadObjectList();
if(JRequest::getVar('success')){?>
<div id="signup-page">
    <div id="w-signup-page">
    <div class="signup-title">
        <h2>Kvittering</h2>
    </div><!--.signup-title-->
    		<p style="margin-left:10px; margin-top:10px;">Kære kunde, <br>Tak for din henvendelse. Vi vil kontakte dig hurtigst muligt.<br><br>
        Med venlig hilsen<br>
        Amager Isenkram
        </p>
        <div style="float:none; margin-left:10px;" class="bnt-gohome">
        <a href="index.php">TIL FORSIDEN</a>
        </div>
	    </div><!--#w-signup-page-->
</div>
<?php } else {?>
<script language="javascript" src="templates/amager/js/jquery.validate.js"></script>
<script language="javascript">
jQuery(document).ready(function()
{
	jQuery.validator.addMethod("requireDefault", function(value, element) 
	{	
		return !(element.value == element.defaultValue);
	});
	
	jQuery("#contactForm").validate({
		rules: {
			email: {
				requireDefault: true,
				required: true,
				email: true
			},
			name: {
				requireDefault: true,
				required: true,
			},
			phone: {
				requireDefault: true,
				required: true,
				number: true
			}
		},
		messages: {
			email: "",
			name: "",
			phone: ""
		}
	});
});// JavaScript Document
</script>
<div id="contact-page">
    <div class="contact-title">
        <h2><?php echo $contact->title;?></h2>
        <?php echo $contact->introtext;?>
    </div><!--.contact-title-->
    <div class="contact-info">
        <ul>
        	<?php foreach($shops as $shop){?>
            <li>
                <h2><?php echo $shop->name;?></h2>
                <?php echo $shop->information;?>
            </li>
            <?php }?>
        </ul>
    </div><!--.contact-info-->
    <form class="contact-frm" name="contactForm" action="<?php echo JRoute::_('index.php'); ?>" method="post" id="contactForm">
        <fieldset>
            <p>Kontakt formular</p>
            <div>
                <input type="text" value="Navn *" name="name" />
            </div>
            <div>
                <input type="text" value="Telefon *" name="phone" />
            </div>
            <div>
                <input type="text" value="Email *" name="email" />
            </div>
            <div>
                <textarea cols="" rows="" name="message" onfocus="this.value=''">Besked</textarea>
            </div>
            <span>* Skal udfyldes</span><br />
            <!--<div class="bnt-send">
                <a href="#">Send</a>-->
                <button class="button validate bnt-send" type="submit" style="border:none; cursor:pointer;"> </button>
            <!--</div>--><!--.bnt-send-->
            <!--<div class="bnt-reset">
                <a href="#">Nulstil</a>-->
                <button class="button validate bnt-reset" type="reset" style="border:none; cursor:pointer;"> </button>
            <!--</div>--><!--.bnt-reset-->
            
            <input type="hidden" name="option" value="com_contact" />
            <input type="hidden" name="task" value="contact.submit" />
            <input type="hidden" name="return" value="<?php echo $this->return_page;?>" />
            <input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
            <?php echo JHtml::_( 'form.token' ); ?>      
        </fieldset>
    </form>
</div><!--#contact-page-->
<?php }?>