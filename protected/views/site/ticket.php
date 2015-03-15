 <link href="<?php echo Yii::app()->baseUrl ?>/design/css/myCss.css" rel="stylesheet">

<div class="container">

        <div class="row">

            


            <div class="col-md-9">
				
                
                     <div class="featuredwrapper"><h3 class="featuredwrapper2">All Tickets</h3></div>
                     <div class="show">
                         <form>
                              <select>
                                  <option value="all">All tickets</option>
                                     <option  value="close">Closed tickets</option>
                                     <option  value="open">Opened tickets</option>
                                     <option  value="ans">Answered tickets</option>
                              </select>
                         </form>
                     </div>
                 
                 
                <section class="well-small mePadd top40"> 
   <?php //$sql="select * from tickets where client_id ='".Yii::app()->session['user']."' ";
   $sql="select * from ticket ";
                  //  echo  $sql;                       
                                                     $data = Yii::app()->db->createCommand($sql)->queryAll();
                                                     
                                                     foreach ($data as $value) {
    

                                                     ?>
							<div class="myTable">
               				 <div class="tableH">
               				        
                                             
                                          
			                    <div class="resTable2" style="margin-top:-32px;">
				                    <table style="border:none;">
				                      <tbody><tr class="tableFont">
			                        <td>ID</td>
			                        
			                        <td>Subject</td>
			                       
			                        <td>Created Date</td>
			                      </tr>		 
                                              <tr class="tableFont2"> 	
                                                  <td><?php echo $value['id'] ?></td>
			                      <td>
			                        	<center><div class="badge badge-close" style="width:50px;">Open</div></center>
			                        </td>
			                        
                                               
			                        
			                        <td><?php echo $value['date'] ?></td>
			                      </tr>
			                    </tbody></table>
			                </div>
                                             
                                         
			                <div class="paddingRL resTable2 mePadB">
                                            <div class="tableW"><?php echo $value['details'] ?></div>
			                 <div class="pull-right paddingTop">
			                 <a href="<?php echo Yii::app()->baseUrl ?>/index.php/site/detailticket/<?php echo $value['id'] ?>"><button class="btn btn-info btnDetails" type="button">Details</button></a>
                             </div>
			              	</div>
                   		 </div>
                   		 </div>
    <?php } ?>
                    <!--Details Ends-->
					
							
							<hr></section>
                 
            </div>
            
            
            
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
