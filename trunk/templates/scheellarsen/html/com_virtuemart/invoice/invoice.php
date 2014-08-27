<?php
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
if($this->orderDetails['details']['BT']->address_type_name == 1 ){
	$type = "Privat";
} else if($this->orderDetails['details']['BT']->address_type_name == 2 ){
	$type = "Erhverv";
} else {
	$type = "Offentlig instans";
}
	?>
<table border="0" cellspacing="0" cellpadding="0" style="margin: 15px; background: #fff; border: 1px solid #646464;">
	<tr>
		<td colspan="4"><h2 style="color: #00b2ea; border-bottom: 1px dotted #CACACA; padding: 10px; margin: 0;">FAKTURA</h2></td>
	</tr>

	<tr>
		<td height="30" style="padding-left: 10px"><strong>Ordrenummer:</strong></td>
		<td height="30" style="padding-left: 10px"><strong><?php echo $this->orderDetails['details']['BT']->order_number;?></strong></td>
	</tr>

	<tr style="padding-left: 20px">
		<td height="30" style="padding-left: 10px"><strong>Kundetype:</strong></td>
		<td height="30" style="padding-left: 10px"><strong><?php echo $type;?></strong></td>
	</tr>

	<tr style="padding-left: 20px">
		<td height="30" style="padding-left: 10px"><strong>E-mail:</strong></td>
		<td height="30" style="padding-left: 10px"><strong><?php echo $this->orderDetails['details']['BT']->email;?></strong></td>
	</tr>

	<tr>
	<td colspan="2">&nbsp;</td>
	</tr>

	<tr style="padding-left: 20px">
		<td colspan="2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td colspan="2" height="30" style="padding-left: 10px"><strong>Kundeoplysninger:</strong></td>
				</tr>

