<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>				
    <div class="container">

        <div class="row">
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2 about"><strong>Terms & Conditions</strong></h3>
                 
                <div class="row">
                   <div class="col-md-12 pull-left">
						              <?php 
                    $news= Aboutus::model()->findAllByAttributes(array('id'=>'5','status'=>'1'));
                    foreach($news as $new)
									{
                    ?>
					
						<p><?php echo $new['content']?>.</p></div>
						<br clear="both" />
                                                
					
					<?php } ?>
						
						
					
				</div>
                 
            </div>
	<?php echo $this->renderPartial('_siderbar'); ?> 
        </div>

    </div>
    <!-- /.container -->
