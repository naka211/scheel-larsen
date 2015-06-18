<?php
/*------------------------------------------------------------------------
# com_joautofacebook - JO Auto facebook for Joomla 1.6, 1.7, 2.5
# ------------------------------------------------------------------------
# author: http://www.joomcore.com
# copyright Copyright (C) 2011 Joomcore.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomcore.com
# Technical Support:  Forum - http://www.joomcore.com/Support
-------------------------------------------------------------------------*/
// No direct access
defined('_JEXEC') or die ('Restricted access');
jimport( 'joomla.user.user' );
$user		= JFactory::getUser();
$userId		= $user->get('id');
$ordering = ($this->lists['order'] == 'a.ordering');

?>
<form action="" method="post" method="post" name="adminForm" id="adminForm">
	<table>
		<tr>
			<td align="left" width="100%">
				<?php echo JText::_( 'Filter' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo htmlspecialchars($this->lists['search']);?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_catid').value='0';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Reset' ); ?></button>
			</td>
			<td nowrap="nowrap">
					<?php
						echo $this->lists['state'];						
					?>
				</td>
		</tr>
	</table>
	<table class="adminlist" cellspacing="1" width="100%" >
		<thead>
		<tr>	
			<th width="5"><?php echo JText::_( 'NUM' ); ?></th>
			<th width="5"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items)?>)" > </th>
			<th width="7%">
				<?php echo JHTML::_('grid.sort',  JText::_( 'COM_JOAUTOFACEBOOK_ARTICLE_ID' ), 'm.article_id', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th width="7%">
					<?php echo JText::_('COM_JOAUTOFACEBOOK_CONTENT_TYPE'); ?>
			</th>
			<th>
					<?php echo JText::_('COM_JOAUTOFACEBOOK_MESSAGE'); ?>
			</th>
			<th width="25%">
					<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_TITLE'), 'm.title', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th width="13%">
					<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_STATE'), 'm.state', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
				<th width="10%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_DATECREATED'), 'm.date_created', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
				
			<th width="10%">
				<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_DATEPUBLISHED'), 'm.date_published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			</tr>	
		</thead>
	<tfoot>
		<tr>
			<td colspan="11">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>		
<?php
$k=0;
for($i=0, $n=count($this->items);$i<$n;$i++)
	{
		$row=& $this->items[$i];
		$link 		= JRoute::_('index.php?option=com_joautofacebook&view=accounts&task=accounts.edit&cid[]='.$row->id);
?>
		<tr class="<?php echo "row$k";?>">
			<td>
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>			
			<td><?php echo JHtml::_('grid.id', $i, $row->id); ?></td>
			<td>
				<?php echo $row->article_id?>
			</td>
			<td>
				<?php echo $row->content_type?>
			</td>
			<td>
				<?php echo $row->message?>
			</td>
			<td>
				<a target="_blank" href="<?php echo $row->url;?>"><?php echo $row->title;?></a>
			</td>
			<td>
				<?php 
				if($row->state ==-1){
					echo '<span style="color: #1800FF">'.JText::_('COM_JOAUTOFACEBOOK_SUCCESSFUL').'</span>';
				}elseif($row->state ==0){
					echo '<span style="color: #786860">'.JText::_('COM_JOAUTOFACEBOOK_CANCEL').'</span>';
				}elseif($row->state ==1){
					echo '<span style="color: #C51111">'.JText::_('COM_JOAUTOFACEBOOK_PENDING').'</span>';
				}
			?>
			</td>
			<td align="center"><?php echo $row->date_created;?></td>	
			<td align="center" style="color:#CE05C7"><?php echo $row->date_published;?></td>	
		</tr>
<?php	
	$k = 1 - $k;	
	}
?>		
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>