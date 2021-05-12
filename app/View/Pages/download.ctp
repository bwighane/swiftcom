<?php //echo $this->element('search'); ?>
<div class="row" style="margin-top: 0%; padding-left: 5px;">
	<div class="col-xs-12 text-center" style="">
		<h1 style="font-weight: normal; font-size: 28px; margin-top: 5px; margin-bottom: 15px;">Shopping right at your finger tips.</h1>
		<p>
			<h3 style="font-weight: normal; font-size: 22px;">App requirements</h3>
			<ul style="list-style-type: none; margin-bottom: .5em;" class="download-ul" >
				<li>Android 4.1 (Jelly Bean) and up.</li>
			</ul>
		</p>
		<p>
			<h3 style="font-weight: normal; font-size: 22px;">Features</h3>
			<ul style="list-style-type: none; margin-bottom: .5em;" class="download-ul">
				<li>Recieve notification alerts of new items for sale.</li>
				<li>Choose what item types you want to be notified about.</li>
				<li>Browse items for sale in various categories.</li>
				<li>Search for specific items.</li>
				<li>Use the advanced search feature to refine your search <b>e.g based on your budget.</b></li>
				<li>Commincate to item owners via different channels like Whatsapp, E-mail, Phone Call, Facebook Twiter and more...</b></li>
			</ul>
		</p>
		<?php echo $this->Html->link('Download (.apk)', array('controller' => 'pages', 'action' => 'download', '?' => array('appd' => 1)), array('class' => 'btn btn-info btn-lg', 'style' => 'color: white !important;'));?>
		<span style="display: block; font-size: 14px; margin-top: 10px;"> App size 1.8MB v1.0 (Kalulu)</span>
	</div>
</div>