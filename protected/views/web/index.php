<?php
/* @var $this SiteController */
error_reporting(0);
$this->pageTitle=Yii::app()->name;
?>
<div class="bannercolor">
<div class="container">
<div class="row carousel-holder">

                    <div>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                                  <?php $datas= Banner::model()->findAllByAttributes(array('status'=>'1'));  
									$i=0;
									foreach($datas as $data)
									{
                                ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php $i; $i++ ?>" class=""></li>
                                                                        <?php } ?>
                            </ol>
                             <div class="carousel-inner">
                                  <?php $datas= Banner::model()->findAllByAttributes(array('status'=>'1'));  
									$i=0;
									foreach($datas as $data)
									{
                                                                            
                                                                            if($i==0) {
                                ?>
                                <div class="item active ">
                                    <a href="<?php echo $data['url']?>" > <img class="slide-image" src="<?php echo Yii::app()->baseUrl ?>/banner/<?php echo $data['image'] ?>" alt=""> </a>
                                </div>
                                                                        <?php
                                                                        }
                                                                        else 
                                                                        { ?>                                                                            
                    <div class="item ">
                        <a href="<?php echo $data['url']?>" >  <img class="slide-image" src="<?php echo Yii::app()->baseUrl ?>/banner/<?php echo $data['image'] ?>" alt=""> </a>
                                </div>
                                
                                                                        <?php   } 
                                                                        
                                                                        $i++;
                                                                        } ?>

                               
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
					</div>

                </div>
				</div>

    <div class="container">

        <div class="row">

            

            <div class="col-md-9">
                   
                 <div class="contentheadingwrapper">
                     <div class="contentheading">New England's #1 Woodworking Sales and Service Professionals !</div>
                 </div>

                
                <div class="featuredmainwrapper">
                     <div class="featuredwrapper">Featured Equipment</div>
                     <div class="show">
                         <script>
							 function paginging(vl)
							 {
								 //alert(vl)
								 $('#frompage').submit();
							 }
                         </script>
                         <form id="frompage" action="" method="GET">
                            
                              <select onchange="paginging(this.value)" name="paging">
                                     <option <?php if(isset($_GET['paging']) && $_GET['paging']==10 ) echo 'selected' ; ?> value="10" >Show 10</option>
		<option <?php if(isset($_GET['paging']) && $_GET['paging']==25 ) echo 'selected' ; ?> value="25" >Show 25</option>
                                     <option <?php if(isset($_GET['paging']) && $_GET['paging']==50 ) echo 'selected' ; ?> value="50">Show 50</option>
                                     <option <?php if(isset($_GET['paging']) && $_GET['paging']==100 ) echo 'selected' ; ?> value="100">Show 100</option>
		 <option value="all" <?php if(isset($_GET['paging']) && $_GET['paging']=='all' ) echo 'selected' ; ?>>Show All</option>
                              </select>
                         </form>
                     </div>
                 </div>
                 
                <div class="row">
     <?php 
if(isset($_GET['paging']))
{   $page=$_GET['paging'];

 if($_GET['paging']=='all')
 {
 $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and is_featured=1";                       
$page=1000;}
 else
 $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and is_featured=1 limit $page";
 
}                                          
else 
{
$page=10;



if(isset($_GET['page']))
{
    $start=(int)($_GET['page']-1) * (int)$page;

    //exit;
}
else
    $start=1;
$sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and is_featured=1 limit $start, $page";
}


                                           
                        $neweq = Yii::app()->db->createCommand($sql)->queryAll();
                        
                        
                        $sqlcount="SELECT count(*) as total FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and is_featured=1 limit $page"; 
                        $total = Yii::app()->db->createCommand($sqlcount)->queryRow();
 foreach ($neweq as $newe) {  ?>
                    <div class="col-sm-2">
                        <div class="thumbnail">
                            <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/small_<?php echo $newe['image_large'] ?>" alt="<?php echo $newe['name'] ?>">
							<div class="caption">
								<h6><strong><?php echo $newe['name'] ?></strong></h6>
								<p><a target="" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment/id/<?php echo $newe['id_equipment'] ?>">Details ></a></p>
							</div>
						</div>
                    </div> 
                      
 <?php } ?>
  <div class="pagination">
      <ul>
                                                    <?php if(isset($_GET['page']) && ($_GET['page']-1) >=1 ) { ?>
                                                    <li><a onclick="paging(<?php echo ($_GET['page']-1) ?> )" href="#"> Pervious </a> </li>
                                                    <?php } 
                                                    
 for($k=1; $k <=(int)$total['total']/$page+1; $k++) {
    

                                                    if($k==$_GET['page'])
{
                                                    ?>
                                                    
 <li class='active'>  <a onclick="paging(<?php echo $k ?>)" href="#"><?php echo $k ?> </a> </li>
<?php } else { ?>

                                                    
                                                    <li>  <a onclick="paging(<?php echo $k ?>)" href="#"><?php echo $k ?> </a> </li>
 <?php } } ?>

 <?php 
 if(!isset($_GET['page']))
     $_GET['page']=0;
 
 if(isset($_GET['page']) && ($_GET['page']+1) <(int)$total['total']/$page) { ?>
                                                    <li><a onclick="paging(<?php echo ($_GET['page']+1) ?> )" href="#"> Next </a> </li>
                                                    <?php } 
         
                                                    ?>
      </ul>
     </div>

                               
                </div>
                
                <div class="col-sm-3">
    <a target="_blank" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/featured">View more Featured Equipment></a>
               
                </div>
                
                <div class="slidemainwrapper" style="width:100%; border: 2px solid #7F80B0;">
                     <div class="slider4">
	<?php $datas= Manufacturer::model()->findAllByAttributes(array('status'=>'1')); 
									$j=0;
									foreach($datas as $data)
									{
                                                                            
                                                                            if($j==0) {
                                ?>
                         <div class="slide"><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/search?r=web%2Fadvanceseach&manufacture=<?php echo $data['id'] ?>"><img src="<?php echo Yii::app()->baseUrl ?>/logos/<?php echo $data['image_logo'] ?>"alt="<?php echo $data['image_logo'] ?>" ></a></div>
                                                             <?php
                                                                        }
                                                                        else 
                                                                        { ?>
                                  <div class="slide"><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/search?r=web%2Fadvanceseach&manufacture=<?php echo $data['id'] ?>"><img src="<?php echo Yii::app()->baseUrl ?>/logos/<?php echo $data['image_logo'] ?>"alt="<?php echo $data['image_logo'] ?>" > </a></div>
                                                <?php   } 
                                                                        
                                                                        $j++;
                                                                        } ?>
                    </div>
                    
   <script>
  jQuery(document).ready(function($){
  $('.slider4').bxSlider({
    slideWidth: 100,
    minSlides: 1,
    maxSlides: 6,
    moveSlides: 1,
    slideMargin: 10
  });
});
</script>
    </div>
                 
                 
                 
                 
                 <div class="row">
                  <div class="newequip">
                   <div class="featuredmainwrapper">
                     <div class="featuredwrapper">Featured NEW Equipment</div>
                 </div>
