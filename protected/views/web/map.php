<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">

         <div class="col-md-9">
				
                <h3>Location Map</h3>
                <div class="featuredmainwrapper">
                     <?php 
                    $news= Aboutus::model()->findAllByAttributes(array('id'=>'3','status'=>'1'));
                    foreach($news as $new)
									{
                    ?>
					
						<p><?php echo $new['content']?>.</p>
				</div>
					<br clear="both" />
                                                
					
					<?php } ?>
				<iframe width="700" height="500" frameborder="0" src="http://maps.google.com/maps?hl=en&amp;q=9+Delta+Drive,+Unit+OF+Londonderry,+NH+03053&amp;ie=UTF8&amp;cd=1&amp;sll=42.91349,-71.422665&amp;sspn=0.006295,0.006295&amp;z=14&amp;iwloc=addr&amp;ll=42.922932,-71.418428&amp;output=embed&amp;s=AARTsJofv-Mqsc2IEvTod0E7iDtaVduIgA" marginwidth="0" marginheight="0" scrolling="no"></iframe>
                 </div>
				 <?php echo $this->renderPartial('_siderbar'); ?> 
		</div>
</div>

    </div>
    <!-- /.container -->