<?php if($this->orderDetails['details']['BT']->address_type_name == 2){?>
				<tr>
					<td width="50%" height="30" style="padding-left: 10px">Firmanavn:</td>
					<td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->company;?></td>
				</tr>

				<tr>
					<td width="50%" height="30" style="padding-left: 10px">CVR-nr.:</td>
					<td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->cvr;?></td>
				</tr>
<?php } else if($this->orderDetails['details']['BT']->address_type_name == 3){?>
				<tr>
					<td width="50%" height="30" style="padding-left: 10px">EAN-nr.:</td>
					<td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->ean;?></td>
				</tr>

				<tr>
					<td width="50%" height="30" style="padding-left: 10px">Myndighed/Institution:</td>
					<td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->authority;?></td>
				</tr>

				<tr>
					<td width="50%" height="30" style="padding-left: 10px">Ordre- el. rekvisitionsnr.:</td>
					<td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->order1;?></td>
				</tr>

				<tr>
					<td width="50%" height="30" style="padding-left: 10px">Personreference:</td>
					<td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->person;?></td>
				</tr>
<?php }?>

				<tr>
					<td width="50%" height="30" style="padding-left: 10px">Fornavn:</td>
					<td width="50%" height="30"><?php echo $this->orderDetails['details']['BT']->first_name;?></td>
				</tr>

				<tr>
					<td height="30" style="padding-left: 10px">Efternavn:</td>
					<td height="30"><?php echo $this->orderDetails['details']['BT']->last_name;?></td>
				</tr>

				<tr>
					<td height="30" style="padding-left: 10px">Adresse:</td>
					<td height="30"><?php echo $this->orderDetails['details']['BT']->address_1;?></td>
				</tr>

				<tr>
					<td height="30" style="padding-left: 10px">Postnr.:</td>
					<td height="30"><?php echo $this->orderDetails['details']['BT']->zip;?></td>
				</tr>

				<tr>
					<td height="30" style="padding-left: 10px">By:</td>
					<td height="30"><?php echo $this->orderDetails['details']['BT']->city;?></td>
				</tr>

				<tr>
					<td height="30" style="padding-left: 10px">Telefon:</td>
					<td height="30"><?php echo $this->orderDetails['details']['BT']->phone_1;?></td>
				</tr>
			</table>
		</td>

		<td colspan="2" valign="top">
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

	<tr>
	<td colspan="4">&nbsp;</td>
	</tr>

	<tr style="padding-left: 20px">
		<td colspan="2">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
			<td style="padding-left: 10px"><strong>Betaling: </strong></td>
			</tr>
			<tr>
			<td valign="top" style="padding-left: 10px">Kortbetaling</td>
			</tr>
			</table>
		</td>
		<td colspan="2">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
			<tr>
			<td><strong>Leveringsservice:</strong></td>
			</tr>
			<tr>
				<td valign="top" height="30"><?php if($this->orderDetails['details']['BT']->address_2){?>Afhentning: <?php echo $this->orderDetails['details']['BT']->address_2;?><?php }else{echo 'Forsendelse';}?></td>
			</tr>
			</table>
		</td>
	</tr>

	<tr>
	<td colspan="4">&nbsp;</td>
	</tr>

	<tr style="padding-left: 20px">
	<td colspan="4">
	<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #CACACA;line-height: 1.8em">
		<tr align="right" style="background: #EFEFEF;">
		<td width="40%" style="text-align: left; padding-left: 10px">Produkt</td>
		<td width="10%">Vare-nr</td>
		<td width="10%">Antal</td>
		<td width="20%">Pris pr. enhed</td>
		<td width="20%" style="padding-right: 20px">Pris i alt</td>
		</tr>

	<?php foreach($this->orderDetails['items'] as $item){?>
		<tr style="text-align: right;">
		<td style="border-bottom: 1px solid #CACACA; color: #3A3A3A; text-align: left; padding-left: 10px"><?php echo $item->order_item_name;?></td>
		<td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;"><?php echo $item->order_item_sku;?></td>
		<td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;"><?php echo $item->product_quantity;?></td>
		<td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;"><?php echo number_format($item->product_final_price,2,',','.');?> DKK</td>
		<td style="border-bottom: 1px solid #CACACA; color: #3A3A3A;padding-right: 10px;"><?php echo number_format($item->product_subtotal_with_tax,2,',','.');?> DKK</td>
		</tr>
	<?php }?>

		<tr>
		<td colspan="3" style="text-transform: uppercase; color: red; padding-left: 10px"><strong><?php if($this->orderDetails['details']['BT']->address_2){echo "Afhentning: ".$this->orderDetails['details']['BT']->address_2;}else{if($this->orderDetails['details']['BT']->address_type_name != 3) echo 'Forsendelse';else echo 'E-faktura/Nem-handel fakturablanket';}?></strong></td>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="400" style="color: #3A3A3A;">Forsendelse:</td>
		</tr>
		<tr>
			<td style="color: #3A3A3A;">Subtotal inkl. moms:</td>
		</tr>
		<tr>
			<td style="color: #3A3A3A;">Heraf moms:</td>
		</tr>
		<tr>
			<td><strong>TOTAL INKL. MOMS:</strong></td>
		</tr>
		</table></td>

		<td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="text-align: right;" >
		<tr>
			<td style="padding: 0 10px; color: #3A3A3A;"><?php echo number_format($this->orderDetails['details']['BT']->order_shipment,2,',','.');?> DKK</td>
		</tr>

		<tr>
			<td style="padding: 0 10px; color: #3A3A3A;" ><?php echo number_format($this->orderDetails['details']['BT']->order_salesPrice,2,',','.');?> DKK</td>
		</tr>

		<tr>
			<td style="padding: 0 10px; color: #3A3A3A;"><?php echo number_format($this->orderDetails['details']['BT']->order_salesPrice*0.2,2,',','.');?> DKK</td>
		</tr>

		<tr>
			<td style="padding: 0 10px;"><strong><?php echo number_format($this->orderDetails['details']['BT']->order_total,2,',','.');?> DKK</strong></td>
		</tr>
		</table></td>
		</tr>
	</table>
	</td>
	</tr>

	<tr><td></td></tr>

	<tr style="margin-top: 20px;">
	<td colspan="4" style="padding: 30px 10px; line-height: 1.8em;">
		Krukker & Havemøbler ApS - Hesselrødvej 26 - 2980 Kokkedal<br />
		Mobil: 41628001 - info@scheel-larsen.dk - CVR 30711912<br />
	</td>
	</tr>
</table>