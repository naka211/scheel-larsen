<?php
/**
 *
 * Layout for the shopper mail, when he confirmed an ordner
 *
 * The addresses are reachable with $this->BTaddress, take a look for an exampel at shopper_adresses.php
 *
 * With $this->orderDetails['shipmentName'] or paymentName, you get the name of the used paymentmethod/shippmentmethod
 *
 * In the array order you have details and items ($this->orderDetails['details']), the items gather the products, but that is done directly from the cart data
 *
 * $this->orderDetails['details'] contains the raw address data (use the formatted ones, like BTaddress). Interesting informatin here is,
 * order_number ($this->orderDetails['details']['BT']->order_number), order_pass, coupon_code, order_status, order_status_name,
 * user_currency_rate, created_on, customer_note, ip_address
 *
 * @package	VirtueMart
 * @subpackage Cart
 * @author Max Milbers, Valerie Isaksen
 *
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 *
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
//print_r($this->orderDetails['details']['BT']);exit;
if($this->orderDetails['details']['BT']->address_type_name == 1 ){
	$type = "Privat";
} else if($this->orderDetails['details']['BT']->address_type_name == 2 ){
	$type = "Erhverv";
} else {
	$type = "Offentlig instans";
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<body style="padding: 0; margin: 0px; background: #cacaca; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 13px;">
	<table width="940" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto; padding: 15px; background: #fff; border: 1px solid #646464;">
    <tr style="background: #2E3033;">
    	<td style="text-align: center; border-bottom: 1px dotted #CACACA; padding: 10px 0;" colspan="4"><img src="<?php echo JURI::base();?>templates/amager/img/logo.png" width="196" height="97" /></td>
    </tr>
  <tr>
    <td colspan="4"><h2 style="color: #00b2ea; font-size: 20px; border-bottom: 1px dotted #CACACA; padding: 10px 0; margin: 0;">ORDREOVERSIGT</h2></td>
  </tr>
  <tr height="30">
  	<td><strong>Ordrenummer:</strong></td>
    <td width="305"><strong><?php echo $this->orderDetails['details']['BT']->order_number;?></strong></td>
  </tr>
  <tr height="30">
  	<td width="107"><strong>Kundetype:</strong></td>
    <td width="305"><strong><?php echo $type;?></strong></td>
  </tr>
  <tr height="30">
  	<td><strong>E-mail:</strong></td>
    <td width="305"><strong><?php echo $this->orderDetails['details']['BT']->email;?></strong></td>
  </tr>
  <tr height="30">
  	<td colspan="2">
   	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" height="30"><strong>Kundeoplysninger:</strong></td>
          </tr>
          <?php if($this->orderDetails['details']['BT']->address_type_name == 2){?>
             <tr>
                <td width="50%" height="30">Firmanavn:</td>
                <td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->company;?></td>
              </tr>
               <tr>
                <td width="50%" height="30">CVR-nr.:</td>
                <td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->cvr;?></td>
              </tr>
            <?php } else if($this->orderDetails['details']['BT']->address_type_name == 3){?>
            <tr>
                <td width="50%" height="30">EAN-nr.:</td>
                <td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->ean;?></td>
              </tr>
               <tr>
                <td width="50%" height="30">Myndighed/Institution:</td>
                <td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->authority;?></td>
              </tr>
              <tr>
                <td width="50%" height="30">Ordre- el. rekvisitionsnr.:</td>
                <td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->order1;?></td>
              </tr>
               <tr>
                <td width="50%" height="30">Personreference:</td>
                <td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->person;?></td>
              </tr>
            <?php }?>
          <tr>
            <td width="50%" height="30">Fornavn:</td>
            <td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->first_name;?></td>
          </tr>
          <tr>
            <td height="30">Efternavn:</td>
            <td height="30"><?php echo $this->orderDetails['details']['BT']->last_name;?></td>
          </tr>
          <tr>
            <td height="30">Adresse:</td>
            <td height="30"><?php echo $this->orderDetails['details']['BT']->address_1;?></td>
          </tr>
          <tr>
            <td height="30">Postnr.:</td>
            <td height="30"><?php echo $this->orderDetails['details']['BT']->zip;?></td>
          </tr>
          <tr>
            <td height="30">By:</td>
            <td height="30"><?php echo $this->orderDetails['details']['BT']->city;?></td>
          </tr>
          <tr>
            <td height="30">Telefon:</td>
            <td height="30"><?php echo $this->orderDetails['details']['BT']->phone_1;?></td>
          </tr>
        </table>

    </td>
    <td colspan="2" width="558" valign="top">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" height="30"><strong>Leveringsadresse:</strong></td>
            </tr>
          <tr>
            <td width="50%" height="30">Fornavn:</td>
            <td width="50%" height="30"><?php echo $this->orderDetails['details']['ST']->first_name;?></td>
          </tr>
          <tr>
            <td height="30">Efternavn:</td>
            <td height="30"><?php echo $this->orderDetails['details']['ST']->last_name;?></td>
          </tr>
          <tr>
            <td height="30">Adresse:</td>
            <td height="30"><?php echo $this->orderDetails['details']['ST']->address_1;?></td>
          </tr>
          <tr>
            <td height="30">Postnr.:</td>
            <td height="30"><?php echo $this->orderDetails['details']['ST']->zip;?></td>
          </tr>
          <tr>
            <td height="30">By:</td>
            <td height="30"><?php echo $this->orderDetails['details']['ST']->city;?></td>
          </tr>
          <tr>
            <td height="30">Telefon:</td>
            <td height="30"><?php echo $this->orderDetails['details']['ST']->phone_1;?></td>
          </tr>
        </table>

    </td>
  </tr>
  <tr height="0" style="color: #3A3A3A;">
  	
  </tr>
  <tr>
  	<td colspan="2">
   	<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td height="30"> <strong>Betaling: </strong></td>
  </tr>
  <tr>
    <td valign="top" height="30">Kortbetaling</td>
  </tr>
</table>

    </td>
    <td colspan="2">
    	<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td height="30"><strong>Leveringsservice:</strong></td>
  </tr>
  <tr>
    <td valign="top" height="30"><?php if($this->orderDetails['details']['BT']->address_2){?>Afhentning: <?php echo $this->orderDetails['details']['BT']->address_2;?><?php }else{?>Forsendelse<?php }?></td>
  </tr>
</table>

    </td>
  </tr>
  <tr height="10">
  	<td colspan="4">
   	  <table width="970" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #CACACA;">
  <tr align="right" style="background: #EFEFEF; padding: 0 10px; text-align: center;">
    <td height="50" width="481" style="padding: 0 10px; text-align: left;">Produkt</td>
    <td width="155">Vare-nr</td>
    <td width="40">Antal</td>
    <td width="140">Pris pr. enhed</td>
    <td align="right" width="152" style="padding: 0 10px;">Pris i alt</td>
  </tr>
  <?php foreach($this->orderDetails['items'] as $item){?>
  <tr height="30" style="padding: 0 10px; text-align: center;">
    <td style="padding: 0 10px; border-bottom: 1px solid #CACACA; color: #3A3A3A; text-align: left; "><?php echo $item->order_item_name;?></td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A; text-align: center;"><?php echo $item->order_item_sku;?></td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;"><?php echo $item->product_quantity;?></td>
    <td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;"><?php echo number_format($item->product_final_price,2,',','.');?> DKK</td>
    <td style="border-bottom: 1px solid #CACACA; text-align: right; padding: 0 10px; color: #3A3A3A;"><?php echo number_format($item->product_subtotal_with_tax,2,',','.');?> DKK</td>
  </tr>
  <?php }?>
  <tr height="30" style="padding: 0 10px;">
    <td style="text-transform: uppercase; color: red; padding: 0 10px; font-size: 20px;"><strong><?php if($this->orderDetails['details']['BT']->address_2){?>Afhentning: <?php echo $this->orderDetails['details']['BT']->address_2;?><?php }else{if($this->orderDetails['details']['BT']->address_type_name != 3) echo 'Forsendelse';else echo 'E-faktura/Nem-handel fakturablanket'; }?></strong></td>
    <td colspan="2"><table width="260" border="0" cellpadding="0" cellspacing="0" align="right">
      <tr height="30" style="padding: 0 10px;">
        <td width="260" style="color: #3A3A3A;">Forsendelse:</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="color: #3A3A3A;">Subtotal inkl. moms:</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="color: #3A3A3A;">Heraf moms:</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td><strong>TOTAL INKL. MOMS:</strong></td>
      </tr>
    </table></td>
    <td colspan="2"><table width="136" border="0" cellpadding="0" cellspacing="0" align="right" style="text-align: right;" >
      <tr height="30" style="padding: 0 10px;">
        <td width="146" style="padding: 0 10px; color: #3A3A3A;"><?php echo number_format($this->orderDetails['details']['BT']->order_shipment,2,',','.');?> DKK</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="padding: 0 10px; color: #3A3A3A;" ><?php echo number_format($this->orderDetails['details']['BT']->order_salesPrice,2,',','.');?> DKK</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="padding: 0 10px; color: #3A3A3A;"><?php echo number_format($this->orderDetails['details']['BT']->order_salesPrice*0.2,2,',','.');?> DKK</td>
      </tr>
      <tr height="30" style="padding: 0 10px;">
        <td style="padding: 0 10px;"><strong><?php echo number_format($this->orderDetails['details']['BT']->order_total,2,',','.');?> DKK</strong></td>
      </tr>
    </table></td>
    </tr>
</table>

    </td>
  </tr>
  <tr><td height="30"></td></tr>
  <tr style="background: #2E3033;margin-top: 20px; color: #fff;">
  	<td colspan="4" style="padding: 30px 10px; line-height: 1.8em;">
        Tårnby Torv Isenkram
        Tårnby Torv 9 2770 Kastrup<br />   
        Tlf: 3250 3611 - Fax: 3252 1536<br />
        <a style="color: #fff; text-decoration: none;" href="mailto:info@amagerisenkram.dk">info@amagerisenkram.dk</a>
    </td>
  </tr>
</table>

</body>
</html>