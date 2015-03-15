<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>	
    <div class="container">

        <div class="row">

         <div class="col-md-9">
				
                <h3>Company E-mail Directory</h3>
                <div class="featuredmainwrapper top10">
				<table width="600" border="0" cellpadding="5" cellspacing="0">
					  <tbody>

                                           <?php 
                    $news= Aboutus::model()->findAllByAttributes(array('id'=>'3','status'=>'1'));
                    foreach($news as $new)
									{
                    ?>
					
						<p><?php echo $new['content']?>.</p>
						<br clear="both" />
                                                
					
					<?php } ?>
					</tbody>
				</table>
                 </div>
            </div>
	
        
<?php echo $this->renderPartial('_siderbar'); ?> 
</div>

    </div>
    <!-- /.container -->
