<?php die("Access Denied"); ?>#x#a:2:{s:6:"output";s:0:"";s:6:"result";a:5:{i:0;O:8:"stdClass":3:{s:4:"link";s:88:"http://virtuemart.net/news/latest-news/460-updates-about-virtuemart-3-support-membership";s:5:"title";s:46:"Updates about VirtueMart 3, Support Membership";s:11:"description";s:6401:"<div><h2>VirtueMart 3, Core is ready for testing</h2>
<p>We finally can announce that the VirtueMart 3 core is ready as <a href="http://dev.virtuemart.net/attachments/download/759/com_virtuemart.2.9.8_extract_first.zip" target="_blank"><em>Release Candidate 2.9.8</em></a>. Now the remaining job is to test the core intensively on joomla 3.3 and to add missing backward compatibility for easy updating. As far we can see all API changes are done.</p>
<p>The primary task is now to test the plugins, adjust them to the new joomla 2.5 style and if necessary add fallbacks or provide developer information for switches in our <a href="http://docs.virtuemart.net/tutorials/development/175-code-adjustments-for-virtuemart-3.html">Code adjustments for Virtuemart 3</a>. This manual will grow, the more developers provide feedback, the faster. The plugins for the customfields must be updated. All extensions working with the customs need to be updated. Except for the plugins for the customfields, the old plugins will almost directly work. The xml files must be updated to j2.5 style. They need some adjustments&nbsp;anyway to run with Joomla 3 like using vRequest (respectivly JInput).</p>
<h3>The changes in VirtueMart 3</h3>
<p>Our priority for VM3 is to develop a robust core providing a cleaner structure and less code. We reduced the dependencies on joomla, but increased on the other hand the integration. For example, the core now uses only the JFormFields of joomla 2.5 and not any longer the old vmParameter, but we added vRequest (MIT) as choice for JInput. Developers can now use the normal JFormField joomla conventions for all plugins.</p>
<p>You can re-use your layouts by using the new sublayouts (like minilayouts). They give your store a consistent appearance and make it easier to adjust standards for different layouts in one overridable file. The input data is very unified which makes it stable against updates.</p>
<p>The new core has an advanced cart with enhancements to provide better update compatibility. For example the new custom userfields now include an option to be displayed on the checkout page and can use their own overridable mini layouts making it easy to adjust the cart to legal requirements without touching the template. The data stored in the session is minified and therefore the cart now uses normal products, which can be easily modified by plugins (for example to adjust the weight).</p>
<p>The new jQuery versions are now mainly the same as in joomla 3.3 (jQuery v1.11.0,jQuery UI - v1.9.2, legacy complete). Shops using joomla 2.5 with VM3 will also benefit from this. It will prevent needless configuration problems.</p>
<p>Frontend Editing combined with the joomla ACL now allows your vendors to directly access the VirtueMart backend from the frontend, without having real access to the joomla backend. This feature is still under heavily development and we are still looking for funds to complete it. So far vendors can just create new products, edit their products and list their products. It is the first step to make multivendor accessible for normal endusers.</p>
<p>"<span title="If a user is only in a additional shoppergroup, he will become also automatically the default shoppergroup.">Additional Shoppergroup" is a new feature for shoppergroups, which do not replace the default groups.</span></p>
<p>New internal program caches reduce the sql queries for the most used tasks by more than 20%. &nbsp;</p>
<p>and of course the new customfields. With new options, redesigned and a lot more flexible to use.</p>
<h2>Planned</h2>
<p>A new trigger system, only for the checkout is started. It needs a new derived function/trigger and cannot be done with the old triggers. It will work with some kind of event system and call the proper plugins directly. We will write this after the first release. Old plugins then just need to be updated with the new trigger to participate in the new system.</p>
<p>Simple ajax reloading of component view. We are very happy that Max Galt, the developer of the cherry picker has donated his javascript code for dynamic reloading of products to the VirtueMart Project</p>
<p>Please download and test&nbsp; <br /><a href="http://dev.virtuemart.net/attachments/download/759/com_virtuemart.2.9.8_extract_first.zip">com_virtuemart.2.9.8_extract_first.zip</a></p>
<p><a href="http://dev.virtuemart.net/attachments/download/760/VirtueMart2.9.8_Joomla_2.5.22-Stable-Full_Package.zip">VirtueMart2.9.8_Joomla_2.5.22-Stable-Full_Package.zip</a></p>
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
<p><a href="http://extensions.virtuemart.net/support/virtuemart-supporter-membership-detail">Become a VirtueMart Associate Member</a></p>
<p>There is also already a thread about this in the forum&nbsp;<a href="http://forum.virtuemart.net/index.php?topic=124355.0">http://forum.virtuemart.net/index.php?topic=124355.0</a></p></div>";}i:1;O:8:"stdClass":3:{s:4:"link";s:75:"http://virtuemart.net/news/latest-news/459-virtuemart-2-6-6-includes-paybox";s:5:"title";s:32:"VirtueMart 2.6.6 includes Paybox";s:11:"description";s:2342:"<div><p>We are pleased to announce that Paybox is now available through VirtueMart’s ecommerce solution.</p>
<p><strong><img src="http://virtuemart.boutique-paybox.com/PayboxLogo.jpg" width="200" alt="Paybox" style="margin: 5px auto; display: block;" /></strong></p>
<p>PAYBOX, the secured payment platform of&nbsp;<a href="http://www1.paybox.com/group-presentation/?lang=en"><span>Point-VeriFone Group,</span></a>&nbsp;offers a range of solutions and services to the e-merchants to manage their settlements, and this for all the sales channel.</p>
<p>Paybox currently processes payment flows for over 27,000 merchants and 120 million transactions per year.<br /> Paybox operates a payment service in conjunction with various actors in the e-commerce industry.</p>
<p>15 YEARS’ EXPERIENCE OF WORKING WITH A WIDE AND VARIED CUSTOMER BASE.</p>
<p>Paybox has been supporting online retailers in their day-to-day business for over 15 years, and offers a secure, flexible and turnkey payment solution that meets all your requirements thanks to its unique platform -&nbsp; cross-channel, multiple payment methods, multi-services, multi-bank, multi-currency - and its fraud management and reporting tools.</p>
<p>A wide range of technical environments enables Paybox to adapt its solutions to all types of project, from the most simple to the most complex whatever the size of your business, your sales channels or your business sector.</p>
<p>Paybox is certified and recognized by all banks (PCI/DSS 2.0 operator, 3-D Secure activated with all banks).</p>
<p>BY BEING PART OF POINT GROUP / VERIFONE, PAYBOX IS DEVELOPING ITS POSITION IN EUROPE AND INTERNATIONALLY.</p>
<p>The Paybox platform accepts 52 currencies, allowing you to cash your transactions anywhere in the world, either via your distance sale contract or via your connection contract with buyers and international payment methods.</p>
<h3>Updates and Bug Fixes</h3>
<ul>
<li>fix preventing creation of doubled orders</li>
<li>use for token check in updatesmigration.php the new vmCheckToken of vRequest</li>
<li>update of heidelpay payment plugin</li>
<li>fixed creation of slugs for "adding a child"</li>
<li>fixes while updating the tables for the Joomla updater</li>
</ul>
<div>
<p><a href="http://virtuemart.net/downloads">DOWNLOAD NOW</a></p>
</div></div>";}i:2;O:8:"stdClass":3:{s:4:"link";s:71:"http://virtuemart.net/news/latest-news/458-new-release-virtuemart-2-6-2";s:5:"title";s:28:"New Release VirtueMart 2.6.4";s:11:"description";s:976:"<div><p>VirtueMart release pure bugfix release VM2.6.4</p>
<p>This is a pure bug release. The liveupdater did not work, so we replaced it by the joomla updater. We also checked the language loaders which should work now more robust. The cache returns the JTable object again.&nbsp;</p>
<p>List of bugfixes:</p>
<ul>
	<li>Important Fix for vmtable. Cache gave back a standard object with the data. But before it was a JObject. The data is stored as standard object and bind to the table which is returned.</li>
	<li>Reworked loading of language files in email and invoice</li>
	<li>Correct language loader for plugins added</li>
	<li>Small fix for loadJLang (reset of tested path)</li>
	<li>Loading Be language, changed to FE language</li>
	<li>Added replyto the shopper in vendor email</li>
	<li>Akeeba liveupdater removed</li>
	<li>xml for joomla updater added</li>
