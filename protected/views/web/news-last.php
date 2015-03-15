<?php $this->pageTitle=Yii::app()->name;

$page=2;
?>
<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>					
    <div class="container">

        <div class="row">

           <div class="col-md-9">
	<ul class="tabs" data-persist="true">
            <li><a href="#view1">News</a></li>
            <li><a href="#view2">Article</a></li>
            <li><a href="#view3">Blog</a></li>
        </ul>
                <div class="tabcontents">
                    <div id="view1">
                <h3 class="featuredwrapper2 news"><strong>Industry News</strong></h3>
                 
                <div class="row">
                    <?php 
      
                    
if(isset($_GET['page']))
{
    $start=(int)($_GET['page']-1) * (int)$page;

    //exit;
}
else
    $start=1;



                   $datas= Blog::model()->findAllByAttributes(array('type'=>'1','status'=>1),array('order'=>'id DESC','limit'=>$page,'offset'=>$start));
       
                    //$sql="select * from blog  where type=1 and status = 1 limit 1   ";
                    //$datas= Yii::app()->db->createCommand($sql)->queryAll();

                    
                                //$datas1= Blog::model()->findAll();
                                $datas1= Blog::model()->findAllByAttributes(array('type'=>'1','status'=>1));
                    
                    $total=count($datas1);
                    foreach($datas as $data)
									{
                    ?>
					<div class="headline col-md-12">
                                            <div class="pull-left col-md-10"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/dblog/id/<?php echo $data['id'] ?>"><h5><strong><?php echo $data->date=date("d-m-Y",  strtotime($data->date)).'-'.$data['title']?> </a></strong></h5><p><?php echo substr($data['content'],0,150)?>.</p></div>
						<div class="pull-right col-md-2"><img width="80"src="<?php echo Yii::app()->baseUrl ?>/blogimgs/<?php echo $data['image'] ?>"></div>
					</div>
					<?php } ?>
				</div>
                    
                    <div style="text-align: right">
		
               <div class="pagination">
						<ul>
                                                    <?php if(isset($_GET['page']) && ($_GET['page']) >=1 ) { ?>
                                                    <li><a onclick="paging(<?php echo ($_GET['page']-1) ?> )" href="#"> Pervious </a> </li>
                                                    <?php } 
                                                    
 for($k=1; $k <=(int)$total/$page; $k++) {
    

                                                    
                                                    ?>
                                                    
                                                    
                                                    <li>  <a onclick="paging(<?php echo $k ?>)" href="#"><?php echo $k ?> </a> </li>
 <?php } ?>

 <?php 
 if(!isset($_GET['page']))
     $_GET['page']=0;
 
 if(isset($_GET['page']) && ($_GET['page']+1) >=1  && ($_GET['page'])<(int)$total/$page ) { ?>
                                                    <li><a onclick="paging(<?php echo ($_GET['page']+1) ?> )" href="#"> Next </a> </li>
                                                    <?php } 
         
                                                    ?>
						</ul>
					</div> 
				</div>
                    </div>
 
                    <div id="view2">
                <h3 class="featuredwrapper2 news"><strong>Machinery Article</strong></h3>
                 
                <div class="row">
                    
    <?php                 
if(isset($_GET['pagem']))
{
    $startm=(int)($_GET['pagem']-1) * (int)$page;

    //exit;
}
else
    $startm=1;

    
    ?>
                    <?php $datas= Blog::model()->findAllByAttributes(array('type'=>'2','status'=>1),array('order'=>'id DESC','limit'=>$page,'offset'=>$startm)); 
                    
                    $datas1= Blog::model()->findAllByAttributes(array('type'=>'2','status'=>1));
                    $total=count($datas1);
                    foreach($datas as $data)
									{
                    ?>
					<div class="headline col-md-12">
                                            <div class="pull-left col-md-10"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/dblog/id/<?php echo $data['id'] ?>"><h5><strong><?php echo $data->date=date("d-m-Y",  strtotime($data->date)).'-'.$data['title']?> </a></strong></h5><p><?php echo substr($data['content'],0,150)?>.</p></div>
						<div class="pull-right col-md-2"><img width="80"src="<?php echo Yii::app()->baseUrl ?>/blogimgs/<?php echo $data['image'] ?>"></div>
					</div>
					<?php } ?>
				</div>
                
                
                    <div style="text-align: right">
		
               <div class="pagination">
						<ul>
                                                    <?php if(isset($_GET['pagem']) && ($_GET['pagem']) >=1 ) { ?>
                                                    <li><a onclick="pagingm(<?php echo ($_GET['pagem']-1) ?> )" href="#"> Pervious </a> </li>
                                                    <?php } 
                                                    
 for($k=1; $k <=(int)$total/$page; $k++) {
    

                                                    
                                                    ?>
                                                    
                                                    
                                                    <li>  <a onclick="pagingm(<?php echo $k ?>)" href="#"><?php echo $k ?> </a> </li>
 <?php } ?>

 <?php 
 if(!isset($_GET['pagem']))
     $_GET['pagem']=0;
 
 if(isset($_GET['pagem']) && ($_GET['pagem']+1) >=1  && ($_GET['pagem'])<(int)$total/$page ) { ?>
                                                    <li><a onclick="pagingm(<?php echo ($_GET['pagem']+1) ?> )" href="#"> Next </a> </li>
                                                    <?php } 
         
                                                    ?>
						</ul>
					</div> 
				</div>
                    </div>
			<div id="view3">
                <h3 class="featuredwrapper2 news"><strong>Machinery Blog</strong></h3>
                 
                <div class="row">
                    
                    <?php                 
