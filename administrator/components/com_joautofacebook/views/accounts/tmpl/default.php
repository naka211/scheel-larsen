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
		</tr>
	</table>
	<table class="adminlist" cellspacing="1" width="100%" >
		<thead>
		<tr>	
			<th width="5"><?php echo JText::_( 'NUM' ); ?></th>
			<th width="5"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items)?>)" > </th>
			<th width="8%">
				<?php echo JHTML::_('grid.sort',  JText::_( 'COM_JOAUTOFACEBOOK_IMAGE' ), '', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
			<th>
					<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_FACEBOOKNAME'), 'f.facebook_name', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th width="25%">
					<?php echo JText::_('COM_JOAUTOFACEBOOK_MANAGER_ARTICLE_ON_FACEBOOK'); ?>
			</th>
			<th width="20%">
					<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_FACEBOOKID'), 'f.facebook_id', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
			<th width="20%">
					<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_FACEBOOKAPPID'), 'f.app_id', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
				<th width="5%" nowrap="nowrap">
				<?php echo JHTML::_('grid.sort',  JText::_('COM_JOAUTOFACEBOOK_PUBLISHED'), 'a.published', $this->lists['order_Dir'], $this->lists['order'] ); ?>
			</th>
				
			<th width="1%">
				<?php echo JHTML::_('grid.sort',  JText::_('ID'), 'a.id', $this->lists['order_Dir'], $this->lists['order'] ); ?>
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
		$managerpost = JRoute::_('index.php?option=com_joautofacebook&view=accounts&layout=facebookpost&cid[]='.$row->id);		
?>
		<tr class="<?php echo "row$k";?>">
			<td>
				<?php echo $this->pagination->getRowOffset( $i ); ?>
			</td>			
			<td><?php echo JHtml::_('grid.id', $i, $row->id); ?></td>
			<td><img src="http://graph.facebook.com/<?php echo $row->facebook_id;?>/picture" alt=""></td>
			<td>
				<a href="<?php echo $link;?>">
					<?php 
					if($row->facebook_name!=""){
						echo $row->facebook_name;
					}else{
						echo JText::_("COM_JOAUTOFACEBOOK_NOINFOFACEBOOK");
					}
					?>
				</a>
			</td>
			<td>
				<a href="<?php echo $managerpost;?>">
					<?php echo JText::_('COM_JOAUTOFACEBOOK_POSTS_MANAGER_ON_FACEBOOK')?>[
					<?php 
					if($row->facebook_name!=""){
						echo $row->facebook_name;
					}else{
						echo JText::_("COM_JOAUTOFACEBOOK_NOINFOFACEBOOK");
					}
					?>
					]
				</a>
			</td>
			<td>
				<?php echo $row->facebook_id;?>
			</td>
			<td>
				<?php echo $row->app_id;?>
			</td>
			<td align="center"><?php echo JHtml::_('jgrid.published', $row->published, $i, 'accounts.'); ?></td>	
				<td><?php echo $row->id;?></td>
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