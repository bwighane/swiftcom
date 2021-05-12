<div class="row">
	<div class="col-xs-12 profile-update-alert" style="padding-left: 10px;">
		<?php if($params['success']): ?>
			<div class="alert alert-info alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong> product added.
			</div>
		<?php else:?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> could not add product, try again.
			</div>
		<?php endif;?>
	</div>
</div>