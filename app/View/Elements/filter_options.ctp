<div class="dropdown" style="float: right; vertical-align: middle;">
  <button class="btn btn-default dropdown-toggle btn-xs" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    sort products
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
    <li><?php echo $this->Paginator->sort('created', 'latest', array('direction' => 'desc', 'lock' => true)); ?></li>
    <li><?php echo $this->Paginator->sort('created', 'oldest', array('direction' => 'asc', 'lock' => true)); ?></li>
    <li><?php echo $this->Paginator->sort('price', 'expensive', array('direction' => 'desc', 'lock' => true)); ?></li>
    <li><?php echo $this->Paginator->sort('price', 'cheapest', array('direction' => 'asc', 'lock' => true)); ?></li>
  </ul>
</div>