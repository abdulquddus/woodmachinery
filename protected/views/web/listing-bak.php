   
<?php // print_r($_GET); exit;




$where='';

$title='';
if(isset($_GET['condition']))
{
$where.="AND `condition` = ".$_GET['condition'];    

if($_GET['condition']==1)

$title='New Equipment';
else
$title='Used Equipment';

}

if(isset($_GET['sold']))
{
$where.="AND `sold_status` = 1";    
$title='Recently SOLD Equipment';
}


if(isset($_GET['featured']))
{
$where.="AND `is_featured` = 1";    
$title='Featured Equipment';
}



$order='order by';
if(isset($_GET['hits']))
{
$order .= '  hits DESC ,';    
$title='Most Viewed ';
}

if(isset($_GET['new']))
{
$order .= '  e.id DESC ,';    

$title='New Arrivals ';
}





$order=rtrim($order,',');

if($order=='order by')
    $order='order by e.id';


 //$sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1  $where $order limit $page ";

//$sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1";

if($order=='order by')
    $order='order by e.id';

if(isset($_GET['paging']))
{   $page=$_GET['paging'];

 if($_GET['paging']=='all')
      $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1  $where $order";
else
  $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1  $where $order limit $page";
 
}    

else 
{
$page=10;
$sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1  $where $order limit $page";
}




                        $neweq = Yii::app()->db->createCommand($sql)->queryAll();
                        
if(isset($_GET['id']))
{        $id=$_GET['id'];

$category= Category::model()->FindByPk($id);

}
?>

<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>

<div class="container">

        <div class="row">

            <div class="col-md-9">
			
				
                <h3><?php echo $title ?></h3>
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
                                     <option <?php if(isset($_GET['paging']) && $_GET['paging']==50 ) echo 'selected' ; ?> value="50">Show 50</option>
                                     <option <?php if(isset($_GET['paging']) && $_GET['paging']==100 ) echo 'selected' ; ?> value="100">Show 100</option>
				   <option value="all" <?php if(isset($_GET['paging']) && $_GET['paging']=='all' ) echo 'selected' ; ?>>Show All</option>
                              </select>
                         </form>
                     </div>
                 </div>
                 
                <div class="row">
              <?php //$neweq= Equipment::model()->findAllByAttributes(array('status'=>1),array('order'=>'id DESC'));
                                       //    $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and id_category=$category->id order by e.id DESC ";
                      //  $neweq = Yii::app()->db->createCommand($sql)->queryAll();
 foreach ($neweq as $newe) {  ?>
                    <div class="col-sm-2">
                        <div class="thumbnail">
                            <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/main_<?php echo $newe['image_large'] ?>" alt="">
							<div class="caption">
								<h6><strong><?php echo $newe['name'] ?></strong></h6>
								<p><a target="" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment?id=<?php echo $newe['id_equipment'] ?>">Details ></a></p>
							</div>
						</div>
                    </div>
					
 <?php } ?>
                   
                </div>
                 
            </div>
<?php echo $this->renderPartial('_siderbar'); ?> 
        </div>

    </div>
    <!-- /.container -->
