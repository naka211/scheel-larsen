a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"
	
";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:53:"
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:53:"List all News || All news from the VirtueMart project";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:142:"VirtueMart - a free, easy to use and up-to-date e-commerce solution. Fully integrated into a free, but professional Content Management System.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:38:"http://virtuemart.net/news/latest-news";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:13:"lastBuildDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 03 Jun 2015 10:06:38 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:40:"Joomla! - Open Source Content Management";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-gb";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:10:{i:0;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"Release VM3.0.9, secured by Fortinet’s FortiGuard Labs";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:98:"http://virtuemart.net/news/latest-news/470-release-vm3-0-8-2-secured-by-fortinet-s-fortiguard-labs";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:98:"http://virtuemart.net/news/latest-news/470-release-vm3-0-8-2-secured-by-fortinet-s-fortiguard-labs";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3524:"<div class="feed-description"><p>As we mentioned in the last news, VirtueMart is audited by different security companies. We are very happy that they found the persistent XSS attack before we released vm3.0.8, so the version vm3.0.8 already contains the fix.</p>
<p>The vulnerability discovered by <a href="http://www.fortiguard.com/encyclopedia/vulnerability/#id=40479">Fortinet’sFortiGuard Labs</a> with CVE number “CVE-2015-3619” is a persistent XSS attack. Contrary to non-persistent XSS, this kind of attack can be executed with almost nil interaction by the admin. The problem exists due to the javascript tooltips, which automatically decode the DOM value. So in certain circumstances it was possible to use a double encode combination of first_name, last_name and company to create a working js, which gets activated if an admin hoovers over the combined name of the order. So our fix contains two parts. One part makes it impossible to store dangerous values, the other part escapes the tooltips to prevent problems with old orders.</p>
<p>The fix in vm2admin.js is here <br /><a href="http://dev.virtuemart.net/projects/virtuemart/repository/diff/trunk/virtuemart/administrator/components/com_virtuemart/assets/js/vm2admin.js?utf8=%E2%9C%93&amp;rev=8828&amp;rev_to=8670">vm2admin.js rev=8828</a><br />In case you cannot update, just use the new vm2admin.js.</p>
<p>The other fixes are more complex and in different files and just prevent the problem for the future.</p>
<ul>
<li><a href="http://dev.virtuemart.net/projects/virtuemart/repository/diff/trunk/virtuemart/administrator/components/com_virtuemart/models/orders.php?utf8=%E2%9C%93&amp;rev=8828&amp;rev_to=8821">/models/orders.php rev=8828</a></li>
<li><a href="http://dev.virtuemart.net/projects/virtuemart/repository/diff/trunk/virtuemart/administrator/components/com_virtuemart/views/orders/tmpl/orders.php?utf8=%E2%9C%93&amp;rev=8828&amp;rev_to=8539">BE/views/orders/tmpl/orders.php rev=8828</a></li>
<li><a href="http://dev.virtuemart.net/projects/virtuemart/repository/diff/trunk/virtuemart/administrator/components/com_virtuemart/views/orders/tmpl/order.php?utf8=%E2%9C%93&amp;rev=8828&amp;rev_to=8536">BE/views/orders/tmpl/order.php rev=8828</a></li>
</ul>
<p>Please remember that all this fixes are already in vm3.0.8. This is just the disclosure.</p>
<p>Meanwhile we created a new vm3.0.9, which is also suitable for productive use. But test your "add to cart" popup. Also, editing of orders could behave differently.</p>
<p>Features:<br />- New Ordering "ordering, name", which sorts for ordering if available, then for name.<br />- If a product had more than one category and one was not publisehd it could happen that the selected category was the unpublished one. Is fixed.<br />- Order item edit now uses the same function as the create/update function, which allows to use the same triggers for manipulating storing of the data. <br />- "Give vendors switched in shoppers their rights", means a vendor switched into a shopper can still administrate the store.<br />- Klarna replaced serialize against json_encode<br />- Added the option to add js files inline (sometimes easier with ajax)<br />- Add to cart can now be stopped by another js using e.stopSendtocart == true<br />- Added test for the AIO to prevent blank page due to installion without proper VirtueMart core</p>
<p><a href="http://dev.virtuemart.net/projects/virtuemart/files">http://dev.virtuemart.net/projects/virtuemart/files</a></p>
<p>&nbsp;</p></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 06 May 2015 19:30:00 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:24:"Security release Vm3.0.8";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"http://virtuemart.net/news/latest-news/469-security-release-vm3-0-8";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:67:"http://virtuemart.net/news/latest-news/469-security-release-vm3-0-8";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6559:"<div class="feed-description"><p>Security release VM 3.0.8</p>
<p>Finally after some interim versions, here is the release of VirtueMart 3.0.8.</p>
<p>All fixes were already provided with VM 3.0.6. Additionally we released VM 3.0.6.2 to minimize problems due last security problem in PHP itself (<a href="https://github.com/80vul/phpcodz/blob/master/research/pch-020.md">https://github.com/80vul/phpcodz/blob/master/research/pch-020.md</a>).</p>
<p>The other two vulnerabilities were minors (non-persistent XSS) and described here: <br /><a href="http://dev.virtuemart.net/projects/virtuemart/repository/revisions/8692/diff/trunk/virtuemart/administrator/components/com_virtuemart/helpers/vmpagination.php">.../8692/diff/trunk/virtuemart/administrator/components/com_virtuemart/helpers/vmpagination.php</a><br /><a href="http://dev.virtuemart.net/projects/virtuemart/repository/revisions/8692/diff/trunk/virtuemart/administrator/components/com_virtuemart/models/product.php">.../8692/diff/trunk/virtuemart/administrator/components/com_virtuemart/models/product.php</a>.</p>
<p>So what happened in the meantime?<br />Well, our dear fellow Joomla developers kept us even more busy than usual. :-) We were forced by different circumstances to release minor interim versions. First, we had to react fast to different problems in Joomla. For example in February we were informed by "<a href="http://appcheck-ng.com/">Appcheck NG</a>", that we were distributing the dangerous file 'uploader.swf' in our Joomla 2.5.x/VM 3.0.x full-installer. After some investigations it became clear, that the file was still distributed by Joomla and was only removed when users updated Joomla. The file has been known as dangerous since J2.5.10, but is still present in the J2.5.28 installer. So we removed the file from our package and added a remove function to our install and update function of VirtueMart <strong>2.6.16+</strong> and <strong>3.0.6+</strong> to ensure that the file is deleted.</p>
<p>Some days later, after we had just adjusted the toolbar javascript to Joomla 3.4.0, version 3.4.1 was released, which broke the validation.js of the toolbar's 'Save' button. The reasons were "optimisations" and "deferrable" changes of low priority issues. In our humble opinion the reason for this probably is the new release strategy of Joomla not having short term and long term releases. We do welcome that Joomla dropped the STR and LTR system, but the new system seems to miss clear rules about which kind of features are allowed to be added within a minor update version. I think the VirtueMart community has already had their fingers burned by the constant implementation of new features. It took us some releases to get a feeling for it and it is a matter of experience and rules. Since Joomla has a more mutating team than VM, it would be better for the Joomla team to write down their knowledge in rules. It remains very interesting as to how the Joomla community will deal with this situation. From a developers point of view, in the past we had to ensure compatibility only for major releases, like j1.0, 1.5, j2.5, 3.3. At present it seems we have to cope with minor releases like 3.4.x, 3.5.x and so on, too. Or to put it bluntly: Joomla becomes unstable. For a developer stable/unstable means not just that the execution of the program is stable, it usually also means that the program behaves the same way as before.</p>
<p>I wrote the above 1 week ago and meanwhile we are suffering from new problems with routing of the language in Joomla 3.4.1, a new problem with canonical urls and more. So let's hope that all the currently open router/SEF fixes, viewable at <a href="http://issues.joomla.org/tracker/joomla-cms/?sort=issue&amp;direction=desc&amp;user=undefined&amp;category=router-sef&amp;stools-active=1">issues.joomla.org/tracker/joomla-cms/?category=router-sef</a> will be tested and merged into Joomla as soon as possible. A half baked new router system creates many problems for us.</p>
<p>Since there are still security audits for Joomla 2.5.28, even after the announced End Of Life, we currently recommend that multilingual shops stay with Joomla 2.5.28 until we have a stable Joomla 3.4.x or 3.5 version. Our <a href="http://extensions.virtuemart.net/support/virtuemart-supporter-membership-detail">Supporter Membership</a> implies a security maintenance contract and ensures a stable and secure system.</p>
<p>As many live shops show, staying with Joomla 2.5.28 doesn't mean, the system is not responsive or not mobile friendly. There are great templates in the market that offer all the mobile friendly features that are necessary to have an up-to-date e-commerce system with a stable Joomla 2.5 backbone.</p>
<p>We really worked hard on the new version and besides fixing bugs, we also added some features.</p>
<ul>
<li>The vmbeez template is now mobile friendly (Kudos to Stefan Schumacher)</li>
<li>New option for Multivariants, which automatically creates the selected customfield "string" in the childs for you. This is very important for search plugins</li>
<li>multi variant gives correct numbers of rows (for browsepage)</li>
<li>new Sampledata with new images</li>
<li>added more not null declarations for sql <a href="http://dev.mysql.com/doc/refman/5.7/en/is-null-optimization.html">http://dev.mysql.com/doc/refman/5.7/en/is-null-optimization.html</a></li>
<li>Fallbacks for IE9, various js, missing config values and similar</li>
<li>category name understands vmText language keys</li>
<li>Added extra option to "is_list" for the customfields S and M</li>
<li>Address handling in cart is enhanced</li>
<li>Example for making the code more robust: creating of children had a limited due the slug finder (was not doing more than 20 tries). The new function uses the slug of the most recent generated child to find a new slug.</li>
<li>Another example: Added function ensureUniqueId&nbsp;to keep all html id tags to ensure unique id tags (not implement for any html function, yet)</li>
<li>or Vmprices addtocart works now also with entity button, not just input</li>
<li>added vRequest::vmSpecialChars without double encoding, the reason is that lang can be a command in php (thx to Kainhofer for hint and patch)</li>
<li>and a lot more, you may investigate the repository yourself <a href="http://dev.virtuemart.net/projects/virtuemart/repository/show/trunk/virtuemart">dev.virtuemart.net/.../trunk/virtuemart </a></li>
</ul>
<p>Furthermore we released the new vm2.6.18, just minor bugfixes.&nbsp;</p></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 20 Apr 2015 22:16:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:60:"VirtueMart 3.0.6 with completely redesigned 'Multi Variants'";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:101:"http://virtuemart.net/news/latest-news/468-virtuemart-3-0-6-with-completely-redesigned-multi-variants";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:101:"http://virtuemart.net/news/latest-news/468-virtuemart-3-0-6-with-completely-redesigned-multi-variants";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3281:"<div class="feed-description"><p>In VirtueMart 3.0.6 we fine tuned the completely redesigned <strong><em>Multi Variants</em></strong> which were introduced in our previous release. Let me give you a short introduction.</p>
<p>One of the most advanced feature of an ecommerce store is the possibility to display different variants of one product in a clear structure. The typical example are the T-Shirt product variants. We have created a small example here: <a href="http://demo.virtuemart.net/default-products/vm-t-shirt-multi-variant-detail">http://demo.virtuemart.net/default-products/vm-t-shirt-multi-variant-detail</a>.</p>
<p>Not all colours are available for any size and due to aesthetic reasons the "blue" imprints are not available for the "blue" coloured T-Shirt. Any drop-down combination points to a real product. The handling is easy as most important product attributes are accessible from the parent product (variant attributes, Sku, price). So you can easily configure more than 50 product variants in a single view, with different stock levels, price and images. If you select an already existing attribute like length, weight, etc, then you can change the value directly using the drop-down matrix in the parent product. You can also modify the display (for example rounding).</p>
<p><img src="http://virtuemart.net/images/virtuemart/news/childvariantsmatrix.PNG" alt="Variant Matrix" title="Variant Matrix" class="caption" width="692" height="196" /></p>
<p>We added a new configurable automatically selected shipment and payment if more than one is available. Also the long desired feature "register as admin in the frontend" got added.&nbsp;We also cleaned up the Custom Fields tab in the Product Edit view to give more room for Custom Field configurations. VirtueMart 3.0.6 is also&nbsp;a lot faster, due to new mysql keys and more caching. The administration menu is now still usable while being collapsed.</p>
<p>There is a new keepAlive script, which automatically extends the session for your shoppers if there is a product in the cart. It also automatically extends the session lifetime in all backend views. It is checking for input, so it is not running endlessly. As an example, if your session time is set to 30 minutes and your guest is checking out, leaving the computer (with open browser) and returning after 50 minutes, he is still logged in. If the user is now interacting with the screen (clicking, typing), then the keepAlive scripts directly fires a keepAlive and extends the session again. Lets assume the user stores his data after 70 minutes (searching for his/her credit card), the session is still alive. <br /><br /></p>
<p>We strongly recommend anyone using an older version of VM3 to update. The release is heavily tested and some changes and fixes were done especially for 3rd party developers.</p>
<div class="special-download">
<p style="text-align: center;"><a href="http://virtuemart.net/download" class="button-primary">DOWNLOAD VM3 NOW<br /> VirtueMart 3 component (core and AIO)</a></p>
</div>
<p>There is also a small update for vm2.6 series. There are also new keys for the sql joins to speed up your store. Also the new js handler got added for easier compatibility between vm2.6 andd vm3 extensions.</p></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 19 Feb 2015 22:50:45 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:27:"Release of VirtueMart 3.0.4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://virtuemart.net/news/latest-news/467-release-of-virtuemart-3-0-4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:70:"http://virtuemart.net/news/latest-news/467-release-of-virtuemart-3-0-4";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3088:"<div class="feed-description"><p>A bit earlier than expected, we have to release vm3.0.4 to close a vulnerability in the core. This is a real vulnerability, no exploit. The problem is a wrong error report setting, which can reveal the used server path for the real attack.</p>
<p>More and more people use php5.4 or php5.5, which has another default error handling and so they sometimes displayed Strict Errors (revealing the path). To prevent this, we added a function to disable the "Strict Standards" reporting for the "default" and "none" setting in Joomla. Unluckily, we left for a special debugging case the setting on enabled. So regardless the used configuration setting, you always got at least the "Simple" setting. Luckily it is not so easy to create warnings and errors in VirtueMart 3.</p>
<p>In case you don't want to update, here is the manual fix:</p>
<ol>
<li>open the file config.php at /administrator/components/com_virtuemart/helpers/config.php.</li>
<li>Go to line 583 and replace <br />ini_set('display_errors', '1');<br /> with<br /> ini_set('display_errors', '0');</li>
</ol>
<p>Or just download the new version.</p>
<p>The layout changes of the new version are just one important one for people who override the sublayout prices. The sublayout prices.php had a &lt;div class="clear"&gt;&lt;/div&gt; at the end, which got removed to increase the flexibility of the sublayout.</p>
<p>The new version contains a new sample product, the "child variant", which allows you to use up to 5 dropdowns to determine the product variant. It is similar to the stockable plugin, but allows also changing the variant data of any child directly from the parent. The handling of the feature is not perfect yet, but a good start. Feel free to share your ideas on our forum.</p>
<p>New features and bug fixes:</p>
<ul>
<li>cleaning of the code</li>
<li>increased robustness</li>
<li>increased consistency</li>
<li>more j3 compatibility (minors)</li>
</ul>
<ul>
<li>added js to fire automatically the checkout (without redirect) to show directly confirm</li>
<li>link to manufacturer on the productdetail page calls the manufacturer, not any longer the product list of the manufacturer</li>
<li>the rss feed in the controlpanel is now loaded by ajax, to prevent that the controlpanel isn't loaded if rss has problems</li>
<li>custom media, related products and categories with image size parameter</li>
</ul>
<ul>
<li>added var to vmview "writeJs", for example to prevent writing of js in pdfs</li>
<li>added hash for categoryListTree</li>
<li>changed calculator so, that default userfield parameters are better directly set if instantiated. Less problems with tax by country for guests</li>
<li>fixed in vmplugin.php the function declarePluginParams</li>
<li>fixed trigger plgVmDeclarePluginParamsUserfieldVM3</li>
</ul>
<p>and some more.</p>
<div class="special-download">
<p style="text-align: center;"><a href="http://virtuemart.net/download" class="button-primary">DOWNLOAD VM3 NOW<br /> VirtueMart 3 component (core and AIO)</a></p>
</div></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 29 Jan 2015 18:00:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:64:"Klik & Pay is included in VirtueMart 2.6.14 and VirtueMart 3.0.2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:105:"http://virtuemart.net/news/latest-news/466-klik-pay-is-included-in-virtuemart-2-6-14-and-virtuemart-3-0-2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:105:"http://virtuemart.net/news/latest-news/466-klik-pay-is-included-in-virtuemart-2-6-14-and-virtuemart-3-0-2";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4547:"<div class="feed-description"><p>We are pleased to announce the release of VirtueMart 2.6.14 and VirtueMart 3.0.2.</p>
<p><img src="http://virtuemart.net/images/klikandpay/klikandpay-logo.png" alt="Klik&amp;Pay included in VirtueMart" style="margin-left: 5px; margin-bottom: 5px; float: right;" />Klik &amp; Pay is a holistic secured payment solution accessible via PC, tablets and/or smartphone. Partners with many Banks and International acquirers, Klik &amp; Pay assists its merchants for 15 years, in France, Europe and all over the World. Klik &amp; Pay is:</p>
<ul>
	<li>A global solution not requiring a DSA</li>
	<li>A competitive pricing, without monthly fees nor set-up fee</li>
	<li>An anti-fraud scoring linked to an account with or without 3D Secure</li>
	<li>A multi-lingual staff available by telephone and email</li>
	<li>A consulting service to help you to develop your business and assist you at an International level</li>
