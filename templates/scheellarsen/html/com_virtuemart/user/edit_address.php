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

	var company = '<input class="input required" type="text" placeholder="Firmanavn *" name="company" id="company"><input class="input required" type="text" placeholder="CVR-nr. *" name="cvr" id="cvr" style="margin-bottom:10px;">';
	var public = '<input class="input required" type="text" placeholder="EAN-nr. *" name="ean" id="ean" maxlength="13"><input class="input required" type="text" placeholder="Myndighed/Institution *" name="authority" id="authority"><input class="input required" type="text" placeholder="Ordre- el. rekvisitionsnr. *" name="order1" id="order1"><input class="input required" type="text" placeholder="Personreference *" name="person" id="person" style="margin-bottom:10px;">';
	jQuery("#choicemaker").change(function () {

		value = jQuery("#choicemaker").val();

		if(value == 1){
			jQuery("#addInfo").html('');
		} else if(value == 2){
			jQuery("#addInfo").html(company);
		} else {
			jQuery("#addInfo").html(public);
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
			jQuery("#type").val(1);
		} else {
            jQuery("#shipPriceLabel1").html(jQuery("#shipFee").val() + ",00 DKK");
			var total = formatMoney(parseFloat(Number(jQuery("#subtotal").val()) + Number(jQuery("#shipFee").val())));
			jQuery("#payTotal").html(total+" DKK");
            jQuery("#deduct").hide();
			jQuery("#type").val(2);
        }
	}

	formatMoney = function(num){
		var p = num.toFixed(2).split(".");
		return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
			return  num + (i && !(i % 3) ? "." : "") + acc;
		}, "") + "," + p[1];
	}
	//isST process
    
    jQuery("#st_zip").blur(function(){
		var st_zip = jQuery("#st_zip").val();
		jQuery.ajax({
            type: "POST",
            url: "<?php echo JURI::base();?>index.php?option=com_virtuemart&controller=cart&task=requestCity",
            data: {zip: st_zip}
        }).done(function(result) {
			jQuery("#st_city").val(result);
		})
    });
    
    var zip = jQuery("#city").val();
    if(zip < 4000) {
        jQuery("#ship1").val(2);
        var subtotal = Number(jQuery("#subtotal").val());
        if(subtotal <= 1000){
            var fee = 0;
        } else {
            var fee = 150;
        }
    } else {
        jQuery("#ship1").val(3);
        var fee = 350;
    }
    jQuery("#shipPriceLabel").html(fee+" DKK");
    jQuery("#shipFee").val(fee);
    changeDelivery(jQuery('input[name=virtuemart_shipmentmethod_id]:checked', '#checkoutForm').val());
    
    jQuery("#zip").blur(function(){
		var zip = jQuery("#zip").val();
		jQuery.ajax({
            type: "POST",
            url: "<?php echo JURI::base();?>index.php?option=com_virtuemart&controller=cart&task=requestCity",
            data: {zip: zip}
        }).done(function(result) {
            if(result){
                jQuery("#city").val(result);
                if(zip < 4000) {
                    jQuery("#ship1").val(2);
                    var subtotal = Number(jQuery("#subtotal").val());
                    if(subtotal <= 1000){
                        var fee = 0;
                    } else {
                        var fee = 150;
                    }
                } else {
                    jQuery("#ship1").val(3);
                    var fee = 350;
                }
                jQuery("#shipFee").val(fee);
                jQuery("#shipPriceLabel").html(fee+" DKK");
                jQuery("#shipPriceLabel1").html(fee+" DKK");
            }
		})
    });
    
    shipTo = function(){
        if(jQuery(".w_Address").css("display")=="none"){
            jQuery(".w_Address").html("");
            jQuery("#STsameAsBT").val("1");
        } else {
            var st_html = '<input class="input required" type="text" placeholder="Fornavn*" name="st_first_name" id="st_first_name"><input class="input required" type="text" placeholder="Efternavn*" name="st_last_name" id="st_last_name"><input class="input required" type="text" placeholder="Vejnavn*" name="st_street_name" id="st_street_name"><input class="input required" type="text" placeholder="Hus/gade nr.*" name="st_street_number" id="st_street_number"><input class="w75 fl input2 required" type="text" placeholder="Postnr.*" name="st_zip" id="st_zip"><input class="w203 fr input2" type="text" placeholder="Bynavn*" name="st_city" id="st_city"><input class="input required" type="text" placeholder="Telefon*" name="st_phone" id="st_phone">';
            jQuery(".w_Address").html(st_html);
            jQuery("#STsameAsBT").val("0");
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
			jQuery("#term").focus();
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
                    <input class="w75 fl input2 required" type="text" placeholder="Postnr. *" name="zip" id="zip">
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
                <li>
                    <input id="ship1" name="virtuemart_shipmentmethod_id" value="0" type="radio" checked onChange="changeDelivery(this.value)">
                    Leveret til døren for Fyn og Jylland: <span id="shipPriceLabel"></span>
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
                    <input name="method_id" value="1" type="radio" checked>
                    </span> <img src="templates/scheellarsen/img/cart2.png" alt=""> </p>
                <p> <span>
                    <input class="mt5" name="method_id" value="2" type="radio">
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
                        preg_match_all("#<span class=\"product-field-type-S\"> ([\w\W]*?)</span>#", $product->customfields, $tmp);
                        $select1 = $tmp[1][0];
                        $select2 = $tmp[1][1];
                        preg_match("#src=\"([\w\W]*?)\" alt#", $product->customfields, $tmp1);
                        $img = $tmp1[1];
                    ?>
                    <tr>
                        <td><div class="img_pro"> <img width="90" src="<?php echo $img;?>"> </div>
                            <div class="content_pro">
                                <h4><?php echo $product->product_name;?></h4>
                                <p>Vare-nummer: <?php echo $product->product_sku;?></p>
                                <?php if($select1){?><p><?php echo $select1;?></p><?php }?>
                                <?php if($select2){?><p><?php echo $select2;?></p><?php }?>
                            </div></td>
                        <td><p><?php echo $product->quantity;?></p></td>
                        <td><p><?php echo $product->prices['salesPrice'];?> DKK </p></td>
                        <td><p><?php echo $product->prices['salesPrice']*$product->quantity;?> DKK </p></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td colspan="4" class="cf9f7f3"><table class="sub_order_Summary">
                                <tr>
                                    <td colspan="2">Subtotal: </td>
                                    <td colspan="2" width="30%"> <?php echo number_format($cart->pricesUnformatted['billTotal'],2,',','.').' DKK'; ?> </td>
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
                                    <td colspan="4">Rabat 10% ved afhentning</td>
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
        <a class="fl btnVarekurv hover" href="cart.php">Til Varekurv</a> 
        <!--<a class="fr btnBetaling hover" href="thanks.php">til Betaling</a>-->
        <button type="submit" class="validate fr btnBetaling hover" style="cursor:pointer; border:none;">Til Betaling</button>
        
        <input type="hidden" id="subtotal" value="<?php echo $cart->pricesUnformatted['salesPrice']?>" />
        <input type="hidden" id="shipFee" value=""/>
        <input type="hidden" id="type" value=""/>
        
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
<?php return;?>
<div id="checkout-page">
    <form method="post" id="checkoutForm" name="userForm" class="form-validate" style="padding:0;border-top:none">
        <div class="w-checkout">
            <div class="checkout-content">
                <div class="nav-left">
                    <h2>
                        <div><img src="<?php echo JURI::base()."templates/".$template?>/img/step1.png" width="24" height="24" alt=""></div>
                        Kundeoplysninger</h2>
                    <div class="frm-cus-info">
                        <?php if($user->guest == 1){?>
                        <div>
                            <label style="font-size:12px;">Allerede kunde? <a href="#" data-reveal-id="myModal">Tryk her >></a></label>
                        </div>
                        <div>
                            <label>Vælg kundetype *</label>
                        </div>
                        <div>
                            <?php //$this->userId?>
                            <select name="mwctype" id="choicemaker">
                                <option value="1">Privat</option>
                                <option value="2">Erhverv</option>
                                <option value="3">Offentlig instans</option>
                            </select>
                        </div>
                        <div id="w-privat">
                            <div id="companyadd"></div>
                            <div>
                                <input value="E-mail *" name="email" type="text" id="email" />
                            </div>
                            <div id="publicadd"></div>
                            <div>
                                <input type="text" value="Fornavn *" name="firstname" id="firstname"  />
                            </div>
                            <div>
                                <input type="text" value="Efternavn *" name="lastname" id="lastname" />
                            </div>
                            <div>
                                <input type="text" value="Adresse *" name="address" id="address" />
                            </div>
                            <div>
                                <input type="text" value="Postnr. *" name="zipcode" id="zipcode" maxlength="4" />
                            </div>
                            <div>
                                <input type="text" value="By *" name="city" id="city" />
                            </div>
                            <div>
                                <input type="text" value="Telefon *" name="phone" id="phone" />
                            </div>
                        </div>
                        <div>* Skal udfyldes</div>
                        <?php } else {?>
                        <div>
                            <label class="lb">Kundetype:</label>
                            <span>
                            <?php if($user->mwctype == 1) echo "Privat"; else if($user->mwctype == 2) echo "Erhverv"; else echo "Offentlig instans";?>
                            </span></div>
                        <div>
                            <label class="lb">E-mail:</label>
                            <span><?php echo $user->email;?></span></div>
                        <?php if($user->mwctype == 3){?>
                        <div>
                            <input type="text" value="<?php echo $user->ean;?>" name="ean" id="ean" maxlength="13" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->authority;?>" name="authority" id="authority" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->order;?>" name="order" id="order" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->person;?>" name="person" id="person" disabled="disabled" />
                        </div>
                        <?php } else if($user->mwctype == 2){?>
                        <div>
                            <input type="text" value="<?php echo $user->company;?>" name="company" id="company" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->cvr;?>" name="cvr" id="cvr" />
                        </div>
                        <?php }?>
                        <div>
                            <input type="text" value="<?php echo $user->firstname;?>" name="firstname" id="firstname" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->lastname;?>" name="lastname" id="lastname" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->address;?>" name="address" id="address" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->zipcode;?>" name="zipcode" id="zipcode" maxlength="4" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->city;?>" name="city" id="city" disabled="disabled" />
                        </div>
                        <div>
                            <input type="text" value="<?php echo $user->phone;?>" name="phone" id="phone" disabled="disabled" />
                        </div>
                        <?php }?>
                        <?php if($user->guest == 1){?>
                        <div class="bnt-create-acc" style=""></div>
                        <div class="w-create-acc">
                            <label>Kodeord (skal være min 4 tegn) *</label>
                            <div>
                                <input type="password" minlength="4" name="password1" id="password1">
                            </div>
                            <label>Bekræft kodeord *</label>
                            <div>
                                <input type="password" name="password2" id="password2">
                            </div>
                            <label>Bemærk! E-mail bruges til login</label>
                        </div>
                        <?php }
if(!$nodelivery){
?>
                        <div class="bnt-another-add" style=""></div>
                        <div class="w-another-add" style="display: none;">
                            <div>
                                <input type="text" name="firstname2" id="firstname2" value="Fornavn *">
                            </div>
                            <div>
                                <input type="text" name="lastname2" id="lastname2" value="Efternavn *">
                            </div>
                            <div>
                                <input type="text" name="address2" id="address2" value="Adresse *">
                            </div>
                            <div>
                                <input type="text" name="zipcode2" id="zipcode2" value="Postnr. *" maxlength="4">
                            </div>
                            <div>
                                <input type="text" name="city2" id="city2" value="By *">
                            </div>
                            <div>
                                <input type="text" name="phone2" id="phone2" value="Telefon *">
                            </div>
                        </div>
                        <?php }?>
                        <script type="text/javascript">
jQuery(document).ready(function(){

	var private = '';
	var company = '<div><input type="text" value="Firmanavn" name="company" id="company" /></div><div><input type="text" value="CVR-nr." name="cvr" id="cvr" /></div>';
	var public = '<div><input type="text" value="EAN-nr. *" name="ean" id="ean" maxlength="13" /></div><div><input type="text" value="Myndighed/Institution *" name="authority" id="authority" /></div><div><input type="text" value="Ordre- el. rekvisitionsnr. *" name="order" id="order" /></div><div><input type="text" value="Personreference *" name="person" id="person" />';
	jQuery("#choicemaker").change(function () {

		value = jQuery("#choicemaker").val();
		  // You can also use $("#ChoiceMaker").val(); and change the case 0,1,2: to the values of the html select options elements

		if(value == 1){
			if(jQuery("#ean").val()){
				jQuery("#ean").rules("remove");
				jQuery("#authority").rules("remove");
				jQuery("#order").rules("remove");
				jQuery("#person").rules("remove");
			}
			jQuery("#companyadd").html('');
			jQuery("#publicadd").html('');
			focusInput();


		} else if(value == 2){
			if(jQuery("#ean").val()){
				jQuery("#ean").rules("remove");
				jQuery("#authority").rules("remove");
				jQuery("#order").rules("remove");
				jQuery("#person").rules("remove");
			}
			jQuery("#companyadd").html(company);
			jQuery("#publicadd").html('');
			focusInput();


		} else {
			jQuery("#companyadd").html('');
			jQuery("#publicadd").html(public);
			focusInput();

			var newRule = {
				requireDefault: true,
				required: true,
				messages: {
					requireDefault: "",
					required: ""
				}
			};
			jQuery("#ean").rules("add", newRule);
			jQuery("#authority").rules("add", newRule);
			jQuery("#order").rules("add", newRule);
			jQuery("#person").rules("add", newRule);
		}

	});
	jQuery("#email").bind("blur",function(){
		jQuery("#username1").val(jQuery("#email").val());
	});
	jQuery("#lastname").bind("blur",function(){
		jQuery("#name").val(jQuery("#firstname").val()+' '+jQuery("#lastname").val());
	});
	jQuery('.bnt-create-acc').click(function(){
		jQuery(".w-create-acc").slideToggle();
	});

	changeDelivery = function(val){
		if(val == 1){
			jQuery("#shipPrice").html("0,00 DKK");
			var total = formatMoney(parseFloat(jQuery("#subtotal").val()));
			jQuery("#payTotal").html(total+" DKK");
			jQuery("#shippingfee").val(0);
			jQuery("#location").removeAttr("disabled", "disabled");

            jQuery("#location_area").html("");
            generateShop();
		} else if(val == 2){
			jQuery("#shipPrice").html("<?php echo $fee;?>,00 DKK");
			var total = formatMoney(parseFloat(Number(jQuery("#subtotal").val()) + Number(<?php echo $fee;?>)));
			jQuery("#payTotal").html(total+" DKK");
			jQuery("#shippingfee").val(<?php echo $fee;?>);
			jQuery("#location").attr( "disabled", "disabled" );
            
            jQuery("#location_area").html("");
            jQuery("#location_area1").html("");
		} else {
            jQuery("#shipPrice").html("<?php echo $fee1;?>,00 DKK");
			var total = formatMoney(parseFloat(Number(jQuery("#subtotal").val()) + Number(<?php echo $fee1;?>)));
			jQuery("#payTotal").html(total+" DKK");
			jQuery("#shippingfee").val(<?php echo $fee1;?>);
			jQuery("#location").attr( "disabled", "disabled" );
            
            jQuery("#location_area1").html("");
            generatePickup(jQuery("#zipcode").val());
        }
	}

	formatMoney = function(num){
		var p = num.toFixed(2).split(".");
		return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
			return  num + (i && !(i % 3) ? "." : "") + acc;
		}, "") + "," + p[1];
	}
	//isST process
    
    jQuery("#zipcode").blur(function(){
        if(jQuery("#ship3").prop("checked")) {
            generatePickup(jQuery("#zipcode").val());
        }
    });
    
    generateShop = function(){
        html = '<input name="location" type="radio" value="Amager Isenkram - Amager Centret butik 139, Reberbanegade 3, 2300 København S" checked /><span> Amager Isenkram - Amager Centret butik 139, Reberbanegade 3, 2300 København S</span><br/><input name="location" type="radio" value="Gør Det Selv Shop - Amager Centret butik 132, Reberbanegade 3, 2300 København S" /><span> Gør Det Selv Shop - Amager Centret butik 132, Reberbanegade 3, 2300 København S</span><br/><input name="location" type="radio" value="Tårnby Torv Isenkram - Tårnby torv 9, 2770 Kastrup" /><span> Tårnby Torv Isenkram - Tårnby torv 9, 2770 Kastrup</span><br/><input name="location" type="radio" value="Spinderiet Isenkram - Valby Torvegade 18, 2500 Valby" /><span> Spinderiet Isenkram - Valby Torvegade 18, 2500 Valby</span><br/><input name="location" type="radio" value="City 2 Isenkram - Plan 2, City 2, 2630 Taastrup" /><span> City 2 Isenkram - Plan 2, City 2, 2630 Taastrup</span>';
        jQuery("#location_area1").html(html);
    }
    
    generatePickup = function(postcode){
        var loader = '<img src="<?php echo JURI::base() ;?>/images/zoomloader.gif"/>';
		jQuery('#location_area').html(loader);
        var html = '';
       
        jQuery.ajax({
            type: "POST",
            url: "<?php echo JURI::base();?>index.php?option=com_virtuemart&controller=cart&task=requestPostdanmark",
            data: {post: postcode}
        }).done(function(result) {
            if(result){
                var data = jQuery.parseJSON(result);
                var shops = data.servicePointInformationResponse.servicePoints;
                var length = shops.length;
                for(var i =0; i<length; i++){
                    var servicePointId = shops[i].servicePointId;
                    if(i==0){
                        var check = 'checked';
                        setShopId(servicePointId);
                    } else {
                        check = 'servicePointId';
                    }
                 
                    var company = shops[i].name;
                    var streetNumber = shops[i].deliveryAddress.streetNumber;
                    var streetName = shops[i].deliveryAddress.streetName;
                    var zipcode = shops[i].deliveryAddress.postalCode;
                    var city = shops[i].deliveryAddress.city;
                    var txt = company +' - '+ streetNumber + ' ' + streetName + ', ' + zipcode + ' ' + city;
                    html += '<input name="location" type="radio" value="'+txt+'" '+check+' onclick=setShopId('+servicePointId+') /><span> '+txt+'</span><br/>';
                }
            }
            jQuery("#location_area").html(html);
        });
        
    }
    
    setShopId = function(shopid){
        jQuery('#shop_id').val(shopid);
    }
<?php
if(!$nodelivery){
?>
	STo = function(){
		var newRule = {
				requireDefault: true,
				required: true,
				messages: {
					requireDefault: "",
					required: ""
				}
			};
		jQuery("#firstname2").rules("add", newRule);
		jQuery("#lastname2").rules("add", newRule);
		jQuery("#zipcode2").rules("add", {
				requireDefault: true,
				required: true,
				number: true,
				maxlength: 4,
				messages: {
					requireDefault: "",
					required: "",
					number: "",
					maxlength: ""
				}
			});
		jQuery("#address2").rules("add", newRule);
		jQuery("#city2").rules("add", newRule);
		jQuery("#phone2").rules("add", newRule);
	}
	STx = function(){
		jQuery("#firstname2").rules("remove");
		jQuery("#lastname2").rules("remove");
		jQuery("#zipcode2").rules("remove");
		jQuery("#address2").rules("remove");
		jQuery("#city2").rules("remove");
		jQuery("#phone2").rules("remove");
	}

	if(jQuery(".w-another-add").css("display")!="none")
		STo();

	jQuery('.bnt-another-add').click(function(){
		if(jQuery(".w-another-add").css("display")=="block"){
			STx();
			jQuery(".w-another-add").slideToggle();
			jQuery("#STsameAsBT").val("1");


			jQuery("#ship1").removeAttr("disabled");
		}else{
			jQuery(".w-another-add").slideToggle();
			STo();
			jQuery("#STsameAsBT").val("0");

			jQuery("#ship2").attr("checked", "checked");
			jQuery("#ship1").attr("disabled", "disabled");
		}
	});
<?php
}else echo 'jQuery("#ship1").click();';
///
?>

	jQuery("#checkoutBtn").bind("click",function(){
		if(jQuery("#tosAccepted").is(':checked')){
			jQuery("#checkoutForm").submit();
		} else {
			alert('Bedes acceptere vilkår og betingelser');
			jQuery("#term").focus();
			return false;
		}
	});
});
</script>
                        <input type="hidden" id="name" name="name" value=""/>
                        <input type="hidden" id="username1" name="username1" value=""/>
                        <input type="hidden" id="userid" name="userid" value="<?php echo $user->id;?>"/>
                        <input type="hidden" name="option" value="com_virtuemart"/>
                        <input type="hidden" name="view" value="cart"/>
                        <input type="hidden" name="task" value="confirm"/>
                        <input type='hidden' id='STsameAsBT' name='STsameAsBT' value='1'/>
                        <?php
