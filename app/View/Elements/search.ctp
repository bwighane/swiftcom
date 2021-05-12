<?php if($showSearchbar): ?>
	<div class="container-fluid search-container" style="background: white; box-shadow: 0 0px 4px 0px rgba(0,0,0,.2),0 0px 5px 0 rgba(0,0,0,.14),0 0px 10px 0 rgba(0,0,0,.12); margin-bottom: 0px; padding: 0;">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div style="padding: 10px;">
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
<?php endif;?>