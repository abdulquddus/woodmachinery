<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2"><strong>I Want This Now</strong></h3>
                 
                <div class="row">
                    
                    <?php if (isset($send))
                        echo '<span>Request Has neeb sent</span>'; ?>
                    
                    <form name="" action="" method="POST">
<?php                                    $eqid=$_GET['id'];
$data=Equipment::model()->findByPk($eqid);

$images= EqImages::model()->findByAttributes(array('id_equipment'=>$eqid,'is_main'=>1)); 
?>
								<div class="submit-ticket callnow">
								<div class="pull-left callnow-top-img"><img src="../../upload/images/main_<?php echo $images['image_large'] ?>"/></div>
								<div class="pull-left callnow-top-heads">
									<ul>
										<li>Manufacturer</li>
										<li>Product Name</li>
										<li>Model</li>
										<li>Serial#</li>
										<li>Year</li>
										<li>Condition</li>
										<li>Hits</li>
										<li>Status</li>
										<li>Posted on</li>
										<li><strong>PRICE:</strong></li>
									</ul>
								</div>
									
								<div class="callnow-top-val">
									<ul>
										<li><?php echo Manufacturer::model()->findByPk($data->id_manufacturer)->name ?></li>
										<li><?php echo $data->name ?>.</li>
										<li><?php echo $data->model ?>.</li>
										<li><?php echo $data->serial_number ?>.</li>
										<li><?php echo $data->year ?> . </li>
										<li><?php 
           $cond= array(1=>'New',2=>'Used');
            
            echo $cond[$data->condition] ?></li>.
										<li><?php echo $data->hits ?> . </li>
										<li> <?php 
               $status= array(1=>'Available',2=>'Not Available');
                echo $status[$data->status] ?></li>.
										<li><?php echo $data->posted_on ?>.  </li>
										<li><strong>Call for Price</strong></li>
									</ul>
								</div>
								<p class="request-quote"><strong>Please complete and submit the form below!</strong> We will respond within 24 hrs! <em>All fields are required</em></p>
                                                                <input type="hidden" name="produectid" value="<?php echo $data->id ?>" />
                                                                <label>Company Name: </label><input name="Company" type="text" value=""><br>
								<label>Full Name: </label><input name="fname" type="text" value=""><br>
								<label>Phone/Mobile: </label><input name="phone" type="text" value=""><br>
								<label>Email: </label><input name="email" type="text" value=""><br>
								<label class="ticket-priority">Purchase options: </label>
									<select name="priority">
										<option value="" selected>Select One</option>
										<option value="">Make an offer</option>
										<option value="">Lease</option>
									</select><br>
								<span><label>Type your message: </label><br>
									<textarea cols="41" rows="5" name="comment" value=""></textarea></span><br>
								<span>
								<input name="submit" type="submit" value="submit">
								</span>
								</div>
							</form>
						
					</div>
                 
            </div>
			
			
<?php echo $this->renderPartial('_siderbar'); ?> 

        </div>

    </div>
    <!-- /.container -->
	
<?php //include("footer.php"); ?>