echo JHTML::_ ('form.token');
?>
                        
                        <!--temp html--> 
                        
                        <!--//temp html--> 
                        
                    </div>
                </div>
                <div class="nav-right" name="f2" action="" method="get">
                    <div class="w-step2-3">
                        <h2>
                            <div><img src="<?php echo JURI::base()."templates/".$template?>/img/step2.png" width="24" height="24" alt=""></div>
                            Levering</h2>
                        <?php
					$model		= VmModel::getModel("shipmentmethod");
					$shipment	= $model->getShipments();
					?>
                        <?php echo $shipment[0]->shipment_desc;?>
                        <?php if(!$nodelivery){?>
                        <div>
                            <input name="virtuemart_shipmentmethod_id" type="radio" value="2" checked="checked" onchange="changeDelivery(this.value)" id="ship2" />
                            <span>Post Danmark - Med omdeling <?php echo number_format($fee,2,',','.').' DKK'; ?></span> </div>
                        <div>
                            <input name="virtuemart_shipmentmethod_id" type="radio" value="3" onchange="changeDelivery(this.value)" id="ship3" />
                            <span>Post Danmark - Uden omdeling/Døgnpost <?php echo number_format($fee1,2,',','.').' DKK'; ?></span> </div>
                        <div id="location_area" style="margin-left:10px;"></div>
                        <?php }?>
                        <div>
                            <input name="virtuemart_shipmentmethod_id" type="radio" value="1" onchange="changeDelivery(this.value)" id="ship1" />
                            <span>Afhentning 0,00 DKK</span> </div>
                        <div id="location_area1" style="margin-left:10px;"></div>
                    </div>
                    <div class="step4" style="border-bottom: 1px solid #CACACA; padding-bottom:10px;">
                        <h2>
                            <div><img width="24" height="24" alt="" src="templates/amager/img/step3.png"></div>
                            Betalingsmetode</h2>
                        <p>Du kan betale med følgende betalingskort: </p>
                        <ul>
                            <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-dk.png"></a></li>
                            <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-mastercard.png"></a></li>
                            <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-card2.png"></a></li>
                            <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-visa.png"></a></li>
                            <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/visa2.png"></a></li>
                            <li><a href="#"><img width="95" height="19" alt="" src="templates/amager/img/icon-ean.png"></a></li>
                        </ul>
                    </div>
                    <?php
			$currencyDisplay = CurrencyDisplay::getInstance($cart->pricesCurrency);
			?>
                    <input type="hidden" id="shop_id" name="shop_id" value="" />
                    <input type="hidden" id="subtotal" value="<?php echo $cart->pricesUnformatted['salesPrice']?>" />
                    <div class="step4">
                        <h2>
                            <div><img width="24" height="24" alt="" src="templates/amager/img/step4.png"></div>
                            Ordreoversigt</h2>
                        <div class="w-list-pro">
                            <div class="w-list-pro-title">
                                <div class="name-pro">
                                    <p>Produkt</p>
                                </div>
                                <!--.name-pro-->
                                <div class="no-pro">
                                    <p>Vare-nr</p>
                                </div>
                                <!--.no-pro-->
                                <div class="num-pro">
                                    <p>Antal</p>
                                </div>
                                <!--.num-pro-->
                                <div style=" width: 100px; float: left; text-align:center;">
                                    <p>Pris pr. enhed</p>
                                </div>
                                <div class="total-prices">
                                    <p>Pris i alt</p>
                                </div>
                                <!--.total-prices--> 
                            </div>
                            <!--.w-list-pro-title-->
                            
                            <?php foreach($cart->products as $pkey => $item){?>
                            <div class="list-pro-item">
                                <div class="col1-">
                                    <div class="list-pro-item-img"><img width="89" height="72" alt="" src="<?php echo $item->image->file_url_thumb;?>"></div>
                                    <!--.list-pro-item-img-->
                                    <div class="list-pro-item-content">
                                        <p><?php echo $item->product_name;?><br>
                                            <?php echo $item->customfields;?></p>
                                    </div>
                                    <!--.list-pro-item-content--> 
                                </div>
                                <!--.col1- -->
                                <div class="col2-">
                                    <p><?php echo $item->product_sku;?></p>
                                </div>
                                <!--.col2- -->
                                <div class="col3-">
                                    <p><?php echo $item->quantity;?></p>
                                </div>
                                <!--.col3- -->
                                <div class="col4-2">
                                    <p><?php echo $currencyDisplay->priceDisplay($cart->pricesUnformatted[$pkey]['salesPrice'],0,1,false,-1);?></p>
                                </div>
                                <div class="col4-">
                                    <p> <?php echo $currencyDisplay->priceDisplay($cart->pricesUnformatted[$pkey]['salesPrice'],0,$item->quantity,false,-1);?> </p>
                                </div>
                                <!--.col4- --> 
                            </div>
                            <!--.list-pro-item-->
                            <?php }?>
                        </div>
                        <!--.w-list-pro-->
                        
                        <div class="checkout-payment">
                            <div class="checkout-payment-left">
                                <div class="func">
                                    <div class="w-135"> <img width="17" height="16" alt="" src="templates/amager/img/phone.png"> <span>3250 3611</span> </div>
                                    <!--.w-135-->
                                    <div class="w-135"> <img width="14" height="17" alt="" src="templates/amager/img/times.png"> <span>Hurtig levering</span> </div>
                                    <!--.w-135-->
                                    <div class="w-135"> <img width="17" height="14" alt="" src="templates/amager/img/truck.png"> <span>Gratis fragt ved køb over 500 DKK</span> </div>
                                    <!--.w-135-->
                                    <div class="clear"></div>
                                    <div class="w-135"> <img width="15" height="16" alt="" src="templates/amager/img/sticker.png"> <span>Sikker betaling</span> </div>
                                    <!--.w-135-->
                                    <div class="w-135"> <img width="13" height="16" alt="" src="templates/amager/img/star.png"> <span>14 dages returret</span> </div>
                                    <!--.w-135-->
                                    <div class="w-135"> <img width="17" height="16" alt="" src="templates/amager/img/sitting.png"> <span>2 års reklamationsret</span> </div>
                                    <!--.w-135--> 
                                </div>
                                <!--.func-->
                                
                                <div class="checkout-payment-bot">
                                    <h3 style="margin-bottom:3px; font-weight:bold;">Levering til nærmeste Postudleveringssted</h3>
                                    <h3>Du kan betale med følgende betalingskort: </h3>
                                    <ul>
                                        <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-dk.png"></a></li>
                                        <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-mastercard.png"></a></li>
                                        <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-card2.png"></a></li>
                                        <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/icon-visa.png"></a></li>
                                        <li><a href="#"><img width="37" height="19" alt="" src="templates/amager/img/visa2.png"></a></li>
                                        <li><a href="#"><img width="95" height="19" alt="" src="templates/amager/img/icon-ean.png"></a></li>
                                    </ul>
                                </div>
                                <!--.checkout-payment-bot--> 
                                
                            </div>
                            <!--.checkout-payment-left-->
                            
                            <div class="checkout-payment-right">
                                <div class="gray">
                                    <label>Forsendelse:</label>
                                    <span id="shipPrice"><?php echo number_format($fee,2,',','.').' DKK'; ?></span> </div>
                                <div class="m-20">
                                    <label>Subtotal inkl. moms:</label>
                                    <span><?php echo number_format($cart->pricesUnformatted['salesPrice'],2,',','.').' DKK'; ?></span> </div>
                                <div class="m-20">
                                    <label>Heraf moms:</label>
                                    <span><?php echo number_format($cart->pricesUnformatted['salesPrice']*0.2,2,',','.');?> DKK</span> </div>
                                <?php if (!empty($cart->cartData['couponCode'])) { ?>
                                <div class="m-20">
                                    <label><?php echo JText::_('COM_VIRTUEMART_COUPON_DISCOUNT');?>:</label>
                                    <span><?php echo number_format ($cart->pricesUnformatted['salesPriceCoupon'],2,',','.').' DKK';?></span> </div>
                                <?php } ?>
                                <div class="n-b-b3 m-20 black">
                                    <label>TOTAL INKL. MOMS:</label>
                                    <span id="payTotal"><?php echo number_format($cart->pricesUnformatted['billTotal']+$fee,2,',','.').' DKK'; ?></span> </div>
                            </div>
                            <!--.checkout-payment-right--> 
                        </div>
                        <!--.checkout-payment--> 
                    </div>
                </div>
            </div>
            <div class="w-payment">
                <div>
                    <input name="tosAccepted" id="tosAccepted" type="checkbox" value="1">
                </div>
                <p>Jeg accepterer <a href="index.php?option=com_content&view=article&id=1&Itemid=119" target="_blank">handelsbetingelser</a></p>
                <div class="bnt-payment"> <a href="javascript:void(0)" id="checkoutBtn">betaling</a> </div>
            </div>
            <div class="bnt-edit-order"> <a href="index.php?option=com_virtuemart&view=cart">Rediger din ordre</a> </div>
        </div>
    </form>
    <div class="frm_coupon" style="left: 130px; position: relative;">
        <?php if($cart->products){?>
        <?php if (empty($cart->cartData['couponCode'])) { ?>
        <?php
					if (VmConfig::get ('coupons_enable')) {
						//if (!empty($this->layoutName) && $this->layoutName == 'default') {
							echo $this->loadTemplate ('coupon');
						//} 
					}
			?>
        <?php }
        
			}
        
        ?>
    </div>
</div>