</ul>
<p>Optimize your conversion rate:</p>
<ul>
	<li>Multi currencies cashing</li>
	<li>Multi lingual payment pages</li>
	<li>3DS and non 3 DS merchant account with trigger point</li>
</ul>
<p>Increase Sales:</p>
<ul>
	<li>Virtual Payment Terminal</li>
	<li>Payment by email</li>
	<li>Payment by SMS</li>
</ul>
<p>Secure your activity:</p>
<ul>
	<li>Anti-fraud scoring system</li>
	<li>Transaction Management</li>
	<li>Litigation support</li>
</ul>
<p>&nbsp;<a href="https://www.klikandpay.com/cgi-bin/inscription.pl?L=en">Open an account</a>&nbsp;or send us an email to <a href="mailto:market@klikandpay.com">market@klikandpay.com </a>
</p>
<p>If you already have a Klik &amp; Pay merchant account, you can directly set it up using our payment plugin Klik &amp; Pay provided in VirtueMart.</p>
<p><img src="http://virtuemart.net/images/klikandpay/klikandpay-snapshot.png" alt="klikandpay screenshot" style="display: block; margin-left: auto; margin-right: auto;" />
</p>
<p>We worked a lot on the new Virtuemart 3.0.2 . The update should be easy. There will be a lot database changes, but they are many, but minor. It will increase the speed of your page noticeable. Bugs fixed:</p>
<ul>
	<li>increased consistency of the install.sql and reduced int size for better performance</li>
	<li>extra attachment should now be sent to the shopper and not vendor as intended</li>
	<li>added itemId to products</li>
	<li>fixed "typo" in calculationh.php</li>
	<li>vmJsApi the function addJScript is not anylonger overwriting the attribute "written" if exists already</li>
	<li>set CacheTime to minutes</li>
	<li>fixed javascript for tinyMce 4, removed the doubled // of the flag link</li>
	<li>fixed typo in plugin.php</li>
	<li>Better use of loading the xml parameter into the JForm (thx Kainhofer)</li>
	<li>enhanced modals (thx Spyros)</li>
	<li>sortSearchListQuery or products model uses getCurrentUser now to ensure that the correct id is set (Thank you Stan Scholtz)</li>
	<li>removed a lot deprecated getSetError(s)</li>
	<li>vmTable is not derived anylonger from JTable, derived functions added</li>
	<li>optimised joomla tables for fullinstaller</li>
	<li>Some more adjustments of VmTable for J3, using dummy interfaces</li>
	<li>fixed spec file font problem, if no spec files there</li>
	<li>users allowed to adminstrate shoppers can now also select shoppers in the cart</li>
	<li>removed old comments, vmdebugs,...</li>
	<li>changed all &lt;span class="product-field-display"&gt; to &lt;div class="product-field-display"&gt;</li>