<?php //$neweq= Equipment::model()->findAllByAttributes(array('status'=>1),array('order'=>'id DESC'));
                                           $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and is_featured=1 and product_type=0 order by e.id DESC limit 3";
                        $neweq = Yii::app()->db->createCommand($sql)->queryAll();
 foreach ($neweq as $newe) {  ?>
                   <div class="col-sm-4 newcol-lg-4 col-md-4">
                        <div class="thumbnail">
                                  <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/small_<?php echo $newe['image_large'] ?>" alt="<?php echo $newe['name'] ?>">
							<div class="caption">
								<p><a target="" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment?id=<?php echo $newe['id_equipment'] ?>">Details ></a></p>
							</div>
						</div>
                    </div> 
                      
 <?php } ?>
                    
                    <div class="col-sm-3">
                   <a target="" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/condition/1">View more NEW Equipment></a></p>
                </div>
               
                  </div>  
                  
                  
                  <div class="soldequip">
                   <div class="featuredmainwrapper">
                     <div class="featuredwrapper">Recently SOLD Equipment</div>
                 </div>

                      <?php //$neweq= Equipment::model()->findAllByAttributes(array('status'=>1),array('order'=>'id DESC'));
                                           $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and sold_status=1 order by e.id DESC limit 2 ";
                        $neweq = Yii::app()->db->createCommand($sql)->queryAll();
                        
                        if (count($neweq) >0)
                        {
 foreach ($neweq as $newe) {  ?>
                   <div class="col-sm-4 new2col-lg-4 col-md-4 " >
                     <div class="soldimg"><img src="<?php echo Yii::app()->baseUrl ?>/design/imgs/newarrival/sold.png" /></div>
                      
                        <div class="thumbnail">
                               <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/small_<?php echo $newe['image_large'] ?>" alt="<?php echo $newe['name'] ?>">
							<div class="caption">
								<h6><strong><?php echo $newe['name'] ?></strong></h6>
								<p><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment?id=<?php echo $newe['id'] ?>">Details ></a></p>
							</div>
						</div>
                    </div> 
                      
 <?php } ?>
                      
                      
                  <div class="col-sm-3">
                    <a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/sold">View Recently SOLD Equipment></a></p>
               </div>
                        <?php } else { Echo '<h5 align=center >No item found </h5>' ; } ?>
                  </div>

 


                 </div>
            </div>
   <?php echo $this->renderPartial('_siderbar'); ?> 

        </div>

    </div>
    <!-- /.container -->
    
    
    <script>
    function paging(page)
    {
       // alert(page)
        
        
               var url = window.location.href;
       
     
                  var n = url.indexOf("&page");
                  
                             var a = url.indexOf("?");
                 // alert(a)
                  if(a==-1)
       window.location.href = url + '?page=' + page;                
                  else if(n!=-1)
                  { url = url.substring(0, n); 
       window.location.href = url + '&page=' + page;
                  }
                  else
                      window.location.href = url + '&page=' + page;
                      
       
       
            
            
            
        
    }
    </script>