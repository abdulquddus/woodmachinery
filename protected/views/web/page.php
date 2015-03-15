<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
				<?php 
                    $news= Aboutus::model()->findAllByAttributes(array('id'=>$_GET["id"],'status'=>'1'));
                    foreach($news as $new)
					{
                ?>
                <h3 class="featuredwrapper2 about"><strong><?php echo $new['title']?></strong></h3>
                <div class="row">
                   <div class="col-md-12 pull-left">
					<?php echo $new['content']?>
					</div>
					<br clear="both" />
					<?php } ?>
				</div>
            </div>
			<?php echo $this->renderPartial('_siderbar'); ?> 
        </div>
    </div>
    <!-- /.container -->