</ul>
<div class="special-download">
	<p style="text-align: center;"><a href="http://dev.virtuemart.net/attachments/download/887/com_virtuemart.3.0.2_extract_first.zip" class="button-primary">DOWNLOAD VM3 NOW<br /> VirtueMart 3 component (core and AIO)</a>
	</p>
</div>
<p>We still support vm2.6 and there is also no EOL set yet. But new features will be found in VM3. The update to vm2.6.14 should be very user friendly. Bugs fixed:</p>
<ul>
	<li>jQuery fix for automatically redirection to payment providers</li>
	<li>PDF works with diskcache now, less problems with images in invoice</li>
	<li>Authorize.net works now also with extra ST address</li>
	<li>small fixes, enhancements, removed typos for different payments</li>
</ul>
<div class="special-download">
	<p style="text-align: center;"><a href="http://dev.virtuemart.net/attachments/download/879/com_virtuemart.2.6.14_extract_first.zip" class="button-primary">DOWNLOAD VM2.6.14<br /> VirtueMart 2 component (core and AIO)</a>
	</p>
</div></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 04 Dec 2014 23:08:06 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:47:"VirtueMart 3 continues to set global benchmarks";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:63:"http://virtuemart.net/news/latest-news/465-virtuemart-3-is-here";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:63:"http://virtuemart.net/news/latest-news/465-virtuemart-3-is-here";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:9720:"<div class="feed-description"><p>Compatible with Joomla 2.5 and Joomla 3, the new generation of the eCommerce solution VirtueMart is now available with many new easing features. Built with the experience of more than 10 years VirtueMart 3 provides you with a powerful and comprehensive eCommerce solution. We give you a flavour of the work we have done to provide you with one of the best open-source e-commerce solution around!</p>
<p>This new generation of the ecommerce platform VirtueMart includes many new features under the hood and is a continuous development of VM2. Our main focus was to make it compatible with Joomla 3, cleaning the architecture, increasing the stability, and increasing the performance. In short: looking superficially at VirtueMart 3 it looks and works almost as VM2, but the feeling and handling is different.</p>
<p>Thousands of man hours have been spent and countless changes have been done updating and enhancing VirtueMart. We are happy and thank the many dedicated developers and store owners that helped to test and provide positive feedback on this most recent version.</p>
<p>VM2 to VM3 is an upgrade, implemented using the Joomla install manager - it does not require a migration (as was the case for VM1 to VM2). We have maintained as much compatibility as possible with VM2 but we have had to make some changes in order to deliver the improvements in VM3.</p>
<div class="special-download">
<p style="text-align: center;"><a href="http://dev.virtuemart.net/attachments/download/875/VirtueMart3.0.0_Joomla_2.5.27-Stable-Full_Package.zip" class="button-primary">DOWNLOAD NOW <br />Full installer includes Joomla 2.5 with VirtueMart 3 installed</a></p>
</div>
<h3>Your Shoppers and Store Owners benefits</h3>
<p>Shoppers will be delighted by the enhanced speed, add to cart buttons in the category browse view, and simpler checkout. Shop owners will notice the enhanced backend speed and simplified customfields. Shop builders will find a lot more tools to fulfill the wishes of their customers.</p>
<p>The ajaxified reload of product variants and neighboured products enhance the browsing experience significantly. To ensure proper loading of JavaScript we had to implement our own Javascript loader. We may extend this feature also to other views for example the pagination of the product browse page.</p>
<p>New internal program caches reduce the sql queries for the most used tasks by more than 25%. Heavy functions are additional cached with the Joomla cache.</p>
<h3>Developers benefits</h3>
<p>The new core has an advanced cart with enhancements to provide better update compatibility. For example the new custom userfields include now an option to be displayed on the checkout page and can use their own overridable mini layouts, making it easy to adjust the cart to legal requirements without touching the template. The data stored in the session is minified, which can be easily modified by plugins (for example to adjust the weight). The cart is automatically stored for registered users. The cart checks also for any reload of the available quantity of the items and corrects it if needed.</p>
<p>You can re-use your layouts by using the new sublayouts (like minilayouts). They give your store a consistent appearance and make it easier to adjust standards for different layouts in one overridable file. The input data is very unified which makes it stable against updates. This is very handy for the native "add to cart" button and customfields in the category browse view. New parameters in the Joomla menu settings for virtuemart views and modules provide more flexibility and better joomla integration.</p>
<p>Frontend managing combined with the Joomla ACL now allows your vendors to directly access the VirtueMart backend from the frontend, without having access to the Joomla backend. The system now provides different modes for different multivendor systems. VM3 is now prepared to work with a sales team, or shipment team.</p>
<p>We reduced the dependencies on Joomla, but increased on the other hand the integration. For example, the core now uses only the JFormFields of Joomla 2.5 and not any longer the old vmParameter, but we added vRequest (MIT) as choice for JInput. Developers can now use the normal JFormField joomla conventions for all plugins.</p>
<h3>Customfields refined</h3>
<p>With new options, redesigned and a lot more flexible to use. In VM2 you had to override none or all customfields of the parent. In VirtueMart 3 you can disable or override each customfield independent of the others. This makes creation of product variants a lot easier and faster. The new child variants gives the possibility to display products with up to 5 rambifications (can be increased), which depend on each other. Very important is also the new behaviour that you can use one customtype as often you want for one product.</p>
<p>"Additional Shoppergroup" is a new feature for shoppergroups, which does not replace the default groups. This is very handy if you use the default shoppergroups for calculation.</p>
<h3>jQuery clearance</h3>
<p>The new jQuery versions are now mainly the same as in Joomla 3.3 (jQuery v1.11.0,jQuery UI - v1.9.2, legacy complete). Shops using Joomla 2.5 with VirtueMart 3 also benefit from this. It prevents needless configuration problems.</p>
<h3>Extensions ready for VM3</h3>
<p>All changes in the API have been deeply tested and most 3rd party developers have updated their extensions already. The whole core and extensions are now working with the new abstraction layer (vmText, vRequest,...). Please visit <a href="http://extensions.virtuemart.net">http://extensions.virtuemart.net</a> for updates of your extensions.</p>
<p><img src="http://virtuemart.net/images/virtuemart/news/virtuemart3.png" alt="" style="float: right;" /></p>
<h3>Customer experience</h3>
<p>Will benefit from a smoother shopping experience:</p>
<ul>
<li>Improved page load speeds</li>
<li>The ability to add products and their variants to the cart directly from the category browse view</li>
<li>Simpler checkout process helping to reduce cart abandonment</li>
<li>Predicted shipping costs prior to full address entry</li>
<li>Cart contents for logged in users are stored to allow checkout at a later time</li>
<li>For multi lingual stores, we now have a language fallback to the default language for non-translated text</li>
</ul>
<h3>Merchants and Shop Builders</h3>
<p>Will see significant improvements, such as:</p>
<ul>
<li>The most advanced VM available to date</li>
<li>Increased backend performance</li>
<li>Simplified process for adding and implementing product customfields</li>
<li>Enhanced parameters for displaying related products and categories</li>
<li>Additional parameters for the views in the joomla menu configuration</li>
<li>Easily add and configure your own shopperfields directly useable in the shopping cart</li>
<li>Increased ability to Restrict/Manage employee access to key functions using ACL</li>
</ul>
<h3>Template developers</h3>
<ul>
<li>Easily maintain a consistent appearance across multiple views using new Sub-layouts</li>
<li>Improved CSS gives a starting point for use in responsive designs</li>
</ul>
<h3>Create your market place</h3>
<ul>
<li>Different modes for multivendor</li>
<li>Full front end administration</li>
</ul>
<h3>Enhancements from a technical perspective</h3>
<p>The team's significant points of focus were:-</p>
<ul>
<li>Compatibility with Joomla 3</li>
<li>Clean architectural structure</li>
<li>Increased stability</li>
<li>Increased performance both for the front and backend</li>
<li>New internal program caches reduce the sql queries for the most used tasks by more than 25%</li>
<li>Reduced dependency on Joomla where appropriate.</li>
</ul>
<h3>Developers</h3>
<ul>
<li>Uses only the JFormFields</li>
<li>Reduced jQuery conflicts as we now mainly implement the same as Joomla 3.4 (jQuery v1.11.0,jQuery UI - v1.9.2, legacy complete).</li>
<li>Core and extensions are now working with a new abstraction layer</li>
<li>The xml files have also been updated to J2.5 style</li>
<li>New JavaScript Handler for ajaxified product details reload</li>
</ul>
<h3>How to update</h3>
<p class="info">Do NOT upgrade straight into live - you should run upgrades on a test version of your store and thoroughly test BEFORE considering a live upgrade</p>
<p>Please read <a href="http://docs.virtuemart.net/tutorials/installation-migration-upgrade/198-upgrade-virtuemart-2-to-virtuemart-3.html">http://docs.virtuemart.net/tutorials/installation-migration-upgrade/198-upgrade-virtuemart-2-to-virtuemart-3.html</a> for additional information.</p>
<div class="special-download">
<p style="text-align: center;"><a href="http://dev.virtuemart.net/attachments/download/874/com_virtuemart.3.0.0_extract_first.zip" class="button-primary">DOWNLOAD VM3 NOW<br /> VirtueMart 3 component (core and AIO)</a></p>
</div>
<h3>Some useful tutorials for templaters and developers</h3>
<p>Are available on our documentation center:</p>
<ul>
<li><a href="http://docs.virtuemart.net/tutorials/development/175-code-adjustments-for-virtuemart-3.html">Code adjustments for VirtueMart 3</a></li>
<li><a href="http://docs.virtuemart.net/tutorials/templating-layouts/199-sublayouts.html">VM Sublayouts</a></li>
<li><a href="http://docs.virtuemart.net/tutorials/development/196-the-vm-javascript-handler.html">VM Javascript Handler</a></li>
</ul>
<h3>Support the project</h3>
<p>If you like what we do, consider supporting us with a <a href="http://extensions.virtuemart.net/support/virtuemart-supporter-membership-detail">Membership</a>.</p></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 21 Nov 2014 01:29:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:51:"VirtueMart 2.6.12 is released, Special Realex offer";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:93:"http://virtuemart.net/news/latest-news/464-virtuemart-2-6-12-is-released-special-realex-offer";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:93:"http://virtuemart.net/news/latest-news/464-virtuemart-2-6-12-is-released-special-realex-offer";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6859:"<div class="feed-description"><p>We are pleased to announce the release of VirtueMart 2.6.12</p>
<div class="special-download">
<p style="text-align: center;"><a href="http://virtuemart.net//downloads" class="button-primary">Download VirtueMart 2.6.12</a></p>
</div>
<h2>Special Realex Offer</h2>
<p>Realex Payments, one of Europe’s fastest growing payment solution providers, is delighted with its latest integration with Virtuemart, the free online shop solution. The integration with Virtuemart provides ecommerce merchants with a one-stop solution for merchant online payment processing. To mark this latest release, Realex Payments are offering 2 months FREE payment processing to all new VirtueMart merchants to their platform.</p>
<p>Improve your online conversions with Realex Payments’ latest shopping cart integration with VirtueMart.</p>
<div class="frontpage-features box-content"><img class="align-left" src="http://virtuemart.net//images/virtuemart/news/realex.png" alt="VirtueMart 2.6.12 includes Realex" />
<div class="bfc-o">
<p class="remove-margin">Realex Payments are offering 2 months FREE payment processing to all new VirtueMart merchants to their platform.</p>
<a href="http://www.realexpayments.com/partner-referral?id=virtuemart" class="button-primary">Sign Up today</a></div>
</div>
<h2>VirtueMart 3 almost ready to launch</h2>
<p>We release VirtueMart 3 next week.</p>
<p>You have not tested yet? it is time to do it.</p>
<p>You think you found a bug? please report it on the <a href="http://forum.virtuemart.net/index.php?board=136.0">forum</a>.</p>
<p>Your are a 3rd party VirtueMart developer? Test your extension against the new version.</p>
<div class="special-download">
<p style="text-align: center;"><a href="http://dev.virtuemart.net/attachments/download/831/com_virtuemart.2.9.9.2_extract_first.zip" class="button-primary">Download the RC version of VirtueMart 3</a></p>
</div>
<h2>Updates and bug fixes VirtueMart 2.6.12</h2>
<ul>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Category tree cache considers language now</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Realex: handling503; incorrect eci being submitted when card type is mastercard and eci value returned is 2;returntovm: missing option com_virtuemart; 503 dont block transactions; invalid payment infos errorcode 509;&nbsp;maestro cards, redirect in case of payment details error; added partial refund and partial capture</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Klarna: ok with opc off; country names; company/private fixed</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Vmpdf uses folder <span style="color: #333333; font-family: 'PT Sans'; font-size: 13px;">VMPATH_ROOT&nbsp;</span>instead of K_PATH_IMAGES</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Encrypted data is stored encrypted in vmtable cache</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Installation routine shows right options for fullinstaller</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">VmTable, enhanced Cache and other optimisations</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Payments autosubmit jquery</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Added VMPATH_ROOT constants for compatibility with VM3</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Fixed recipient in invoice/view.html.php rendermaillayout</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Controller alias vmplg</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">AIO: removed permission checking, list installed plugins</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Unpublished the uk states</span></li>
<li>Permissions use joomla and/or virtuemart</li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Storemanagers can edit orders now (as requested)</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Removed "displayed name" from order edit address</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Loadvmtemplatestyle should now always load the fe style even fired from BE</span></li>
<li><span style="color: #333333; font-family: 'PT Sans'; font-size: 10pt;">Preloading js</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Enhanced Registration email added address,</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Fixed typo in config/checkout</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Vmtable: added bindto</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">_getlayoutpath: checks if layout is in plugin folder and then plugin subfolder</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Access to update tools does not use issupervendor function anylonger</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Fixed error in shoppergroup list, that ordering for ids deleted the "default" shoppergroup&nbsp;</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Added order status list for desired attachment order status&nbsp;</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Readded to continue_link_html the class in the link class="continue continue_link"</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Added attachment for mail. Use attach_os as array in the config file for the desired orderstatus&nbsp;</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Added option reuseorders, also settable by config file.</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Minor in userfields load function</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Payments using json_encode</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Shopper group name in payment/shipment</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Just added the filter for the dot again (slug creation)</span></li>
<li><span style="font-size: 10pt; font-family: 'PT Sans'; color: #333333;">Joomla update server fix</span></li>
</ul></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:41:"valerie@virtuemart.net (Valérie Isaksen)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 23 Oct 2014 22:29:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:41:"Security release of vm2.6.10 and vm2.9.9b";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:84:"http://virtuemart.net/news/latest-news/462-security-release-of-vm2-6-10-and-vm2-9-9b";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:84:"http://virtuemart.net/news/latest-news/462-security-release-of-vm2-6-10-and-vm2-9-9b";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:7407:"<div class="feed-description"><p>If you are using a version lower than 2.6.10, you should update right away.</p>
<p>During a routine audit done by the Sucuri firm, they found a critical vulnerability and informed the VirtueMart team.<br />The bug was immediately patched (in record time) and the <a href="http://virtuemart.net/index.php?option=com_content&amp;view=article&amp;id=54:downloads&amp;catid=162:uncategorised&amp;Itemid=100146#download">version 2.6.10 (stable version) and 2.9.9b (in RC state)</a> fixes this issue.</p>
<p>If you cannot update VirtueMart, please follow those <a href="http://virtuemart.net/#fix">instructions</a>.</p>
<h3>Our Security policy</h3>
<p>There were recently some misconceptions about our security policy. Some people complain that we are not following the "Full Disclosure" philosophy (please read <a href="http://en.wikipedia.org/wiki/Full_disclosure_(computer_security)">Full disclosure (computer security)</a>&nbsp;). The "Full Disclosure" comes from the beginning of the open source movement and is also to see as an answer to the "non-disclosure" behavior of proprietary software vendors. The experience was that sent vulnerabilities were not fixed. So the people learnt that revealing the vulnerability in public lead to a fast reaction of the blamed company. The evil guys of this business just started to blackmail companies. <br />There are of course also some other advantages. In case of Linux kernels, the idea is that all together work on a fix for it. The leaks are often a lot complexer and so the more people know about the faster it is fixed. Furthermore anyone should be able to learn from the leak to prevent the issue in future.</p>
<p>In our case, the most security leaks are fixed within minutes, maybe within 1-2 hours. So the argument, the more people the faster a fix is ready is not suitable for joomla/extensions. So we are following the philosophy of the "responsible disclosure" (please read <a href="http://en.wikipedia.org/wiki/Responsible_disclosure">Responsible disclosure</a>&nbsp;). Also <a href="http://blog.sucuri.net/2014/07/responsible-disclosure-sucuri-open-letter-to-mailpoet-and-future-disclosures.html">sucuri.net</a> is following this idea. They are professionals and know how to handle a vulnerability for the best of all users. They informed us secretly about the problem. We fixed it within a day, they tested our fix and asked if it is the right time to inform their customers. We did the most important thing, to provide a fix, only missing was the "responsible disclosure". So I agreed, but misunderstood them, because I did not meant that they disclosure the vulnerability in detail. A correct disclosure in our environment (php, opensource) must also always contain an explanation to fix the issue manually. The other reason is that the problem is actually in the joomla user "model" , and it should be also fixed in the JUser to prevent misuse of it before we should do the "Full disclosure". Persuading the joomla developers to protect their model got complexer than thought. Their argument is that there is no problem as long as you are using the Joomla Form. We got just stuck and must now prepare an explanation, why it is always bad to allow any form to override internal variables of an object.</p>
<h3><a name="fix"></a>How to get the security fix without updating VirtueMart</h3>
<p>If you cannot update VirtueMart, there are two possibilites:</p>
<h4>Exchange the file models/user.php</h4>
<p>The easiest way is just to exchange the user model with the new one:</p>
<ol>
<li>Dowload the latest version (<a href="http://dev.virtuemart.net/attachments/download/784/com_virtuemart.2.6.10.zip">VirtueMart 2.6.10</a> or <a href="http://dev.virtuemart.net/attachments/download/791/com_virtuemart.2.9.9b.zip">VirtueMart 2.9.9b</a>)</li>
<li>Replace the file&nbsp;<span style="font-size: 10.9090909957886px; font-family: 'courier new', courier;">/administrator/components/com_virtuemart/models/user.php</span> with the new one.</li>
</ol>
<p>The user model is almost untouched for a year, so you should first try just to exchange the model.</p>
<h4>Patch the user.php file</h4>
<p>If you think your user model is too heavily modified, it is enough to add a unset($data['isRoot']); to the top of the user store function:</p>
<ol>
<li>Go to&nbsp;<span style="font-family: 'courier new', courier; font-size: 10.9090909957886px;">/administrator/components/com_virtuemart/models/user.php</span></li>
<li>Search for the function named<span style="font-family: 'courier new', courier;"> function&nbsp;store(&amp;$data,$checkToken = TRUE)</span></li>
<li>Replace <span style="font-family: 'courier new', courier;">if (!$user-&gt;bind($data)) { </span>with
<pre>if(!$user-&gt;authorise('core.admin','com_virtuemart')){
	$whiteDataToBind = array();
	$whiteDataToBind['name'] = $data['name'];
	$whiteDataToBind['username'] = $data['username'];
	$whiteDataToBind['email'] = $data['email'];
	if(isset($data['password'])) $whiteDataToBind['password'] = $data['password'];
	if(isset($data['password2'])) $whiteDataToBind['password2'] = $data['password2'];
	} else {
		$whiteDataToBind = $data;
	}
// Bind Joomla userdata
if (!$user-&gt;bind($whiteDataToBind)) {
		.....
</pre>
</li>
</ol>
<p>We just creating a new array and setting any variable manually (white list).</p>
<h3>The real problem behind all this</h3>
<p>The JUser model bind function just loops through the properties of the class and sets data with the same name to the object. The filtering is done by an attached JForm (Gui elements) to filter the input of the data. So if developers use the joomla model without form, they have to filter the data themself, else it is possible to override internal variables of the object. <br />The binding for normal JTables does not override internal variables as long you follow the habit/convention to name them with a trailing underscore _. The check function additionally ensures that the data is correct. But the juser object does not follow the own joomla habits. Additionally it is very unclean to use MVC and to have a model, which needs GUI elements to do correct filtering. There exists enough tasks to use a model without any GUI. For a developer just using the joomla API it is like a trap. A model should be secure by itself, without the need of a "View" or "Controller" to be safe. SCNR, but joomla 2.5.16 fixed a security leak in some the JFormFields. So other solutions based on that were also very unsecure for years.</p>
<p>The suggested fix in the joomla user model is very easy. Just unset the sensitive data, if a user is not admin. This should be done in the bind function and in the store function. The advantage lays on the hand. <br />A lot other extensions for joomla become more secure. It is very unlikely that only VM has this problem.<br />People can do a small joomla update and still use their modified extensions.</p>
<p>Personally I see the request for full disclosure as a typical academic, but noobish request. Not only the good guys learn from disclosures. The black hat fraction also learns from it. It is important to differ and sometimes a full disclosure makes absolut sense, but not always. It depends on the complexity of the problem, how many people already know about, the reaction of the maintainers, and so on.</p>
<p>&nbsp;</p></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 12 Sep 2014 13:20:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:32:"VirtueMart 2.6.8 includes Realex";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:75:"http://virtuemart.net/news/latest-news/461-virtuemart-2-6-8-includes-realex";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:75:"http://virtuemart.net/news/latest-news/461-virtuemart-2-6-8-includes-realex";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4338:"<div class="feed-description"><p>We are pleased to announce that Realex is now available through VirtueMart’s ecommerce solution.</p>
<div class="frontpage-features box-content"><img src="http://virtuemart.net/images/virtuemart/news/realex.png" alt="VirtueMart 2.6.8 includes Realex" class="align-left" />
<div class="bfc-o">
<h3><a href="http://www.realexpayments.com/partner-referral?id=virtuemart">Sign Up today</a></h3>
<p class="remove-margin">and receive 1 month free processing!</p>
</div>
</div>
<p>Use the Realex Payments integration as part of your VirtueMart e-commerce solution and benefit from a seamless, no-hassle integration offering industry-leading features and support.</p>
<h3>Why Choose Realex?</h3>
<p>Realex Payments is a leading European payment services provider, with offices in Dublin, London and Paris. We currently process in excess of €24 billion annually for over 12,500 clients including Virgin Atlantic, notonthehighstreet.com, Vodafone, Paddy Power and BooHoo.</p>
<p>Some of the key reasons merchants choose us over other gateways:</p>
<ul>
<li><strong>3DSecure - Protect yourself</strong> against fraud and chargebacks. We fully support 3DSecure, which provides additional protection should a chargeback occur.</li>
<li><strong>Access your funds quickly</strong> - The Acquiring Banks we work with typically settle funds into your account within 2 days, unlike 7 days for some of our competitors.</li>
<li><strong>Pricing - As you scale your business</strong>, other payment processors can very quickly become expensive. We offer a flat per transaction rate that can be tailored to your business as you grow.</li>
<li><strong>Customer Service - We don’t believe in IVRs</strong>, simply pick up the phone and speak with a familiar voice</li>
</ul>
<h3>Realex Features</h3>
<p>"<strong>Realex Payments are delighted to have partnered with the VirtueMart core team to build a simple to use and feature-rich integration.</strong>"</p>
<p>Features include:</p>
<ul class="check">
<li>Processing for all card payment types</li>
<li>Major alternative payment methods (PayPal, Sofort, GiroPay, ELV, iDeal)</li>
<li>Transactions processing in 150 currencies</li>
<li>Fully PCI level 1-compliant, responsive and customisable hosted payment page</li>
<li>1-Click checkout for a seamless checkout experience</li>
<li>Secure Card Tokenisation for recurring payments - RealVault</li>
<li>Dynamic Currency Conversion to allow shoppers to pay in their currency</li>
<li>Fraud checks: CVN, 3DSecure (incl. Amex SafeKey) and AVS</li>
<li>Comprehensive suite of fraud management tools - RealScore</li>
<li>Delayed/Deferred Settlement</li>
<li>Comprehensive Order Management (refund, void, settle) from the VirtueMart back-office</li>
<li>Plug and play access to our APIs</li>
<li>Comprehensive, configurable and flexible transaction routing capability</li>
</ul>
<h3>To Find Out More</h3>
<p>For more information please contact us on <a href="mailto:sales@realexpayments.com">sales@realexpayments.com</a> or <a href="http://www.realexpayments.com/partner-referral?id=virtuemart">Sign up</a> with Realex Payments today to get one month free processing and join the hundreds of VirtueMart merchants who know and trust us to process thousands of orders per week.</p>
<h3>Updates and bug fixes VirtueMart 2.6.8</h3>
<ul>
<li>Preventing double orders (3rd party developers may adjust their payments)</li>
<li>Shipment price display in product details</li>
<li>Better Itemid handling in the router</li>
<li>Thumbnail resizing if one dimension is 0 (same as already for vm3)</li>
<li>Router is using category model now, better use of already cached data</li>
<li>If <em>One Page Checkout</em> is disabled and <em>Show checkout steps</em> is activated, then the shipment and payment selection is only shown if a shipment/payment is already selected. So this give back the old VM1 behaviour</li>
<li>Little fix for shipment/payment tax with different VatTax rules</li>
<li>Fix for product cache (happened rare)</li>
<li>Lot small fixed typos, increased robustness, little enhancements</li>
</ul>
<p>&nbsp;</p>
<div class="special-download">
<p style="text-align: center;"><a href="http://virtuemart.net//downloads" class="button-primary">DOWNLOAD NOW</a></p>
</div></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:41:"valerie@virtuemart.net (Valérie Isaksen)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 15 Aug 2014 19:02:31 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:31:"
			
			
			
			
			
			
			
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:46:"Updates about VirtueMart 3, Support Membership";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:88:"http://virtuemart.net/news/latest-news/460-updates-about-virtuemart-3-support-membership";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:88:"http://virtuemart.net/news/latest-news/460-updates-about-virtuemart-3-support-membership";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:4:"true";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6611:"<div class="feed-description"><h2>VirtueMart 3, Core is ready for testing</h2>
<p>We finally can announce that the VirtueMart 3 core is ready as <a href="http://dev.virtuemart.net/attachments/download/759/com_virtuemart.2.9.8_extract_first.zip" target="_blank"><em>Release Candidate 2.9.8</em></a>. Now the remaining job is to test the core intensively on joomla 3.3 and to add missing backward compatibility for easy updating. As far we can see all API changes are done.</p>
<p>The primary task is now to test the plugins, adjust them to the new joomla 2.5 style and if necessary add fallbacks or provide developer information for switches in our <a href="http://docs.virtuemart.net/tutorials/development/175-code-adjustments-for-virtuemart-3.html">Code adjustments for Virtuemart 3</a>. This manual will grow, the more developers provide feedback, the faster. The plugins for the customfields must be updated. All extensions working with the customs need to be updated. Except for the plugins for the customfields, the old plugins will almost directly work. The xml files must be updated to j2.5 style. They need some adjustments&nbsp;anyway to run with Joomla 3 like using vRequest (respectivly JInput).</p>
<h3>The changes in VirtueMart 3</h3>
<p>Our priority for VM3 is to develop a robust core providing a cleaner structure and less code. We reduced the dependencies on joomla, but increased on the other hand the integration. For example, the core now uses only the JFormFields of joomla 2.5 and not any longer the old vmParameter, but we added vRequest (MIT) as choice for JInput. Developers can now use the normal JFormField joomla conventions for all plugins.</p>
<p>You can re-use your layouts by using the new sublayouts (like minilayouts). They give your store a consistent appearance and make it easier to adjust standards for different layouts in one overridable file. The input data is very unified which makes it stable against updates.</p>
<p>The new core has an advanced cart with enhancements to provide better update compatibility. For example the new custom userfields now include an option to be displayed on the checkout page and can use their own overridable mini layouts making it easy to adjust the cart to legal requirements without touching the template. The data stored in the session is minified and therefore the cart now uses normal products, which can be easily modified by plugins (for example to adjust the weight).</p>
<p>The new jQuery versions are now mainly the same as in joomla 3.3 (jQuery v1.11.0,jQuery UI - v1.9.2, legacy complete). Shops using joomla 2.5 with VM3 will also benefit from this. It will prevent needless configuration problems.</p>
<p>Frontend Editing combined with the joomla ACL now allows your vendors to directly access the VirtueMart backend from the frontend, without having real access to the joomla backend. This feature is still under heavily development and we are still looking for funds to complete it. So far vendors can just create new products, edit their products and list their products. It is the first step to make multivendor accessible for normal endusers.</p>
<p>"<span class="hasTip" title="If a user is only in a additional shoppergroup, he will become also automatically the default shoppergroup.">Additional Shoppergroup" is a new feature for shoppergroups, which do not replace the default groups.</span>
</p>
<p>New internal program caches reduce the sql queries for the most used tasks by more than 20%. &nbsp;</p>
<p>and of course the new customfields. With new options, redesigned and a lot more flexible to use.</p>
<h2>Planned</h2>
<p>A new trigger system, only for the checkout is started. It needs a new derived function/trigger and cannot be done with the old triggers. It will work with some kind of event system and call the proper plugins directly. We will write this after the first release. Old plugins then just need to be updated with the new trigger to participate in the new system.</p>
<p>Simple ajax reloading of component view. We are very happy that Max Galt, the developer of the cherry picker has donated his javascript code for dynamic reloading of products to the VirtueMart Project</p>
<p style="text-align: center;">Please download and test&nbsp; <br /><a href="http://dev.virtuemart.net/attachments/download/761/com_virtuemart.2.9.8a_extract_first.zip" class="button-primary">com_virtuemart.2.9.8a_extract_first.zip</a>
</p>
<p style="text-align: center;"><a class="button-primary" href="http://dev.virtuemart.net/attachments/download/760/VirtueMart2.9.8_Joomla_2.5.22-Stable-Full_Package.zip">VirtueMart2.9.8_Joomla_2.5.22-Stable-Full_Package.zip</a>
</p>
<h2>VirtueMart Support Membership</h2>
<p>We have successfully introduced a membership for the VirtueMart Project recently. We recognized that VirtueMart users want a safe support address if they find a bug and that a public forum is not adequate for serious business owners. In the past two years the core development team also had to spend too much time to provide customizations to make their living. Providing a really good maintained and professionally tested core takes more and more time and the complexity required to keep it simple for endusers and web agencies is increasing with every version.</p>
<ul>
	<li>VirtueMart continues with one free version</li>
	<li>Members are customers with access to our ticket system</li>
	<li>The membership helps the core developers to focus on the project and enables us to provide a very high code quality</li>
	<li>Any tier gives a vote for a desired feature to influence the roadmap</li>
	<li>Added value (multi-add layout, display shipment costs for products,...)</li>
</ul>
<p>There are also some nice ideas to enhance the core.&nbsp;For example multi-image upload, different sizes for images, more different layouts to choose from, angular js (very fast), more multivendor, multi-language tools, enhanced js for the BE, flexible and configurable OPC, ...</p>
<p>We also already invested into the <a href="https://www.indiegogo.com/projects/advance-the-joomla-url-router">new router of Hannes Papenberg</a> and it will be provided to the VirtueMart Support Members.</p>
<p style="text-align: center;"><a class="button-primary" href="http://extensions.virtuemart.net/support/virtuemart-supporter-membership-detail">Become a VirtueMart Associate Member</a>
</p>
<p>There is also already a thread about this in the forum&nbsp;<a href="http://forum.virtuemart.net/index.php?topic=124355.0">http://forum.virtuemart.net/index.php?topic=124355.0</a>
</p></div>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:6:"author";a:1:{i:0;a:5:{s:4:"data";s:26:"milbo@gmx.de (Max Milbers)";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:11:"Latest News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 04 Jul 2014 20:02:08 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";s:4:"href";s:61:"http://virtuemart.net/news/list-all-news?format=feed&type=rss";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:10:{s:4:"date";s:29:"Wed, 03 Jun 2015 10:06:38 GMT";s:6:"server";s:6:"Apache";s:3:"p3p";s:48:"CP=NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM";s:13:"cache-control";s:8:"no-cache";s:6:"pragma";s:8:"no-cache";s:10:"set-cookie";s:83:"9e647fd8d51d540064a09a04d5bcd417=2081674f76749ef6e749a7cfd4bc8759; path=/; HttpOnly";s:4:"vary";s:15:"Accept-Encoding";s:16:"content-encoding";s:4:"gzip";s:14:"content-length";s:5:"19216";s:12:"content-type";s:34:"application/rss+xml; charset=utf-8";}s:5:"build";s:14:"20090627192103";}