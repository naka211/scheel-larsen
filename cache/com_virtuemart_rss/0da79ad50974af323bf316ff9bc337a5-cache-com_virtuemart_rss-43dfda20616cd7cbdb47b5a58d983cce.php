<?php die("Access Denied"); ?>#x#a:2:{s:6:"output";s:0:"";s:6:"result";a:5:{i:0;O:8:"stdClass":3:{s:4:"link";s:75:"http://virtuemart.net/news/latest-news/461-virtuemart-2-6-8-includes-realex";s:5:"title";s:32:"VirtueMart 2.6.8 includes Realex";s:11:"description";s:4148:"<div><p>We are pleased to announce that Realex is now available through VirtueMart’s ecommerce solution.</p>
<div><img src="http://virtuemart.net/images/virtuemart/news/realex.png" alt="VirtueMart 2.6.8 includes Realex" class="align-left" />
<div>
<h3><a href="http://www.realexpayments.com/partner-referral?id=virtuemart">Sign Up today</a></h3>
<p>and receive 1 month free processing!</p>
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
<ul>
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
<div>
<p><a href="http://virtuemart.net//downloads">DOWNLOAD NOW</a></p>
</div></div>";}i:1;O:8:"stdClass":3:{s:4:"link";s:88:"http://virtuemart.net/news/latest-news/460-updates-about-virtuemart-3-support-membership";s:5:"title";s:46:"Updates about VirtueMart 3, Support Membership";s:11:"description";s:6418:"<div><h2>VirtueMart 3, Core is ready for testing</h2>
<p>We finally can announce that the VirtueMart 3 core is ready as <a href="http://dev.virtuemart.net/attachments/download/759/com_virtuemart.2.9.8_extract_first.zip" target="_blank"><em>Release Candidate 2.9.8</em></a>. Now the remaining job is to test the core intensively on joomla 3.3 and to add missing backward compatibility for easy updating. As far we can see all API changes are done.</p>
<p>The primary task is now to test the plugins, adjust them to the new joomla 2.5 style and if necessary add fallbacks or provide developer information for switches in our <a href="http://docs.virtuemart.net/tutorials/development/175-code-adjustments-for-virtuemart-3.html">Code adjustments for Virtuemart 3</a>. This manual will grow, the more developers provide feedback, the faster. The plugins for the customfields must be updated. All extensions working with the customs need to be updated. Except for the plugins for the customfields, the old plugins will almost directly work. The xml files must be updated to j2.5 style. They need some adjustments&nbsp;anyway to run with Joomla 3 like using vRequest (respectivly JInput).</p>
<h3>The changes in VirtueMart 3</h3>
<p>Our priority for VM3 is to develop a robust core providing a cleaner structure and less code. We reduced the dependencies on joomla, but increased on the other hand the integration. For example, the core now uses only the JFormFields of joomla 2.5 and not any longer the old vmParameter, but we added vRequest (MIT) as choice for JInput. Developers can now use the normal JFormField joomla conventions for all plugins.</p>
<p>You can re-use your layouts by using the new sublayouts (like minilayouts). They give your store a consistent appearance and make it easier to adjust standards for different layouts in one overridable file. The input data is very unified which makes it stable against updates.</p>
<p>The new core has an advanced cart with enhancements to provide better update compatibility. For example the new custom userfields now include an option to be displayed on the checkout page and can use their own overridable mini layouts making it easy to adjust the cart to legal requirements without touching the template. The data stored in the session is minified and therefore the cart now uses normal products, which can be easily modified by plugins (for example to adjust the weight).</p>
<p>The new jQuery versions are now mainly the same as in joomla 3.3 (jQuery v1.11.0,jQuery UI - v1.9.2, legacy complete). Shops using joomla 2.5 with VM3 will also benefit from this. It will prevent needless configuration problems.</p>
<p>Frontend Editing combined with the joomla ACL now allows your vendors to directly access the VirtueMart backend from the frontend, without having real access to the joomla backend. This feature is still under heavily development and we are still looking for funds to complete it. So far vendors can just create new products, edit their products and list their products. It is the first step to make multivendor accessible for normal endusers.</p>
<p>"<span title="If a user is only in a additional shoppergroup, he will become also automatically the default shoppergroup.">Additional Shoppergroup" is a new feature for shoppergroups, which do not replace the default groups.</span>
</p>
<p>New internal program caches reduce the sql queries for the most used tasks by more than 20%. &nbsp;</p>
<p>and of course the new customfields. With new options, redesigned and a lot more flexible to use.</p>
<h2>Planned</h2>
<p>A new trigger system, only for the checkout is started. It needs a new derived function/trigger and cannot be done with the old triggers. It will work with some kind of event system and call the proper plugins directly. We will write this after the first release. Old plugins then just need to be updated with the new trigger to participate in the new system.</p>
<p>Simple ajax reloading of component view. We are very happy that Max Galt, the developer of the cherry picker has donated his javascript code for dynamic reloading of products to the VirtueMart Project</p>
<p>Please download and test&nbsp; <br /><a href="http://dev.virtuemart.net/attachments/download/761/com_virtuemart.2.9.8a_extract_first.zip">com_virtuemart.2.9.8a_extract_first.zip</a>
</p>
<p><a href="http://dev.virtuemart.net/attachments/download/760/VirtueMart2.9.8_Joomla_2.5.22-Stable-Full_Package.zip">VirtueMart2.9.8_Joomla_2.5.22-Stable-Full_Package.zip</a>
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
<p><a href="http://extensions.virtuemart.net/support/virtuemart-supporter-membership-detail">Become a VirtueMart Associate Member</a>
</p>
<p>There is also already a thread about this in the forum&nbsp;<a href="http://forum.virtuemart.net/index.php?topic=124355.0">http://forum.virtuemart.net/index.php?topic=124355.0</a>
</p></div>";}i:2;O:8:"stdClass":3:{s:4:"link";s:75:"http://virtuemart.net/news/latest-news/459-virtuemart-2-6-6-includes-paybox";s:5:"title";s:32:"VirtueMart 2.6.6 includes Paybox";s:11:"description";s:2342:"<div><p>We are pleased to announce that Paybox is now available through VirtueMart’s ecommerce solution.</p>
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
</div></div>";}i:3;O:8:"stdClass":3:{s:4:"link";s:71:"http://virtuemart.net/news/latest-news/458-new-release-virtuemart-2-6-2";s:5:"title";s:28:"New Release VirtueMart 2.6.4";s:11:"description";s:976:"<div><p>VirtueMart release pure bugfix release VM2.6.4</p>
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
</div></div>";}i:4;O:8:"stdClass":3:{s:4:"link";s:85:"http://virtuemart.net/news/latest-news/457-jday-france-2014-vm-2-6-0a-vm-for-joomla-3";s:5:"title";s:44:"Jday France 2014, VM 2.6.0a, VM for Joomla 3";s:11:"description";s:5135:"<div><ul>
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
<p>&nbsp;</p></div>";}}}