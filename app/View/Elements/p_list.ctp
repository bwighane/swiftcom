<div class="col-xs-12 col-md-9 col-md-push-3 p-list">
    <?php if($title): ?>
    <div class="row">
        <div class="col-xs-12 page-header-col">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-heade rounded-and-shadowe" tyle="background: white; background: #656D78; padding-top: 5px; padding-bottom: 5px;">
                        <h1 class="text-center" style="color: #656D78; font-size: 1.3em; margin-bottom: 10px; font-weight: normal;"><?php echo $title ?></h1>
                        
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            sort items <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo $this->Paginator->sort('created', 'recent entries', array('direction' => 'desc', 'lock' => true )); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('created', 'oldest entries', array('direction' => 'asc', 'lock' => true)); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('price', 'price : high to low', array('direction' => 'desc', 'lock' => true)); ?>
                            </li>
                            <li>
                                <?php echo $this->Paginator->sort('price', 'price : low to high', array('direction' => 'asc', 'lock' => true)); ?>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="row products-row" data-perfect-grid="2-4-4">
        <?php foreach($products as $product): ?>
            <?php echo $this->element($card, array('product' => $product)); ?>
        <?php endforeach;?>
    </div>
    <?php if(count($products) <= 0):?>
        <?php echo $this->element($emptystate); ?>
    <?php endif;?>
    <?php if($this->Paginator->hasNext() || $this->Paginator->hasPrev()): ?>
        <?php echo $this->element('pagination'); ?>
        <?php echo $this->element('basic_pagination'); ?>
    <?php endif;?>
</div>