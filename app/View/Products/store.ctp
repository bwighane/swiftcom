<!-- <div class="row" style="margin-bottom: 15px;">
    <div class="col-xs-4 col-xs-push-4 col-md-2 col-md-push-5">
        <?php echo $this->Html->image('avatars/' . $store['User']['avatar'], array('style' => '', 'class' => 'img-responsive img-circle img-avatar')); ?>
    </div>
    <div class="col-xs-12 text-center" style="clear: both;">
        <h1 class="storename" style="text-transform: none;">
            <?php echo $storeName; ?> 
            <?php if(!empty($store['Store']['quick_access_name'])):?>
                <?php echo '<br />(@' . $store['Store']['quick_access_name'] . ')' ; ?>
            <?php endif;?>
        </h1>
        <p class="store-product-count"><?php echo $storeProductCount; ?> <?php if($storeProductCount == 1): echo 'item'; else:  echo 'items'; endif; ?></p>
        <p class="store-created">joined <span title="<?php echo $this->Time->niceShort($store['User']['created']); ?>" data-livestamp="<?php echo $this->Time->toUnix($store['User']['created']); ?>"></p>
    </div>
</div> -->
<div class="row" style="margin-bottom: 15px; padding: 10px;">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2"">
        <div class="row">
            <div class="col-xs-12 col-xs-6 col-xs-push-3 col-sm-3 col-sm-push-0 col-md-2">
                <?php echo $this->Html->image('avatars/' . $store['User']['avatar'], array('style' => '', 'class' => 'img-responsive img-circle img-avatar')); ?>
            </div>
            <div class="col-xs-12 col-sm-9 text-center col-md-8">
                <h1 class="storename" style="text-transform: none;">
                    <?php echo $storeName; ?> 
                    <?php if(!empty($store['Store']['quick_access_name'])):?>
                        <?php echo '(@' . $store['Store']['quick_access_name'] . ')' ; ?>
                    <?php endif;?>
                </h1>
                <p class="store-product-count"><?php echo $storeProductCount; ?> <?php if($storeProductCount == 1): echo 'item'; else:  echo 'items'; endif; ?></p>
                <p class="store-created">joined <span title="<?php echo $this->Time->niceShort($store['User']['created']); ?>" data-livestamp="<?php echo $this->Time->toUnix($store['User']['created']); ?>"></p>
                <!-- <p><button class="btn btn-primary btn-md"><span class="fa fa-plus">&nbsp;&nbsp;follow</span></button></p> -->
            </div>
        </div>
    </div>
</div>
<div class="row" b-resize>
    <!-- 'items in store' -->
    <?php echo $this->element('product_listing', array('title' =>  null, 'products' => $storeProducts)); ?>
    <?php if(count($stores) > 0): ?>
    <div class="col-xs-12 side col-md-3 col-md-pull-9 side-nav home-side-nav first-side-nav" id="more">
    	<?php echo $this->element('supplier_contacts', array('contacts' => $contacts));?>
        <?php if(isset($store['Store']['description']) && !empty($store['Store']['description'])): ?>
        <!-- <div class="side-options-panel rounded-and-shadowed >
            <h3 class="card-heading">shop description</h3>
            <hr class="no-padding-margin product-page-hr"/>
            <div class="row contact-row">
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                   <blockquote><?php echo $store['Store']['description']; ?></blockquote>
                </div>
            </div>
        </div> -->
        <?php endif;?>
        <?php echo $this->element('more_options');?>
    </div>
	<?php endif;?>
</div> 