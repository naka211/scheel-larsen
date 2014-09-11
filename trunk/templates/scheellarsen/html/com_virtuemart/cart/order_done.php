<?php
defined('_JEXEC') or die('');

/**
*
* Template for the shopping cart
*
* @package	VirtueMart
* @subpackage Cart
* @author Max Milbers
*
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/


/*if ($this->display_title) {
	echo "<h3>".JText::_('COM_VIRTUEMART_CART_ORDERDONE_THANK_YOU')."</h3>";
}
	echo $this->html;*/

$admin = JFactory::getUser('62');
$cart = $this->cart;
//print_r($cart);
/*if(!class_exists('shopFunctionsF')) require(JPATH_VM_SITE.DS.'helpers'.DS.'shopfunctionsf.php');
$config =& JFactory::getConfig();
$fromName = $config->getValue( 'config.sitename' );
$fromMail = $config->getValue( 'config.mailfrom' );
$vars['user'] = array('name' => $fromName, 'email' => $fromMail);
$vars['vendor'] = array('vendor_store_name' => $fromName );*/

$db = JFactory::getDBO();
$orderid = JRequest::getVar('virtuemart_order_id');

$query = "SELECT virtuemart_order_id, order_shipment, order_total, order_salesPrice, order_number FROM #__virtuemart_orders WHERE virtuemart_order_id = ".$orderid;
$db->setQuery($query);
$order_info = $db->loadObject();

if(!class_exists('VmModel'))require(JPATH_VM_ADMINISTRATOR.DS.'helpers'.DS.'vmmodel.php');
$orderModel=VmModel::getModel('orders');
$order = $orderModel->getOrder($orderid);
//print_r($order['items'][0]->virtuemart_category_id);exit;
/*$vars['orderDetails']=$order;
shopFunctionsF::renderMail('invoice', $admin->email, $vars);
shopFunctionsF::renderMail('invoice', $order->email, $vars);*/

if (!class_exists('VirtueMartModelOrders')) require( JPATH_VM_ADMINISTRATOR . DS . 'models' . DS . 'orders.php' );
$modelOrder = VmModel::getModel('orders');	
$order1 = array();		
$order1['order_status'] = "C";
$order1['customer_notified'] =1;
$modelOrder->updateStatusForOneOrder($orderid, $order1, true);

$query = "SELECT * FROM #__virtuemart_order_userinfos WHERE address_type = 'BT' AND virtuemart_order_id = ".$order_info->virtuemart_order_id;
$db->setQuery($query);
$BT_info = $db->loadObject();

$query = "SELECT * FROM #__virtuemart_order_userinfos WHERE address_type = 'ST' AND virtuemart_order_id = ".$order_info->virtuemart_order_id;
$db->setQuery($query);
$ST_info = $db->loadObject();

if(!$ST_info){
    $ST_info = $BT_info;
}

if($BT_info->address_type_name == 1 ){
	$type = "Privat";
} else if($BT_info->address_type_name == 2 ){
	$type = "Erhverv";
} else {
	$type = "Offentlig instans";
}