</ul>
<div>
	<p><a href="http://virtuemart.net/downloads">DOWNLOAD NOW</a>
	</p>
</div></div>";}i:3;O:8:"stdClass":3:{s:4:"link";s:85:"http://virtuemart.net/news/latest-news/457-jday-france-2014-vm-2-6-0a-vm-for-joomla-3";s:5:"title";s:44:"Jday France 2014, VM 2.6.0a, VM for Joomla 3";s:11:"description";s:5135:"<div><ul>
<li>VirtueMart at the Joomladay France 2014,</li>
<li>Release of VirtueMart 2.6.0a</li>
<li>VirtueMart for Joomla 3</li>
</ul>
<h2>VirtueMart at the Joomladay France 2014</h2>
<p><a title="Joomladay France 2014" href="http://www.joomladay.fr" target="_blank"><img style="margin-right: 10px; margin-bottom: 10px; float: left;" src="http://joomladay.fr/badges2014/badge5.png" alt="JoomlaDay à Paris le 23 et 24 mai 2014" width="116" height="116" /></a>The <a title="Joomladay France 2014" href="http://www.joomladay.fr" target="_blank">eigth edition of JoomlaDay France</a>, after a few years spent in province, will take place in Paris, the <strong>23/24 of May 2014</strong>: 2 days with conferences and workshops.</p>
<p>Like every year, VirtueMart will be there for a <a href="http://joomladay.fr/programme-2014/conferences-en-detail-2014/211-virtuemart.html">conference</a> and a <a href="http://joomladay.fr/programme-2014/conferences-en-detail-2014/212-atelier-virtuemart.html">workshop</a>.</p>
<p>VirtueMart, the ecommerce reference for Joomla, has experiencing a growing success : the 30k downloads mark was exceeded in 15 days for the latest release, and the version 3.0 will soon take off.</p>
<p>Some figures about VirtueMart:</p>
<ul>
<li>A reliable ecommerce solution for over 10 years alongside Joomla</li>
<li>More than 250 000 sites in the world,</li>
<li>Among the top 5 e-Commerce solutions Open Source</li>
<li>More than 600 extensions (component, third party plugins )</li>
<li>Translated into more than 30 languages ​​,</li>
<li>An active international community .</li>
</ul>
<p>Discover, at this conference, the new VirtueMart version :</p>
<ul>
<li>Compatible Joomla 3.x</li>
<li>Faster</li>
<li>Even more secure</li>
<li>Improved custom fields</li>
<li>Settings optimized</li>
<li>Etc. .....&nbsp;</li>
</ul>
<p>The workshop will be presented by the <a href="http://virtuemart.fr/virtuemart/l-equipe">virtuemart.fr&nbsp;team</a>.&nbsp;The goal is to provide practical advice to</p>
<ul>
<li>Create complex products</li>
<li>Configure / create calculation rules</li>
<li>Overriding template</li>
<li>Creating a multilingual site</li>
</ul>
<p><br />Then we will listen to you and answer your questions.</p>
<div>
<h3>Come and participate in one of the major events of this new edition of French JoomlaDay 2014!</h3>
</div>
<h2>New Release Version 2.6.0a</h2>
<p><a href="http://dev.virtuemart.net/attachments/download/707/com_virtuemart.2.6.0a_extract_first.zip">Download now Version 2.6.0a</a></p>
<p>&nbsp;</p>
<p>List of fixes:</p>
<ul>
<li>Fix by Luiz Weber to prevent checkout of meanwhile sold out products</li>
<li>Preventing submitting twice an order</li>
<li>Added some missing language keys, removed obsolete ones (COM_VIRTUEMART_LOGINAME)</li>
<li>fixed updating orders with empty entries&nbsp;<a href="http://forum.virtuemart.net/index.php?topic=123694.0">http://forum.virtuemart.net/index.php?topic=123694.0</a></li>
<li>Search had problems for some products</li>
<li>Bug Fix for Vat calculation with different VatTax rules</li>
<li>fallback if glob is not supported</li>
<li>added switch prodOnlyWLang; You can switch with it between the old and new method to load products only with language or also without</li>
<li>added parameter to setCartPrices of vmspsplugin to give plugins the possibility to switch between linear or progressive fee calculation</li>
<li>added self::$langCount to config.php so we can use the vmtable of vm3 in vm2</li>
<li>added vmtable of vm3, slightly modified, take care of isSuperVendor</li>
<li>there was a small error preventing to create more then 10 children using the "same" slug</li>
<li>little fix for facebox</li>
<li>Paypal, IPN IPs checking in notification</li>
<li>Checking amount in Paypal standard (option cart) for IPN validation</li>
<li>added abs to the discount of avatax</li>
<li>Fix KlarnaCheckout</li>
<li>Klarna : birthday fix for Germany/Netherlands</li>
<li>Sample data: Yen has no decimal</li>
<li>admin VM module: fixed the mutliple submenus</li>
<li>moved the input fields of the form of the add to cart button back outside the else, so it is now always there (some js relies on it)</li>
<li>enhanced sample data</li>
<li>SystemCache was accidently activated in the fullinstaller</li>
<li>removed false positive error</li>
<li>added loading of language if misssing (for example to the installation finished screen).</li>
</ul>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h2>For the people waiting on VirtueMart for Joomla 3&nbsp;</h2>
<p>VirtueMart 3 is almost ready. The situation is maybe similar to vm2.5.3. The more testers and reports the faster we can release. Please download Virtuemart 2.9 (the beta for VM3) here&nbsp;<a href="http://dev.virtuemart.net/projects/virtuemart/files">http://dev.virtuemart.net/projects/virtuemart/files</a>. Search for the latest vm2.9.x, join us in the forum, tell us your experience with it <a href="http://forum.virtuemart.net/index.php?board=136.0">http://forum.virtuemart.net/index.php?board=136.0</a>.</p>
<p>&nbsp;</p></div>";}i:4;O:8:"stdClass":3:{s:4:"link";s:80:"http://virtuemart.net/news/latest-news/456-virtuemart-are-proud-to-release-vm2-6";s:5:"title";s:37:"VirtueMart are proud to release VM2.6";s:11:"description";s:13356:"<div><p><a href="http://virtuemart.net/#vm2.6">Release of VirtueMart 2.6</a>, <a href="http://virtuemart.net/#vm3">VirtueMart 3 for Joomla 3 </a>is coming soon. New:<a href="http://virtuemart.net/#download"> Full Installer</a>&nbsp;including Joomla and VirtueMart.&nbsp;</p>
<p><a href="http://virtuemart.net/#requirements">New minimum requirement for VirtueMart is <strong>php 5.3.10</strong></a></p>
<h2><a name="vm2.6"></a>Enhanced Features:</h2>
<p>With so many changes over the past couple of years, we noticed that many small and big features have been added to the core of VirtueMart. Some of these have been provided by 3rd party developers, whilst others were added as workarounds to remove/avoid bugs, or to complete a feature, which combined with our increased experience has translated into many more general and useful functions.</p>
<p>A good example of an enhanced usable feature is the way in which Virtuemart automatically sends emails. In VM1 emails were generated automatically for any and all order status changes, but VM1 had a different cart workflow, so we simply adjusted the workflow and made more use of the order status email system, however this rebounded with a different problem, in that the merchants felt spammed by their own shop. To address this issue, as part of the enhanced features, we have added a configuration setting for mail, so you can control which emails are used, resulting in a better end user experience.</p>
<h2>New Features:</h2>
<p>Some time back we started working on version vm2.1 and noticed that API changes would be required, whilst at the same time new bugs in VM2.0 were being found which forced us to stop development of VM2.1 at that stage to further fix VM2.0. However some developers needed those VM2.1 features, which they had already added to their customers' shopping carts and plugins, so we started to add backward compatible features back into the VM2.0 series, which resulted in us gathering together the developers' and users' ideas. Read here to get an idea&nbsp;<a href="http://forum.virtuemart.net/index.php?topic=123203.msg420458">http://forum.virtuemart.net/index.php?topic=123203.msg420458</a></p>
<h2>Re-implementation for backward compatibility:</h2>
<p>In the meantime, the Joomla world moved on and released Joomla 3.x which also has some API changes itself, so we had to replace some of the Joomla functions ourselves (for example JText against vmText), which exposed the situation that some of these revised functions were not in VM2.0. So to give our 3rd party developers the chance to write extensions compatible for VM2.0 and VM3 we have introduced these general functions to VM2.6, which makes VM2.6 the perfect interim version between VM2.0 and VM3.<br />The added features meant for VM2.2 and the implementation of the general functions required for VM3 justifies a direct jump to VM2.6 and also better reflects our progress in enhancing VirtueMart.</p>
<h2><a name="vm3"></a>VirtueMart 3 for Joomla 3</h2>
<p>The old VM2.1 trunk is completely synchronised with VM2.6 and will become the new VirtueMart 3; the version for developers is now VM2.9, so the VM2.0 series ends with VM2.6.x. VirtueMart 3 works on Joomla 2.5 and 3.2, which brings everything up to date and allows us to allocate our time now to developing VirtueMart 3.&nbsp;</p>
<p>This sounds complex, but endusers just need to know:</p>
<ul>
<li>version 2.6 is the interim between VM 2.0 and VM3= new features, no API changes, only compatible Joomla 2.5</li>
<li>version 3: coming soon, compatible Joomla 2.5&nbsp;and Joomla 3, contains API changes (mainly custom fields)</li>
</ul>
<h2><img style="display: block; margin-left: auto; margin-right: auto;" src="http://virtuemart.net/images/VirtueMart2/others/new-sample-data.png" alt="new-sample-data" width="600" height="488" /></h2>
<h2>Release strategy</h2>
<p>We are very happy about the changed release stragegy of joomla. Even maybe not written down clearly we had always a similar strategy. The version vm2.6 is now the last supported version of the vm2.x series and will be supported with security fixes at least the next 2 years. There are additional developer versions&nbsp;to the release strategy of joomla and the strategy to reimplement features of a new series back to the old. You may read more detailled about our roadmap here&nbsp;<a href="http://dev.virtuemart.net/projects/virtuemart/wiki/Roadmap">http://dev.virtuemart.net/projects/virtuemart/wiki/Roadmap</a></p>
<h2><a name="requirements">New minimum requirements for VirtueMart</a></h2>
<p>PHP 5.2.x is EOL since 3 years and 3 months. From the view of a technician or programmer there is no need to say that php5.2.x is completly outdated and unsecure. There are no fixes anylonger since 3 years, please read here&nbsp;<a href="http://php.net/eol.php">http://php.net/eol.php</a>. There are some critical issues in the encryption functions in the php5.2 versions. We worked as best backward compatible, but bugs are more likely. We even suggest to use php5.5 latest.</p>
<p>Therefore, the new minimum requirement for VirtueMart is php 5.3.10</p>
<h3>Features:</h3>
<p>- Moved language to the component folder<br />- new Sample Data<br />- Joomla Virtuemart Complete Installer<br />- Added GTIN and MPN<br />- automatically encryptes storing of fields in the database.<br />- stockable Plugin: Added functionality to order/reorder child products<br />- vmText,vmRequest and vmjsapi.php in own files/added them for BC to vm2.0<br />- added plgVmCouponInUse<br />- Added check in cart to get cart variant if not in productdetails form <br />- Added login for ask a question, recommend a product <br />- added multiple products for add to cart popup <br />- added cleaning of cache if config is stored <br />- added recaptcha for registration and ask a question/recommened to a friend<br />- Proper use of MyISAM and InnoDB according to its intended use.</p>
<h3>Bugfixes:</h3>
<p>- paypal response fixes<br />- Paypal Amount displayed in payment currency<br />- klarnacheckout live URI fix<br />- authorize: error message fix when invalid date</p>
<p>- removed stupid block which prevent managers to enter the BE (the "you are not vendor of the store problem")<br />- old ACL of vm is completly removed, proxy functions are still there, but using joomla authorization internally</p>
<p>- changed some more JText to vmText to prevent cutted description of customfields <br />- Fixed ordering of customfields<br />- changed slug filter, creates nicer slugs<br />- weight and length units should now be correctly displayed (and stored) for childs<br />- added deletion of customfields if a protocustom is deleted.<br />- Customfields values can be an array (multiple input)<br />- Userfields select list with size</p>
<p>- changed all xhtml to false, except for pdf creation<br />- Fallback for using tcpdf 6 with vm2.0</p>
<p>- added a fix, so that shoppergroups can be easier manipulated by session<br />- Pagination uses $limitStart = JRequest::getInt ('limitstart', 0); if you change the category/manufacturer<br />- coupon expiry date fix<br />- plgVmOnUserfieldDisplay userId fallback<br />- fix for double optin<br />- small enhances for calculator makes it possible to use the variant prices better within rules <br />- fixed country/state dropdown</p>
<p>- Cart controller now uses fallback to set the shipment/payment id of the cart in case the Request is empty<br />- one form for the cart, found BC solution<br />- fixed problem with TOS and agreed default set to 1<br />- fixed auto login if registering in checkout</p>
<p>- reviews emails: not sending an email when the review has not been saved.<br />- a lot of minors, little fallbacks, small completions, added a missing returns, added initializing of a variable ....<br />- replaced deprecated key_exists by array_key_exists</p>
<p><span><a name="download"><span>Download</span></a></span></p>
<p><!-- START: Articles Anywhere --><h1>Download VirtueMart now!</h1>
<p>VirtueMart is a powerful free ecommerce component for <a href="http://joomla.org">Joomla!®</a>. Easy to use for beginners and experts, it offers thousands of built in <a href="http://virtuemart.net/index.php?option=com_content&amp;view=article&amp;id=455&amp;Itemid=100010">features</a> to create your store professionally in some minutes.</p>
<p>VirtueMart 2.6.6 is the latest stable version available. It is compatible with<strong> Joomla! 2.5</strong>.</p>
<div>
<h3><a name="download">VirtueMart is an Open source project, and is free for download</a></h3>
</div>
<div>
<p><a href="http://dev.virtuemart.net/attachments/download/755/com_virtuemart.2.6.6_extract_first.zip">DOWNLOAD NOW<br /> VirtueMart component (core and AIO) only</a></p>
</div>
<div>
<p><a href="http://dev.virtuemart.net/attachments/download/754/VirtueMart2.6.6_Joomla_2.5.20-Stable-Full_Package.zip">DOWNLOAD NOW <br />Full installer includes Joomla with VirtueMart installed</a></p>
</div>
<ul>
<li><a href="http://virtuemart.net/community/translations/virtuemart">Download your language pack</a></li>
<li><a href="http://dev.virtuemart.net/projects/virtuemart/files">Download older versions of VirtueMart</a></li>
</ul>
<h3>How to start</h3>
<p><strong>You are new to Joomla and VirtueMart or you don't have Joomla already installed?</strong> we recommend to download the Full installer:</p>
<ol>
<li>Unzip the downloaded archive</li>
<li>Move the unzipped archive to your web folder</li>
<li>Open your browser and enter the URL of you website</li>
<li>The installation process starts. Follow the instructions.</li>
</ol>
<p><strong>You already have Joomla installed ?</strong> Download VirtueMart component (core and AIO)</p>
<ol>
<li>Unzip the downloaded archive</li>
<li>Install first the VirtueMart core component via the Joomla installer (com_virtuemart.w.x.y.zip)</li>
<li>Install the VirtueMart&nbsp;AIO component. It contains VirtueMart plugins and modules (com_virtuemart_ext_aio.w.x.y.zip)</li>
</ol>
<p>More detailed instructions can be found here:&nbsp;<a href="http://docs.virtuemart.net/tutorials/30-installation-migration-upgrade-vm-2/80-installation-of-virtuemart-2">installation instructions</a>.</p>
<p>You need more help? Visit our forum section about <a href="http://forum.virtuemart.net/index.php?board=115.0">Installation, Migration &amp; Upgrade VM 2</a>.</p>
<h3>Features</h3>
<p>VirtueMart includes natively a very important list of features such as:</p>
<ul>
<li>Complex product easily created</li>
<li>Easy Store Management</li>
<li>Powerful SEO features</li>
<li>Marketing and promotions tools included</li>
<li>Numerous payment providers integrated</li>
</ul>
<p>Discover <a href="http://virtuemart.net/index.php?option=com_content&amp;view=article&amp;id=455&amp;Itemid=100010">all the features</a>, and try <a href="http://virtuemart.net/index.php?option=com_content&amp;view=article&amp;id=145&amp;Itemid=97">our demo</a>.</p>
<h3>Requirements</h3>
<p>VirtueMart has the same <a href="http://www.joomla.org/technical-requirements.html">requirements as joomla</a>.<br />However, we recommend those technical options:<br />php 5.3+ and mysql5.5, php settings: 128 MB RAM (at least 64 MB for the pdf invoices).</p>
<h3>Hosting</h3>
<p>Hosting is an important part of the success of your business. VirtueMart has selected some hosts companies for their performance specialized in hosting VirtueMart shops:</p>
<div><a href="https://partners.a2hosting.com/solutions.php?id=4268&amp;url=453"><img style="margin-right: 10px; margin-bottom: 10px; float: left;" src="http://virtuemart.net/images/sobipro/entries/1905/a2%20hosting%20logo.png" alt="a2 hosting logo" height="45" width="171" /></a> High performance VirtueMart Hosting featuring 300% faster hosting than the competition on our SwiftServer SSDs! A2 Hosting is even a Global Joomla Sponsor and their <strong>24/7 Guru Crew Support team will install VirtueMart for you!</strong><a href="http://virtuemart.net/partners/links/1905-a2-hosting">(More about A2 hosting)</a></div>
<p>&nbsp;</p>
<div><a href="http://ccp.cloudaccess.net/aff.php?aff=2447"><img src="http://virtuemart.net/images/sobipro/entries/991/thumb_1.png" alt="thumb 1" style="margin-right: 15px; margin-bottom: 15px; float: left;" height="59" width="165" /></a> Joomla! Software as a Service - Application and Hosting Support all in One Package. We specialize in Joomla! hosting and support.&nbsp;<a href="http://virtuemart.net/partners/links/991-cloudaccessnet">(More about Cloudaccess)</a></div>
<p>&nbsp;</p>
<div><a href="http://www.joomla100.com/"><img style="margin-right: 15px; margin-bottom: 15px; float: left;" src="http://virtuemart.net/images/sobipro/entries/1915/thumb_joomla100.com.PNG" alt="thumb joomla100.com" height="67" width="166" /></a> Unser Shop-Paket ist ideal für Website-Betreiber, die im Internet einen Shop betreiben oder ihren Besuchern einen Katalog mit Produkten präsentieren möchten. In dieses Paket haben wir für Sie den VirtueMart Webshop mit Joomla 2.5 und VM 2.0 (inkl. kostenlosem Template eines VirtueMart-Entwicklers) integriert.&nbsp;<a href="http://virtuemart.net/partners/links/1915-joomla100com">(More about Joomla100.com)</a></div>
<p>&nbsp;</p><!-- END: Articles Anywhere -->
<p>&nbsp;</p></div>";}}}