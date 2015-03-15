<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">

         <div class="col-md-9">
				
                <h3>Message</h3>
             
					   <?php
							if ($mesg == 1)
							{
								echo "<strong>Please check your email address for the password</strong>";
							}

							else
							{
								echo "<strong>Provided email address is wrong</strong><br><a href='".Yii::app()->baseUrl."/index.php/web/servicetickets'>Go back</a>";
							}
						?>
                 </div>
				 <?php echo $this->renderPartial('_siderbar'); ?> 
		</div>
</div>

    </div>
    <!-- /.container -->