if($order['items'][0]->virtuemart_category_id == 14){
    $isGiftCard = true;
} else {
    $isGiftCard = false;
}
?>
<style>
.costumTitle{
    display:none;
}
</style>
<div class="template2">
  <div class="thanks_page clearfix">
    <h2 class="c669903">Indkøbskurven</h2>
    <div class="top_info">
      <p><strong>Ordrenummer: <?php echo $order['details']['BT']->order_number;?></strong><br>
        En ordrebekræftelse vil blive sendt til <strong><a href="mailto:<?php echo $order['details']['BT']->email;?>"><?php echo $order['details']['BT']->email;?></a></strong><br>
        Har du spørgsmål, kan du kontakte os på +45 4162 8001</p>
    </div>
    <div class="thanks_info clearfix">
      <div class="w460 fl">
        <p class="bold">Kundeoplysninger:</p>
        <p>
          <label for="">Kundetype:</label>
          <span><?php echo $type;?></p>
		<?php if($BT_info->company){?>
        <label for="">Firmanavn:</label><span><?php echo $BT_info->company;?></span><br>
        <label for="">CVR-nr.:</label><span><?php echo $BT_info->cvr;?></span><br>
        <?php } else if($BT_info->ean){?>
        <p><label for="">EAN-nr.:</label><span><?php echo $BT_info->ean;?></p>
        <p><label for="">Myndighed/Institution:</label><span><?php echo $BT_info->authority;?></p>
        <p><label for="">Ordre- el. rekvisitionsnr.:</label><span><?php echo $BT_info->order1;?></p>
        <p><label for="">Personreference:</label><span><?php echo $BT_info->person;?></p>
        <?php }?>
        <p>
          <label for="">Fornavn:</label>
          <?php echo $BT_info->first_name;?></p>
        <p>
          <label for="">Efternavn:</label>
          <?php echo $BT_info->last_name;?></p>
        <p>
          <label for="">Vejnavn:</label>
          <?php echo $BT_info->street_name;?></p>
        <p>
          <label for="">Hus/gade nr.:</label>
          <?php echo $BT_info->street_number;?></p>
        <p>
          <label for="">Postnr.:</label>
          <?php echo $BT_info->zip;?></p>
        <p>
          <label for="">Bynavn:</label>
          <?php echo $BT_info->city;?></p>
        <p>
          <label for="">Telefonnummer:</label>
          <?php echo $BT_info->phone_1;?></p>
        <p>
          <label for="">E-mail adresse:</label>
          <?php echo $BT_info->email;?></p>
        <p class="clearfix">
          <label for="" class="fl">Besked:</label>
          <span class="w320 fl"><?php echo $BT_info->message1;?></span> </p>
        <p>
          <label for=""><strong>Betalingsmetode:</strong></label>
        <?php if($order['details']['BT']->virtuemart_shipmentmethod_id == 1){?>
        Efterbetalte
        <?php } else {?>
        Kortbetaling
        <?php }?>
          
          </p>
        <p>
          <label for=""><strong>Levering:</strong></label>
        <?php if($order['details']['BT']->virtuemart_shipmentmethod_id == 1){?>
        <span>Afhentning på Hesselrødvej 26, 2980 Kokkedal</span>
        <?php } else if($order['details']['BT']->virtuemart_shipmentmethod_id == 2){?>
        <span>Leveret på Sjælland</span>
        <?php } else if($order['details']['BT']->virtuemart_shipmentmethod_id == 3){?>
        <span>Leveret til døren for Fyn og Jylland</span>
        <?php } else {?>
        <span>Leveret via e-mail</span>
        <?php }?>
          </p>
      </div>
      <div class="w250 fl">
        <?php if($isGiftCard){?>
            <p class="bold">Modtageren af gavekortet:</p>
        <?php } else {?>
            <p class="bold">Leveringsadresse:</p>
        <?php }?>
        <p>
          <label for="">Fornavn:</label>
          <?php echo $ST_info->first_name;?></p>
        <p>
          <label for="">Efternavn:</label>
          <?php echo $ST_info->last_name;?></p>
        <?php if($isGiftCard){?>
        <p>
          <label for="">E-mail:</label>
          <?php echo $ST_info->email1;?></p>
          <p>
          <label for="">Besked:</label>
          <?php echo $ST_info->message1;?></p>
        <?php } else {?>
        <p>
          <label for="">Vejnavn:</label>
          <?php echo $ST_info->street_name;?></p>
        <p>
          <label for="">Hus/gade nr.:</label>
          <?php echo $ST_info->street_number;?></p>
        <p>
          <label for="">Postnr.:</label>
          <?php echo $ST_info->zip;?></p>
        <p>
          <label for="">Bynavn:</label>
          <?php echo $ST_info->city;?></p>
        <p>
          <label for="">Telefonnummer:</label>
          <?php echo $ST_info->phone_1;?></p>
        <?php }?>
        <?php if($order['details']['BT']->virtuemart_shipmentmethod_id == 1){?>
        <p class="red f18">Bemærk! Vi kontakter jer, når varen er klar afhentning</p>
        <?php }?>
      </div>
    </div>
    <div class="clear"></div>
    <table class="list_item_cart">
      <tbody>
        <tr class="title">
          <th>Varebeskrivelse</th>
          <th>Antal</th>
          <th>Pris pr stk.</th>
          <th>Pris i alt</th>
        </tr>
        <?php foreach($order['items'] as $item){
            $attrs = json_decode($item->product_attribute);
            //preg_match_all("#\">[\w\W]*?</span>#", $item->product_attribute, $tmp);
            $attrs = (array)$attrs;
        ?>
        <tr>
          <td><!--<div class="img_pro"> <img width="90" src="<?php echo $img;?>"> </div>-->
            <div class="content_pro">
              <h4><?php echo $item->order_item_name;?></h4>
              <p>Vare-nummer: <?php echo $item->order_item_sku;?></p>
              <?php 
              $i = 1;
              foreach($attrs as $attr){
                  if($i != 2){
              ?>
              <p><?php echo $attr;?></p>
              <?php }
              $i++;
              }?>
            </div></td>
          <td><p><?php echo $item->product_quantity;?></p></td>
          <td><p><?php echo number_format($item->product_item_price,2,',','.').' DKK'; ?></p></td>
          <td><p><?php echo number_format($item->product_final_price,2,',','.').' DKK'; ?></p></td>
        </tr>
        <?php }?>
        <tr>
          <td class="cf9f7f3" colspan="4"><table class="sub_order_Summary">
              <tbody>
                <tr>
                  <td colspan="2">Subtotal: </td>
                  <td width="25%" colspan="2"><?php echo number_format($order['details']['BT']->order_subtotal,2,',','.').' DKK'; ?></td>
                </tr>
                <?php if($order['details']['BT']->virtuemart_shipmentmethod_id == 1){?>
                <tr>
                  <td colspan="2">Heraf moms: </td>
                  <td colspan="2"><?php echo number_format($order['details']['BT']->order_subtotal*0.2,2,',','.').' DKK'; ?></td>
                </tr>
                <?php } else {?>
                <tr>
                  <td colspan="2">Heraf moms: </td>
                  <td colspan="2"><?php echo number_format(($order['details']['BT']->order_subtotal*0.9)*0.2,2,',','.').' DKK'; ?></td>
                </tr>
                <?php }?>
                <tr>
                  <td colspan="2">FRAGT: </td>
                  <td><?php 
                    if($order['details']['BT']->virtuemart_shipmentmethod_id != 1)
                        echo number_format($order['details']['BT']->order_shipment,2,',','.').' DKK'; 
                    else
                        echo 0 . ' DKK';
                  ?>
                  </td>
                </tr>
                <?php 
                    if($order['details']['BT']->coupon_code){
                ?>
                <tr>
                    <td colspan="2">Gavekort rabat:</td>
                    <td colspan="2"><?php echo number_format($order['details']['BT']->coupon_discount,2,',','.').' DKK'; ?></td>
                </tr>
                <?php }?>
                
                <?php 
                    if($order['details']['BT']->virtuemart_shipmentmethod_id == 1){
                ?>
                <tr>
                    <td colspan="2">Rabat 10% ved afhentning:</td>
                    <td colspan="2"><?php echo '-'.number_format($order['details']['BT']->order_subtotal*0.1,2,',','.').' DKK'; ?></td>
                </tr>
                <?php }?>
                <tr>
                  <td colspan="2"><h4>total:</h4></td>
                  <td colspan="2"><h4><?php echo number_format($order['details']['BT']->order_total,2,',','.').' DKK'; ?></h4></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table>
    <p class="bb1"><strong>Sådan returnerer du en vare</strong><br>
      Vi ønsker at du er tilfreds hver gang du handler hos os, derfor er vi også 
      opmærksomme på at du lejlighedsvis ønsker at returnere en vare. Klik her for at læse mere om vores returpolitik.</p>
    <p><strong>Har du brug for hjælp?</strong><br>
      Se vores Almindelige Spørgsmål. Her finder du svar på spørgsmål om vores onlineshop.</p>
    <p>Tak for din bestilling.<br>
      Krukker & Havemøbler ApS<br>
      Hesselrødvej 26, Karlebo<br>
      2980 Kokkedal<br>
      Mobil: 41628001<br>
      Email: info@scheel-larsen.dk</p>
    <div class="goto clearfix"> <a href="index.php" class="btnHome fl hover">Til forside</a> <a href="index.php?option=com_virtuemart&view=invoice&layout=invoice&tmpl=component&virtuemart_order_id=<?php echo $order['details']['BT']->virtuemart_order_id;?>&order_number=<?php echo $order['details']['BT']->order_number;?>&order_pass=<?php echo $order['details']['BT']->order_pass;?>" class="btnPrint fl hover ml10" target="_blank">PRINT KVITTERING</a> </div>
  </div>
</div>
