<div class="row search-box" style="">
	<div class="col-xs-12 col-sm-12 col-md-12 rounded-and-shadowed search" style="background: white; padding: 7px;">
		<div class="row">
			<!-- <div class="col-md-2 visible-md visible-lg text-center col-md-offset-2">
				<h1 class="search-heading" style=" font-weight: normal; "><?php echo $this->Html->link($appName, array('controller' => 'pages', 'action' => 'home')); ?></h1>
			</div> -->
			<div class="col-xs-12  col-sm-12 col-sm-offset- col-md-offset-2 col-md-8 ">
				<?php echo $this->Form->create('Product', array( 'id'=>'genaral-search-form', 'url' => array( 'controller' => 'products','action' => 'search'), 'inputDefaults' => array('div' => 'input-group', 'label' => false, 'class' => 'form-control input-sm')));?>
				<div class="input-group">
					<!-- what are you looking for? -->
					<input name="data[Product][_q]" class="form-control input-md" placeholder="item, @shop or #hashtag" add-on="search" id="ProductQ" type="text">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default btn-md" id="general-search-button"><!-- <i class="fa fa-search"></i>  -->search</button>
					</span>
				</div>
				<?php echo $this->Form->end();?>
			</div>
		</div>
	</div>
</div>