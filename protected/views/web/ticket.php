 <link href="<?php echo Yii::app()->baseUrl ?>/design/css/myCss.css" rel="stylesheet">
 <div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
 
 <script>
 function submitfrm()
 {
     $('#typefrm').submit();
     //alert('asdasd');
 }
 </script>
<div class="container">

        <div class="row">
            <div class="col-md-9">
				
                
                     <div class="featuredwrapper"><h3 class="featuredwrapper2">All Tickets</h3></div>
                     <div class="show">
                         <form id="typefrm" action="<?php echo Yii::app()->baseUrl ?>/index.php/web/ticket" method="GET" >
                             <select onchange="submitfrm()" id="type" name="type">
                                 <option value="-1">All tickets</option>
                                     <option <?php if(isset($_GET['type']) && $_GET['type']==0) echo 'selected' ;?>   value="0">Closed tickets</option>
                                     <option <?php if(isset($_GET['type']) && $_GET['type']==1) echo 'selected' ;?> value="1">Opened tickets</option>
                                     <option <?php if(isset($_GET['type']) && $_GET['type']==3) echo 'selected' ;?>  value="3">Answered tickets</option>
                              </select>
                             
                             </form>
                         
                     </div>
                 
                 
                <section class="ticketFix well-small mePadd top40"> 
   <?php 
if(isset($_GET['type']))
{ 
    $ty=$_GET['type'];
    $sta = "and status=$ty ";

    if($_GET['type']==-1)
            $sta ="";
}
else
    $sta ="";
//$sql="select * from tickets where client_id ='".Yii::app()->session['user']."' ";
    $sql="select * from ticket where client_id =".Yii::app()->session['user'] ." $sta " ;
                  //  echo  $sql;                       
                                                     $data = Yii::app()->db->createCommand($sql)->queryAll();
                                                     
                                                     foreach ($data as $value) {
    

                                                     ?>
							<div class="myTable">
               				 <div class="tableH">
               				        
                                             
                                          
			                    <div class="resTable2">
				                    <table style="border:none;">
				                      <tbody><tr class="tableFont">
			                        <td>ID</td>
			                        
			                        <td>Subject</td>
			                       
			                        <td>Created Date</td>
			                      </tr>		 
                                              <tr class="tableFont2"> 	
                                                  <td><?php echo $value['id'] ?></td>
			                      <td>
			                        	<center><div class="badge badge-close" style="width:50px;"><?php  $staus=array(0=>'Close',1=>'Open'); echo  $staus[$value['status']] ?></div></center>
			                        </td>
			                        
                                               
			                        
			                        <td><?php echo $value['date'] ?></td>
			                      </tr>
			                    </tbody></table>
			                </div>
                                             
                                         
			                <div class="paddingRL resTable2 mePadB">
                                            <div class="tableW"><?php echo $value['details'] ?></div>
			                 <div class="pull-right paddingTop">
			                 <a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/detailticket/<?php echo $value['id'] ?>"><button class="btn btn-info btnDetails" type="button">Details</button></a>
                             </div>
			              	</div>
                   		 </div>
                   		 </div>
    <?php } ?>
                    <!--Details Ends-->
					
							
							<hr></section>
                 
            </div>
            
            
            
<?php echo $this->renderPartial('_siderbar'); ?> 
        </div>

    </div>
    <!-- /.container -->
