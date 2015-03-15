<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">

            <div class="col-md-9">
				
                <h3 class="featuredwrapper2"><strong>Request a Quote</strong></h3>
                 
                <div class="row">
                    
                    <?php if (isset($send))
                        echo '<span>Request has been sent</span>'; ?>
                    
                    <form name="" action="" method="POST">
<?php                                    $eqid=$_GET['id'];
$data=Equipment::model()->findByPk($eqid);

$images= EqImages::model()->findByAttributes(array('id_equipment'=>$eqid,'is_main'=>1)); 
?>
		<div class="submit-ticket callnow">
			<div class="pull-left callnow-top-img pull-rght col-sm-2"><img src="../../upload/images/main_<?php echo $images['image_large'] ?>"/></div>
		<div class="pull-rght pull-rght col-sm-9" style="margin-right:5px">
		<div class="infowrapper">
			<div class="infoleft">Manufacturer</div> <div class="inforight"><?php echo Manufacturer::model()->findByPk($data->id_manufacturer)->name ?></div>
		</div>
		<div class="infowrapper">
			<div class="infoleft">Product Name</div> <div class="inforight"><?php echo $data->name ?>.</div>	
		</div>
		<div class="infowrapper">
			<div class="infoleft">Model</div> <div class="inforight"><?php echo $data->model ?>.</div>	
		</div>
		<div class="infowrapper">	
			<div class="infoleft">Serial#</div> <div class="inforight"><?php echo $data->serial_number ?>.</div>	
		</div>
		<div class="infowrapper">	
			<div class="infoleft">Year</div> <div class="inforight"><?php echo $data->year ?>.</div>	
		</div>
		<div class="infowrapper">	
			<div class="infoleft">Condition</div> <div class="inforight"><?php $cond= array(1=>'New',2=>'Used');  echo $cond[$data->condition] ?></div>	
		</div>
		<div class="infowrapper">	
			<div class="infoleft">Hits</div> <div class="inforight"><?php echo $data->hits ?></div>	
		</div>
		<div class="infowrapper">	
			<div class="infoleft">Status</div> <div class="inforight"><?php $status= array(1=>'Available',2=>'Not Available'); echo $status[$data->status] ?></div>	
		</div>
		<div class="infowrapper">	
			<div class="infoleft">Posted on</div> <div class="inforight"><?php echo $data->posted_on ?></div>	
		</div>
		<div class="infowrapper">	
			<div class="infoleft"><strong>PRICE:</strong></div> <div class="inforight">Call for Price</div>
		</div>
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