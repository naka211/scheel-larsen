<?php //	THIS LAYOUT INCLUDE 4 PARTS, BECOME ONE PAGE CHECKOUT
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
// vmdebug('user edit address',$this->userFields['fields']);
// Implement Joomla's form validation
JHTML::_ ('behavior.formvalidation');
if ($this->fTask === 'savecartuser') {
	$rtask = 'registercartuser';
	$url = 0;
}
else {
	$rtask = 'registercheckoutuser';
	$url = JRoute::_ ('index.php?option=com_virtuemart&view=cart&task=checkout', $this->useXHTML, $this->useSSL);
}

$cart = VirtueMartCart::getCart(); 
$cart->prepareCartViewData();
//print_r($cart);exit;
?>

<div id="ppCartcredit" class="reveal-modal">
    <div class="f_map clearfix">
        <h4>ViaBill betingelser</h4>
        <p>I samarbejde med ViaBill kan vi tilbyde faktura eller delbetaling. Det betyder at du kan købe dine varer nu, og vente med at betale.</p>
        <p>Når du gennemfører din bestilling, skal du vælge blot vælge ” ViaBill" som betalingsmetode. Klik på ” Gå til betaling ”og du bliver ført til en sikker side som kun ViaBill har adgang til at se, her gennemføres et kredittjek. Du får svar med det samme, og derefter er bestillingen gennemført.</p>
        <p>Vi sender dig dine varer og en faktura som dokumentation på din ordre, sideløbende vil du modtage en opkrævning fra ViaBill, det er denne du skal indbetale efter. </p>
        <p>Har du spørgsmål, er du meget velkommen til at kontakte vores kundeservice på tlf. 4930 1699. </p>
        <p>Alle spørgsmål vedrørende betaling af en faktura, skal rettes til ViaBill på telefon 88 826 826, da det er dem der yder kreditten. </p>
    </div>
    <a id="close-reveal-modal" class="close-reveal-modal"></a> </div>
    
