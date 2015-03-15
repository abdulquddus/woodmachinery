 <link href="<?php echo Yii::app()->baseUrl ?>/design/css/myCss.css" rel="stylesheet">

<script type="text/javascript">    
     function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Show Form";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Hide Form";
	}
} 
			
</script>
 <div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
<div class="container">
        <div class="row">
<div class="col-md-9">
		
     <?php //$sql="select * from tickets where client_id ='".Yii::app()->session['user']."' ";
   $sql="select * from ticket where id ='".$_GET['id']."' ";
                  //  echo  $sql;                       
                                                     $data = Yii::app()->db->createCommand($sql)->queryRow();
                                        
                                                     
                                                     ?>
               <section class="well-small mePadd" style="background-color:#EAEEFB;"><h2 class="meFont">
                      <?php //echo  $data['subject'] ?></h2>
			<div class="member_datail">
				<div class="infowrapper"><div class="infoleft"><b>Company Name:</b></div><div class="inforight"><?php echo  $data['company'] ?></div></div>
				<div class="infowrapper"><div class="infoleft"><b>Name:</b></div><div class="inforight"><?php echo  $data['full_name'] ?></div></div>
				<div class="infowrapper"><div class="infoleft"><b>Email:</b></div><div class="inforight"><?php echo  $data['email'] ?></div></div>
				<div class="infowrapper"><div class="infoleft"><b>Equipment Location:</b></div><div class="inforight"><?php echo  $data['eq_location'] ?></div></div>
				<div class="infowrapper"><div class="infoleft"><b>Details of Service Required:</b></div><div class="inforight"><?php echo  $data['details'] ?></div></div>
			</div>

			        	<div class="resTable2">
			            	<h4 class="alert alert-heading" style="font-style: italic;">
                                            Date modified: <span class="spnPadding"><?php echo  $data['date'] ?></span> 
			                <span class="floatR">
			                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal"> Reply</button>
			                <a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/closeticket/<?php echo $_GET['id'] ?>"><button class="btn btn-danger" type="button"> Close</button></a>
			                </span>
			                </h4>
			                
			                <div class="myTable4">
			                    <table class="table table-striped table-condensed">
			                      <tbody><tr class="tableFont">
			                        <td>ID</td>
			                       
			                        <td>Status</td>
			                        <td>Priority</td>
			                      </tr>
			                      <tr class="tableFont2">
			                        <td><?php echo  $data['id'] ?></td>
			                       
			               <td><center><div class="badge badge-success" style="width:65px;"><?php $staus=array(0=>'Close',1=>'Open'); echo  $staus[$data['status']] ?></div></center></td>
			                        <td>High</td>
			                      </tr>
			                    </tbody></table>
			                </div>
			            </div>
			            <hr> 
                                    <div class=""><h2 class="meFont" style="padding-bottom:30px;"> Conversation:</h2>          
                                       
                                        <?php $sql="SELECT * FROM  `ticket_detail` where ticket_id='".$_GET['id']."' "; 
                                                     $datas = Yii::app()->db->createCommand($sql)->queryAll();
                                        
                                                     foreach ( $datas as $dat) {
    

                                        ?>
                                        <li class="alert alert-user meUs">
								<img src="http://www.gravatar.com/avatar/8735be3fc8240d1d815dc94c47246d49?s=50&amp;d=mm&amp;r=g" width="50" height="50" class="img-circle">
								<span class="tableFont"> User:</span>
                                                                <span class="tableFont2" style="background-color:transparent;"><?php echo UserReg::model()->findByPk($dat['created_by'])->full_name ?></span>
								<h6 class="fk">Posted on: <span> <?php echo $dat['date'] ?></span></h6>
								<div class="padding-12 "><?php echo $dat['message'] ?></div>
                     		  </li>
                                  <?php } ?>
                                  
 					 </div>
          			 </section>
					 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;height:288px;"><!--Modal Starts-->
		        	<div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		            <h3 id="myModalLabel">Send a new message</h3>
		            </div>
							<form action="" method="post">
				            <div class="modal-body">
				            <textarea class="modalTextarea" required="required" name="message"></textarea>
				            </div>
				            <div class="modal-footer">
				            <input type="hidden" name="id" value="<?php echo $_GET['id']  ?>">
	                        <button class="btn btn-success" type="submit" name="openC"><span class="icon-arrow-right icon-white"></span> Send</button>
				            <button class="btn" data-dismiss="modal" aria-hidden="true"><span class="icon-thumbs-down"></span> Cancel</button>
				            </div>
				            </form>
				        
       			 </div>
                 
            </div>
                <?php echo $this->renderPartial('_siderbar'); ?> 
        </div>

    </div>
    <!-- /.container -->
	<script>
  jnon(document).ready(function($){
  $('.slider4').bxSlider({
    slideWidth: 100,
    minSlides: 1,
    maxSlides: 6,
    moveSlides: 1,
    slideMargin: 10
  });
});
</script>
