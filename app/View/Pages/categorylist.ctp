
<div class="row category-list-row" id="cat">
	<div class="col-xs-12 col-md- col-md-offset-" style="padding: 0; padding-top: 10px;">
		<ul class="nav nav-stacked" id="accordion1">
            <!-- <li class="panel rounded-and-shadowed category-list-item list-item" style="margin-bottom: 7px;"> <a class="category-list-heading" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'home'))?>" style="color: #EE7500 !important;">view all products (latest)</a>
                </li> -->
            <h2 class="categories-heading text-center">all categories</h2>
            <div class="grid">
                <div class="grid-sizer col-xs-12 col-sm-3"></div>
                <?php foreach($categories as $category): ?>
                    <div class="grid-item category-list-grid-item col-xs-12 col-sm-3" data-link="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'category', $category['Category']['id']))?>">
                        <li class="panel rounded-and-shadowed category-list-item list-item" style="margin-bottom: 5px;"> 
                            <?php echo $this->Html->image('category_images/'. $category['Category']['image'], array('style' => 'width: 100%;')); ?>
                            <a style="padding-left: 5px;" class="category-list-heading" data-toggle="collaps" data-parent="#accordion1" href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'category', $category['Category']['id']))?>" style="backgroud: #E6E9ED;"><?php echo $category['Category']['name']; ?> (<?php echo $category['Category']['product_count']?>)</a>
                            <ul id="link<?php echo $category['Category']['id']; ?>" class="collaps"  style="list-style: none; padding-left: 5px;">
                                <!-- <li class="category-list-item category-list-item-text" style="padding-left: 0;"><?php echo $this->Html->link('view all', array('controller' => 'products', 'action' => 'category', $category['Category']['id'])); ?></li> -->
                                <?php foreach($category['Subcategory'] as $subcategory): ?>
                                    <li class="category-list-item-text" style="padding-left: 0;"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'subcategory', $subcategory['id']))?>"><?php echo $subcategory['name'] . ' (' . $subcategory['product_count'] . ')'; ?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- <li class="panel"> <a data-toggle="collapse" data-parent="#accordion1" href="#firstLink">Test12</a>

                <ul id="firstLink" class="collapse">
                    <li>SubTest1</li>
                    <li>SubTest1</li>
                    <li>SubTest1</li>
                </ul>
              
            </li>
            
            <li><a href="#">Test1</a>
            </li>
            <li><a href="#">Test1</a>
            </li> -->
        </ul>
	</div>
</div>