<script type="text/javascript">
jQuery(document).ready(function(){

    $('#checkoutForm input[type=checkbox]').on('change invalid', function() {
        var textfield = $(this).get(0);
        textfield.setCustomValidity('');
        
        if (!textfield.validity.valid) {
          textfield.setCustomValidity('Venligst accepterer vores handelsbetingelser');  
        }
    });
    
	var company = '<input class="input required" type="text" placeholder="Firmanavn *" name="company" id="company"><input class="input required" type="text" placeholder="CVR-nr. *" name="cvr" id="cvr" style="margin-bottom:10px;">';
	var public = '<input class="input required" type="text" placeholder="EAN-nr. *" name="ean" id="ean" maxlength="13"><input class="input required" type="text" placeholder="Myndighed/Institution *" name="authority" id="authority"><input class="input required" type="text" placeholder="Ordre- el. rekvisitionsnr. *" name="order1" id="order1"><input class="input required" type="text" placeholder="Personreference *" name="person" id="person" style="margin-bottom:10px;">';
	jQuery("#choicemaker").change(function () {

		value = jQuery("#choicemaker").val();

		if(value == 1){
			jQuery("#addInfo").html('');
            jQuery("#pay1").attr("disabled", false);
            jQuery("#pay2").attr("disabled", false);
            
            jQuery("#pay3").attr("name", "");
            jQuery("#pay3").val(0);
		} else if(value == 2){
			jQuery("#addInfo").html(company);
            jQuery("#pay1").attr("disabled", false);
            jQuery("#pay2").attr("disabled", false);
            
            jQuery("#pay3").attr("name", "");
            jQuery("#pay3").val(0);
		} else {
			jQuery("#addInfo").html(public);
            jQuery("#pay1").attr("disabled", "disabled");
            jQuery("#pay2").attr("disabled", "disabled");
            
            jQuery("#pay3").attr("name", "virtuemart_paymentmethod_id");
            jQuery("#pay3").val(3);
		}

	});
	
	jQuery('.bnt-create-acc').click(function(){
		jQuery(".w-create-acc").slideToggle();
	});
    
	changeDelivery = function(val){
		if(val == 1){
			jQuery("#shipPriceLabel1").html("0,00 DKK");
			var total = formatMoney(parseFloat((jQuery("#subtotal").val())*0.9));
			jQuery("#payTotal").html(total+" DKK");
            jQuery("#deduct").show();
		} else {
            jQuery("#shipPriceLabel1").html(jQuery("#shipFee").val() + ",00 DKK");
			var total = formatMoney(parseFloat(Number(jQuery("#subtotal").val()) + Number(jQuery("#shipFee").val())));
			jQuery("#payTotal").html(total+" DKK");
            jQuery("#deduct").hide();
        }
	}

	formatMoney = function(num){
		var p = num.toFixed(2).split(".");
		return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
			return  num + (i && !(i % 3) ? "." : "") + acc;
		}, "") + "," + p[1];
	}
	//isST process
    
	setDelivery = function(zipcode){
		zipcode = Number(zipcode);
		if(zipcode < 5000) {
			jQuery("#ship1").val(2);
			var subtotal = Number(jQuery("#subtotal").val());
			if(subtotal <= 1000){
				var fee = 150;
			} else {
				var fee = 0;
			}
			var text = 'Leveret på Sjælland: ';
		} else {
			jQuery("#ship1").val(3);
			var fee = 350;
			var text = 'Leveret til døren for Fyn og Jylland: ';
		}
		jQuery("#shipFee").val(fee);
		jQuery("#shipPriceLabel").html(text+fee+" DKK");
		jQuery("#shipPriceLabel1").html(fee+" DKK");
		jQuery("#shipMethod").show();
		changeDelivery(jQuery('input[name=virtuemart_shipmentmethod_id]:checked', '#checkoutForm').val());
	}
	
    var zip = jQuery("#zip").val();
	if(zip){
		setDelivery(zip);
	}
    
    jQuery("#zip").blur(function(){
		var zip = jQuery("#zip").val();
		jQuery.ajax({
            type: "POST",
            url: "<?php echo JURI::base();?>index.php?option=com_virtuemart&controller=cart&task=requestCity",
            data: {zip: zip}
        }).done(function(result) {
            if(result){
                jQuery("#city").val(result);
				if(!jQuery("#st_zip").val()){
					setDelivery(zip);
				}
            }
		});
    });
    
    shipTo = function(){
        if(jQuery(".w_Address").css("display")=="none"){
            jQuery(".w_Address").html("");
            jQuery("#STsameAsBT").val("1");
			setDelivery(jQuery("#zip").val());
        } else {
            var st_html = '<input class="input required" type="text" placeholder="Fornavn*" name="st_first_name" id="st_first_name"><input class="input required" type="text" placeholder="Efternavn*" name="st_last_name" id="st_last_name"><input class="input required" type="text" placeholder="Vejnavn*" name="st_street_name" id="st_street_name"><input class="input required" type="text" placeholder="Hus/gade nr.*" name="st_street_number" id="st_street_number"><input class="w75 fl input2 required" type="text" placeholder="Postnr.*" name="st_zip" id="st_zip" maxlength="4"><input class="w203 fr input2" type="text" placeholder="Bynavn*" name="st_city" id="st_city"><input class="input required" type="text" placeholder="Telefon*" name="st_phone" id="st_phone">';
            jQuery(".w_Address").html(st_html);
            jQuery("#STsameAsBT").val("0");
            
            jQuery("#st_zip").blur(function(){
                var st_zip = jQuery("#st_zip").val();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo JURI::base();?>index.php?option=com_virtuemart&controller=cart&task=requestCity",
                    data: {zip: st_zip}
                }).done(function(result) {
                    jQuery("#st_city").val(result);
					setDelivery(st_zip);
                });
            });
        }
    }
    
    jQuery(".w_Address").hide();
    shipTo();
    
    jQuery('.btnLevering').click(function(event){
        event.preventDefault();
        jQuery(".w_Address").slideToggle("500","swing", function(){
            shipTo();
        });
    });
    
	jQuery("#checkoutBtn").bind("click",function(){
		if(jQuery("#tosAccepted").is(':checked')){
			jQuery("#checkoutForm").submit();
		} else {
			alert('Bedes acceptere vilkår og betingelser');
			jQuery("#tosAccepted").focus();
			return false;
		}
	});
});
</script>
<form method="post" id="checkoutForm" name="userForm" class="form-validate" style="padding:0;border-top:none" action="index.php">
<div class="template2 mb70">
    <div class="checkout_page clearfix">
        <div class="w285 fl">
            <h2><span>1</span>Kundeoplysninger</h2>
            <div class="entryInfo">
                <h3>INDTAST DINE OPLYSNINGER</h3>
                <label for="">Vælg kundetype *</label>
                <select id="choicemaker" name="mwctype" class="input select">
                    <option value="1">Privat</option>
                    <option value="2">Erhverv</option>
                    <option value="3">Offentlig instans</option>
                </select>
                <div id="w_privat" class="clearfix">
                    <span id="addInfo"></span>
                    <input class="input required" type="text" placeholder="Fornavn *" name="first_name" id="first_name">
                    <input class="input required" type="text" placeholder="Efternavn *" name="last_name" id="last_name">
                    <input class="input required" type="text" placeholder="Vejnavn *" name="street_name" id="street_name">
                    <input class="input required" type="text" placeholder="Hus/gade nr. *" name="street_number" id="street_number">
                    <input class="w75 fl input2 required" type="text" placeholder="Postnr. *" name="zip" id="zip" maxlength="4">
                    <input class="w203 fr input2 required" type="text" placeholder="Bynavn *" name="city" id="city" readonly>
                    <input class="input required" type="text" placeholder="Telefon *" name="phone_1" id="phone_1">
                    <input class="input required validate-email" type="text" placeholder="E-mail adresse *" name="email" id="email">
                    <textarea class="textarea" placeholder="Evt. din besked" name="message1"></textarea>
                    <p>(Felter markeret med * skal udfyldes)</p>
                    <a class="btnLevering hover" href="javascript:void(0);">Levering til anden adresse</a>
                    <div class="w_Address clearfix">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="w605 fr">
            <ul class="levering clearfix">
                <h2><span>2</span>Levering</h2>
                <li id="shipMethod" style="display:none;">
                    <input id="ship1" name="virtuemart_shipmentmethod_id" value="0" type="radio" checked onChange="changeDelivery(this.value)">
                    <span id="shipPriceLabel"></span>
                </li>
                <li>
                    <input id="ship2" name="virtuemart_shipmentmethod_id" value="1" type="radio" onChange="changeDelivery(this.value)">
                    Ved afhentning på Hesselrødvej 26, 2980 Kokkedal, sparer du 10%, som vil blive fratrukket automatisk
                </li>
            </ul>
            <div class="payment_Method clearfix">
                <h2><span>3</span>Betalingsmetode</h2>
                <p>Du kan betale med følgende betalingskort:</p>
                <p> <span>
                    <input name="virtuemart_paymentmethod_id" value="1" type="radio" id="pay1" checked>
                    </span> <img src="templates/scheellarsen/img/cart2.png" alt=""> </p>
                <p> <span>
                    <input class="mt5" name="virtuemart_paymentmethod_id" value="2" type="radio" id="pay2">
                    </span> <a href="#" data-reveal-id="ppCartcredit"><img src="templates/scheellarsen/img/icon_via.png" alt=""></a> </p>
            </div>
            <div class="order_Summary clearfix">
                <h2><span>4</span>Ordreoversigt</h2>
                <table class="main_order_Summary">
                    <tr class="title">
                        <th>Varebeskrivelse</th>
                        <th>Antal</th>
                        <th>Pris pr stk.</th>
                        <th>Pris i alt</th>
                    </tr>
                    <?php foreach($cart->products as $product){
                        if(count($product->customPrices) > 1){
                            preg_match_all("#<span class=\"product-field-type-S\"> [\w\W]*?</span>#", $product->customfields, $tmp);
                            $select1 = $tmp[0][0];
                            $select2 = $tmp[0][1];
                            preg_match("#src=\"([\w\W]*?)\" alt#", $product->customfields, $tmp1);
                            $img = $tmp1[1];
                        } else {
                            preg_match("#<span class=\"product-field-type-V\">[\w\W]*?</span>#", $product->customfields, $tmp);
                            $select1 = $tmp[0];
                            $select2 = '';
                            $img = $product->image->file_url_thumb;
                        }
                    ?>
                    <tr>
                        <td><div class="img_pro"> 
                                <?php 
                                if(strlen($img)>4){
                                    echo '<img width="90" src="'.$img.'"> ';
                                }else{
                                    echo $product->image->displayMediaThumb ('', FALSE);
                                }
                                ?>
                                
                            </div>
                            <div class="content_pro" style="float:none;">
                                <h4><?php echo $product->product_name;?></h4>
                                <p>Vare-nummer: <?php echo $product->product_sku;?></p>
                                <?php if($select1){?><p><?php echo $select1;?></p><?php }?>
                                <?php if($select2){?><p><?php echo $select2;?></p><?php }?>
                            </div></td>
                        <td><p><?php echo $product->quantity;?></p></td>
                        <td><p><?php echo number_format($product->prices['salesPrice'],2,',','.').' DKK';?></p></td>
                        <td><p><?php echo number_format($product->prices['salesPrice']*$product->quantity,2,',','.').' DKK';?></p></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td colspan="4" class="cf9f7f3"><table class="sub_order_Summary">
                                <tr>
                                    <td colspan="2">Subtotal: </td>
                                    <td colspan="2" width="30%"> <?php echo number_format($cart->pricesUnformatted['salesPrice'],2,',','.').' DKK'; ?> </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Heraf moms: </td>
                                    <td colspan="2"><?php echo number_format($cart->pricesUnformatted['billTotal']*0.2,2,',','.');?> DKK</td>
                                </tr>
                                <tr>
                                    <td colspan="2">FRAGT: </td>
                                    <td colspan="2"><span id="shipPriceLabel1"></span></td>
                                </tr>
                                <tr id="deduct">
                                    <td colspan="2">Rabat 10% ved afhentning: </td>
                                    <td colspan="2"><?php echo '-'.number_format($cart->pricesUnformatted['salesPrice']*0.1,2,',','.').' DKK'; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h4>TOTAL:</h4></td>
                                    <td colspan="2"><h4><span id="payTotal"><?php echo number_format($cart->pricesUnformatted['billTotal'],2,',','.').' DKK'; ?></span></h4></td>
                                </tr>
                            </table></td>
                    </tr>
                </table>
            </div>
            <p class="accetp">
                <input name="tosAccepted" id="tosAccepted" type="checkbox" value="1" class="required">
                Jeg bekræfter hermed at mine data er korrekte, samt at kurven indeholder de varer jeg ønsker. </p>
            <a class="conditions" href="index.php?option=com_content&view=article&id=8&Itemid=131" target="_blank">Jeg accepterer Handelsbetingelser.</a> </div>
        <div class="clear"></div>
        <div class="nextto clearfix">
        <a class="fl btnVarekurv hover" href="index.php?option=com_virtuemart&view=cart">Til Varekurv</a> 
        <!--<a class="fr btnBetaling hover" href="thanks.php">til Betaling</a>-->
        <button type="submit" class="validate fr btnBetaling hover" style="cursor:pointer; border:none;">Til Betaling</button>
        
        <input type="hidden" id="subtotal" value="<?php echo $cart->pricesUnformatted['salesPrice']?>" />
        <input type="hidden" id="shipFee" value=""/>
        <input type="hidden" id="pay3" name="" value=""/>
        
        <input type="hidden" name="option" value="com_virtuemart"/>
        <input type="hidden" name="view" value="cart"/>
        <input type="hidden" name="task" value="confirm"/>
        <input type='hidden' id='STsameAsBT' name='STsameAsBT' value=''/>
        <?php
        echo JHTML::_ ('form.token');
        ?>
        </div>
    </div>
</div>
</form>