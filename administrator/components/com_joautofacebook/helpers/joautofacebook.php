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

// No direct access.
defined('_JEXEC') or die;
class joautofacebook
{
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_JOAUTOFACEBOOK_SUBMENU_DASHBOARD'),
			'index.php?option=com_joautofacebook&view=dashboard',
			$vName == 'dashboard'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_JOAUTOFACEBOOK_SUBMENU_POSTMANAGER'),
			'index.php?option=com_joautofacebook&view=postmanager',
			$vName == 'postmanager'
		);		

		JSubMenuHelper::addEntry(
			JText::_('COM_JOAUTOFACEBOOK_SUBMENU_ACCOUNTS'),
			'index.php?option=com_joautofacebook&view=accounts',
			$vName == 'accounts'
		);
				
		JSubMenuHelper::addEntry(
			JText::_('COM_JOAUTOFACEBOOK_SUBMENU_SETTING'),
			'index.php?option=com_joautofacebook&view=settings',
			$vName == 'settings'
		);
	}
	function accessTokenPages($access_token){
		if(!empty($access_token)){
			$token_url = "https://graph.facebook.com/me/accounts?access_token=".$access_token."&expires_in=0";
			$token_content =  json_decode(joautofacebook::file_get_contents_curl($token_url),true);
		}	
		return @$token_content;
	}
	
	function getGroup($access_token){
		if(!empty($access_token)){
			$token_url = "https://graph.facebook.com/me/groups?access_token=".$access_token."&expires_in=0";
			$token_content =  json_decode(joautofacebook::file_get_contents_curl($token_url),true);
			
		}
		return @$token_content;
	}
	
	
	function file_get_contents_curl($url) {
		$ch = curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_REFERER, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
	}	
	
	
	function getFacebookPost($account_id, $fb_accesstoken) {
		if(!empty($fb_accesstoken)){
			$token_url = "https://graph.facebook.com/".$account_id."/posts?access_token=".$fb_accesstoken."&expires_in=0";
			$token_content =  json_decode(joautofacebook::file_get_contents_curl($token_url),true);
		}
		return @$token_content;
	}
	
	function getMeaccesstoken($account_id, $fb_accesstoken){
		if(!empty($fb_accesstoken)){
			$token_url = "https://graph.facebook.com/".$account_id."?access_token=".$fb_accesstoken."&expires_in=0";
			$token_content =  json_decode(joautofacebook::file_get_contents_curl($token_url),true);
		}
		return @$token_content;
	}
	
	function deletepostfacebook($id_post, $app_id, $app_secret, $accesstoken){		
		$token_url = "https://graph.facebook.com/".$id_post."?method=delete&access_token=".$accesstoken;
		$token_content =  json_decode(joautofacebook::file_get_contents_curl($token_url),true);		
		return @$token_content;
	}
	
	function facebookformpost($id, $content_type){
		$doc = &JFactory::getDocument();
		$db = &JFactory::getDBO();
		$query = 'SELECT * FROM #__joat_accounts WHERE published = 1';
		$db->setQuery($query);
		$items = $db->loadObjectList();
		$query_itempost = 'SELECT * FROM #__joat_postmanager WHERE content_type="'.$content_type.'" AND article_id='.$id;
		$db->setQuery($query_itempost);
		$object = $db->loadObject();
		
		$post_to = explode(',', $object->post_to);
		if($object->state == -1){
			$status = '[<span style="color: #1800FF">Post Successful</span>]';
		}elseif($object->state == 1){
			$status = '[<span style="color: #C51111">Post Pending</span>]';
		}
		$html ='
		<link type="text/css" href="'.JUri::root().'components/com_joautofacebook/assets/styleform.css" rel="stylesheet">
		';
		
		$html .= '<fieldset class="panelform joautopost">
				<legend>Post to facebook</legend>
				<ul class="adminformlist" id="facebookpost">
					<li><label title="" class="hasTip" for="message" id="message-lbl">Message</label>						
						<textarea class="inputbox" rows="3" cols="30" id="message" name="message" aria-invalid="false">'.$object->message.'</textarea>					
					</li>';
				foreach($items AS $item){
					if($item->post_to_page !=''){					
						$html .='<li style="border-bottom: 1px dashed #ccc;"><label title="" class="hasTip" for="message" id="message-lbl"><img alt="" src="http://graph.facebook.com/'.$item->facebook_id.'/picture"></label><div style="float: left;">';
						$postopage = explode(',', $item->post_to_page);
						foreach ($postopage AS $accesstoken_post){
							if (in_array($accesstoken_post, $post_to)) {
								$state = $status;
							}else{
								$state ='';
							}
							$accesstoken_post_detal =  explode('|', $accesstoken_post);
							//var_dump($accesstoken_post_detal[0]);
							$user_profile = joautofacebook::getMeaccesstoken($accesstoken_post_detal[0], $accesstoken_post_detal[1]);							
							$html .='<input type="checkbox" title="" value="'.$accesstoken_post.'" name="posttofacebook[]" class="posttofacebook" style="float: none;">'.$user_profile["name"].' '.$state.'<br/>';
						}									
						$html .='</div></li>';
					}	
				}		
		$html .=	'</ul>
			</fieldset>';
		return $html;
		
	}
	
	function postfacebook($access_tokens, $message, $title, $link, $metadesc, $image)
	{
		if(!class_exists('SettingsHelper'))	{
			require_once (JPATH_ROOT . DS . 'administrator' .DS. 'components' .DS. 'com_joautofacebook' .DS. 'helpers' .DS. 'settings.php');
		}	
		$limit_description = SettingsHelper::get('limitcharacted');
		$short_url =  SettingsHelper::get('shorturl');
		$metadesc = joautofacebook::substring($metadesc, $limit_description);
		switch($short_url) {
			case 1:
				$url_item = $link;
			break;
			case 2:
				$url_item = joautofacebook::get_isgd_url($link);
			break;
			case 3:
				$url_item = joautofacebook::get_tiny_url($link);
			break;
		}		
		
		try {				
			foreach ($access_tokens as $access_token) {
				$accesstoken_post_detal =  explode('|', $access_token);
				$url = "https://graph.facebook.com/".$accesstoken_post_detal[0]."/feed";	
				$attachments =  array(
					'access_token' =>$accesstoken_post_detal[1],
					'message' => $message,
					'name' => $title,
					'link' => $url_item,
					'description' => $metadesc,
					'picture'=>$image
				);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
				curl_setopt($ch, CURLOPT_POST, true);
	   			curl_setopt($ch, CURLOPT_POSTFIELDS, $attachments);
	   			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch);
			}
			JFactory::getApplication()->enqueueMessage('Item posted to your Facebook wall successfully!');
		} catch(Exception $e) {
			JError::raiseWarning('1', ' - Error posted to your Facebook wall - ');
		}
	}
	
	function updatedata($content_type, $id, $message, $title, $description, $image, $link, $date_created, $date_published, $postto, $state){
		if(!class_exists('SettingsHelper'))	{
			require_once (JPATH_ROOT . DS . 'administrator' .DS. 'components' .DS. 'com_joautofacebook' .DS. 'helpers' .DS. 'settings.php');
		}	
		$db = JFactory::getDBO();
		$limit_description = SettingsHelper::get('limitcharacted');
		$metadesc = joautofacebook::substring($description, $limit_description);
		
		$db -> setQuery('DELETE FROM #__joat_postmanager WHERE article_id='.$id.' AND content_type = "'.$content_type.'"');
	 	if(!$db->query()){
	 		JError::raiseError(500, $db->getErrorMsg());
	 	}
	 	
	 	$message = str_replace('"', '`', $message);
	 	$title = str_replace('"', '`', $title);
	 	$metadesc = str_replace('"', '`', $metadesc);
	 	
	 	$query = 'INSERT INTO #__joat_postmanager 		
				VALUES ("", "'.$content_type.'", '.$id.', "'.$message.'", "'.$title.'", "'.$metadesc.'", "'.$image.'", "'.$link.'", "'.$date_created.'", "'.$date_published.'", "'.$postto.'", '.$state.')';
		
		$db -> setQuery($query);
	 	if(!$db->query()){
	 		JError::raiseError(500, $db->getErrorMsg());
	 	}
	}
	
	function substring($str,$leng){
		if(JString::strlen($str)<=$leng){
		    return $str;
		} else {
		    if(JString::strpos($str," ",$leng) > $leng) {
		        $new_leng=JString::strpos($str," ",$leng);
		        $new_str = JString::substr($str,0,$new_leng)."...";
		        return $new_str;
		    }
		    $new_str = JString::substr($str,0,$leng)."...";
		    return $new_str;
		}
	}
	
	function get_isgd_url($url)  
	{  
		$url = urlencode($url);
		$ch = curl_init();  
		$timeout = 5;  
		curl_setopt($ch,CURLOPT_URL,'http://is.gd/api.php?longurl='.$url);  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
		$content = curl_exec($ch);  
		curl_close($ch);
		return $content;  
	}
	
	function get_tiny_url($url)  
	{  
		$ch = curl_init();  
		$timeout = 5;  
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
		$data = curl_exec($ch);  
		curl_close($ch);  
		return $data;  
	}
	
}