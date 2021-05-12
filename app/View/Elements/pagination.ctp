<div class="row pagination-row visible-sm visible-md visible-lg rounded-and-shadowed" style="margin-left: -5px;">
	<div class="col-sm-2">
		<?php echo $this->Paginator->prev('previous page'); ?>
	</div>
	<div class="col-sm-8 text-center">
		<?php echo $this->Paginator->numbers(); ?>
	</div>
	<div class="col-sm-2">
		<?php echo $this->Paginator->next('next page'); ?>
	</div>
</div>