if(isset($_GET['pageb']))
{
    $startb=(int)($_GET['pageb']-1) * (int)$page;

    //exit;
}
else
    $startb=1;

    
    ?>
                    
                    
                    <?php 
                    $datas= Blog::model()->findAllByAttributes(array('type'=>'3', 'status'=>1),array('order'=>'id DESC','limit'=>$page,'offset'=>$startb)); 
                    
                    $datas1= Blog::model()->findAllByAttributes(array('type'=>'3', 'status'=>1)); 
                   $total=count($datas1);
                    
                    foreach($datas as $data)
									{
                    ?>
					<div class="headline col-md-12">
                                            <div class="pull-left col-md-10"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/dblog/id/<?php echo $data['id'] ?>"><h5><strong><?php echo $data->date=date("d-m-Y",  strtotime($data->date)).'-'.$data['title']?> </a></strong></h5><p><?php echo substr($data['content'],0,150)?>.</p></div>

			<div class="pull-right col-md-2"><img width="80"src="<?php echo Yii::app()->baseUrl ?>/blogimgs/<?php echo $data['image'] ?>"></div>
					</div>
					<?php } ?>

				</div>
                
                
                    <div style="text-align: right">
		
               <div class="pagination">
						<ul>
                                                    <?php if(isset($_GET['pageb']) && ($_GET['pageb']) >=1 ) { ?>
                                                    <li><a onclick="pagingb(<?php echo ($_GET['pageb']-1) ?> )" href="#"> Pervious </a> </li>
                                                    <?php } 
                                                    
 for($k=1; $k <=(int)$total/$page; $k++) {
    

                                                    
                                                    ?>
                                                    
                                                    
                                                    <li>  <a onclick="pagingb(<?php echo $k ?>)" href="#"><?php echo $k ?> </a> </li>
 <?php } ?>

 <?php 
 if(!isset($_GET['pageb']))
     $_GET['pageb']=0;
 
 if(isset($_GET['pageb']) && ($_GET['pageb']+1) >=1  && ($_GET['pageb'])<(int)$total/$page ) { ?>
                                                    <li><a onclick="pagingb(<?php echo ($_GET['pageb']+1) ?> )" href="#"> Next </a> </li>
                                                    <?php } 
         
                                                    ?>
						</ul>
					</div> 
				</div>
                
                
                
			</div>
				
                </div>
               
            </div>
			
<?php echo $this->renderPartial('_siderbar'); ?> 

	<?php // include("sidebar.php"); ?>

        </div>

    </div>
 <script>
    function paging(page)
    {
               var url = window.location.href;
                  var n = url.indexOf("&page");
                  
                             var a = url.indexOf("?");
                  if(a==-1)
       window.location.href = url + '?page=' + page;                
                  else if(n!=-1)
                  { url = url.substring(0, n); 
       window.location.href = url + '&page=' + page;
                  }
                  else
                      window.location.href = url + '&page=' + page;
      }
      
      function pagingm(page)
    {
               var url = window.location.href;
                  var n = url.indexOf("&pagem");
                  
                             var a = url.indexOf("?");
                  if(a==-1)
       window.location.href = url + '?pagem=' + page;                
                  else if(n!=-1)
                  { url = url.substring(0, n); 
       window.location.href = url + '&pagem=' + page;
                  }
                  else
                      window.location.href = url + '&pagem=' + page;
      }
      
      
      function pagingb(page)
    {
               var url = window.location.href;
                  var n = url.indexOf("&pageb");
                  
                             var a = url.indexOf("?");
                  if(a==-1)
       window.location.href = url + '?pageb=' + page;                
                  else if(n!=-1)
                  { url = url.substring(0, n); 
       window.location.href = url + '&pageb=' + page;
                  }
                  else
                      window.location.href = url + '&pageb=' + page;
      }
      
      
    </script>
    <!-- /.container -->