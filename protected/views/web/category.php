  
 <?php 

error_reporting(0);
// print_r($_GET); exit;if(isset($_GET['id']))
   {    $id=$_GET['id'];$category= Category::model()->FindByPk($id);
   
   }?>
<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
   
<div class="container"> 
    <div class="row">
        <div class="col-md-9">
            <h3><?php echo $category->name ?></h3>
            <div class="featuredmainwrapper"> 
                <div class="featuredwrapper featuredwrapper2">Equipment Category</div>
                <div class="show show2">   
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


if(isset($_GET['page']))
{
    $start=(int)($_GET['page']-1) * (int)$page;
}
else
    $start=1;



 if($_GET['paging']=='all')
 {
      $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and id_category=$category->id order by e.id DESC ";
 $page=1000;
      
 }
      else
  $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and id_category=$category->id order by e.id DESC limit $start, $page";
 
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



$sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and id_category=$category->id order by e.id DESC limit  $start, $page";


}
//
$sqlcount="SELECT count(*) as total FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and id_category=$category->id order by e.id DESC ";
$total = Yii::app()->db->createCommand($sqlcount)->queryRow();

////$neweq= Equipment::model()->findAllByAttributes(array('status'=>1),array('order'=>'id DESC'));     
                     // $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and id_category=$category->id order by e.id DESC ";       
                      $neweq = Yii::app()->db->createCommand($sql)->queryAll(); foreach ($neweq as $newe) {  ?>        
                <div class="col-sm-2">    
                    <div class="thumbnail"> 
                        <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/main_<?php echo $newe['image_large'] ?>" alt="">	
                        <div class="caption">
                            <h6><strong><?php echo $newe['name'] ?></strong></h6>	
                            <p><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment?id=<?php echo $newe['id_equipment'] ?>">Details ></a></p>	
                        </div>		
                    </div>   
                </div>				
	 <?php } ?>  
            </div>
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
        </div><?php echo $this->renderPartial('_siderbar'); ?> 
    </div>    </div>


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
    </script><!-- /.container -->