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
$doc = &JFactory::getDocument();
$doc->addScript('components/com_joautofacebook/assets/js/jquery.js');
$doc->addScript('components/com_joautofacebook/assets/js/jScrollPane.js');
$doc->addScript('components/com_joautofacebook/assets/js/jquery.mousewheel.js');
$doc->addStyleSheet('components/com_joautofacebook/assets/facebookpost.css');
$doc->addStyleSheet('components/com_joautofacebook/assets/jScrollPane.css');
?>
<script type="text/javascript">
	var jscroll = jQuery.noConflict();
	jscroll(document).ready(function() {
		var api = jscroll(".fb-wall").jScrollPane({
				showArrows:true,
				maintainPosition: false
				
			}
		).data("jsp");
			
	});
</script>
<form action="" method="post" method="post" name="adminForm" id="adminForm">	
	<?php if(trim($this->items->facebook_id) != '') {?>
	<fieldset class="adminform">
		<img src="http://graph.facebook.com/<?php echo $this->items->facebook_id;?>/picture" alt=""> <?php echo $this->items->facebook_name;?>
	</fieldset>	
	<?php }?>
	<div class="clr"></div>
	<table style="background: #666; color: #fff; height: 27px; width: 720px;" cellspacing="1">
		<thead>
		<tr>	
			<th width="5"><?php echo JText::_( '#' ); ?></th>
			<th width="695"><?php echo JText::_('COM_JOAUTOFACEBOOK_POSTS_MANAGER_ON_FACEBOOK')?></th>
		</tr>
		</thead>
	</table>	
	
	<div class="fb-wall" style="width:700px;">		
		<?php 
			if(count($this->arr_accesstokens_post)>0){
				foreach($this->arr_accesstokens_post As $accesstoken) {
					$accesstoken_post_detal =  explode('|', $accesstoken);
					$pagesToken = joautofacebook::getFacebookPost($accesstoken_post_detal[0], $accesstoken_post_detal[1]);
					?>
					<div class="account-post">
						<?php 
						if(count($pagesToken['data']) >0){
							$i = 0;
							foreach($pagesToken['data'] AS $info_post){
								if($info_post['application']['id'] == $this->app_id){	
								?>
									<div class="jo-facebook-post">
										<div class="jodeleteselectbox">
											<?php echo JHtml::_('grid.id', $i, $info_post['id'].'|'.$this->app_id.'|'.$this->app_secret.'|'.$accesstoken); ?>
										</div>	
										<div class="fb-wall-box fb-wall-box-first">							
											<img class="fb-wall-avatar" src="https://graph.facebook.com/<?php echo $info_post['from']['id']?>/picture?type=square">
											<div class="fb-wall-data">
												<span class="fb-wall-message"><a target="_blank" class="fb-wall-message-from" href="http://www.facebook.com/profile.php?id=<?php echo $info_post['from']['id']?>"><?php echo $info_post['from']['name']?></a> <?php echo $info_post['message']?></span>
												<div class="fb-wall-media">
													<?php if(!empty($info_post['link'])) {?>
														<a class="fb-wall-media-link" target="_blank" href="<?php echo $info_post['link']?>">
															<img src="<?php echo $info_post['picture']?>" class="fb-wall-picture">
														</a>
													<?php } ?>			
													<div class="fb-wall-media-container">
														<a target="_blank" href="<?php echo $info_post['link']?>" class="fb-wall-name"><?php echo $info_post['name']?></a>
														<a target="_blank" href="<?php echo $info_post['caption']?>" class="fb-wall-caption"><?php echo $info_post['caption']?></a>
														<span class="fb-wall-description">
															<?php echo $info_post['description']?>
														</span>
													</div>	
												</div>
												<span class="fb-wall-date"><img alt="" title="link" src="<?php echo $info_post['icon']?>" class="fb-wall-icon"><?php echo $info_post['created_time']?></span>
												<?php if(count($info_post['likes']['data']) ==1) {?>
													<div class="fb-wall-likes"><div><span><?php  echo $info_post['likes']['data'][0]['name']?></span> likes this</div> </div>
												<?php } elseif(count($info_post['likes']['data']) >1) {?>
													<div class="fb-wall-likes"><div><span><?php echo count($info_post['likes']['data']).' people'?></span> likes this</div> </div>	
												<?php }?>
												<?php if(count($info_post['comments']['data']) >0) {?>
													<div class="fb-wall-comments">
														<?php foreach($info_post['comments']['data'] AS $fb_comment) {?>
														<span class="fb-wall-comment">
															<a target="_blank" class="fb-wall-comment-avatar" href="http://www.facebook.com/profile.php?id=<?php  echo $fb_comment['from']['id']?>"><img src="https://graph.facebook.com/<?php  echo $fb_comment['from']['id']?>/picture?type=square"></a>
															<span class="fb-wall-comment-message">
																<a target="_blank" href="http://www.facebook.com/profile.php?id=<?php  echo $fb_comment['from']['id']?>" class="fb-wall-comment-from-name"><?php  echo $fb_comment['from']['name']?></a>
																<?php  echo $fb_comment['message']?>
																<span class="fb-wall-comment-from-date"><?php  echo $fb_comment['created_time']?></span>
															</span>
														</span>
														<?php }?>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>	
								<?php
								}
								$i = $i+1;
							}					
						}
					?>
					</div>	
					<?php	
				}
			}	
		?>
	</div>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
		<input type="hidden" name="account_id" value="<?php echo $this->items->id?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>