<?php $this->pageTitle=Yii::app()->name;
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
                    <?php $datas= blog::model()->findAllByAttributes(array('type'=>1,'status'=>1),array('order'=>'id DESC')); 
                    foreach($datas as $data)
									{
                    ?>
					<div class="headline col-md-12">
                                            <div class="pull-left col-md-10"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/dblog/id/<?php echo $data['id'] ?>"><h5><strong><?php echo $data->date=date("d-m-Y",  strtotime($data->date)).'-'.$data['title']?> </a></strong></h5><p><?php echo substr($data['content'],0,150)?>.</p></div>
						<div class="pull-right col-md-2"><img width="80"src="<?php echo Yii::app()->baseUrl ?>/blogimgs/<?php echo $data['image'] ?>"></div>
					</div>
					<?php } ?>
				</div>
                    </div>
                    <div id="view2">
                <h3 class="featuredwrapper2 news"><strong>Machinery Article</strong></h3>
                 
                <div class="row">
                    <?php $datas= blog::model()->findAllByAttributes(array('type'=>2,'status'=>1),array('order'=>'id DESC')); 
                    foreach($datas as $data)
									{
                    ?>
					<div class="headline col-md-12">
                                            <div class="pull-left col-md-10"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/dblog/id/<?php echo $data['id'] ?>"><h5><strong><?php echo $data->date=date("d-m-Y",  strtotime($data->date)).'-'.$data['title']?> </a></strong></h5><p><?php echo substr($data['content'],0,150)?>.</p></div>
						<div class="pull-right col-md-2"><img width="80"src="<?php echo Yii::app()->baseUrl ?>/blogimgs/<?php echo $data['image'] ?>"></div>
					</div>
					<?php } ?>
				</div>
                    </div>
			<div id="view3">
                <h3 class="featuredwrapper2 news"><strong>Machinery Blog</strong></h3>
                 
                <div class="row">
                    <?php $dblogs= blog::model()->findAllByAttributes(array('type'=>3, 'status'=>1),array('order'=>'id DESC')); 
                    foreach($dblogs as $dblog)
									{
                    ?>
					<div class="headline col-md-12">
                                            <div class="pull-left col-md-10"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/dblog/id/<?php echo $dblog['id'] ?>"><h5><strong><?php echo $dblog->date=date("d-m-Y",  strtotime($dblog->date)).'-'.$dblog['title']?> </a></strong></h5><p><?php echo substr($dblog['content'],0,150)?>.</p></div>

			<div class="pull-right col-md-2"><img width="80"src="<?php echo Yii::app()->baseUrl ?>/blogimgs/<?php echo $dblog['image'] ?>"></div>
					</div>
					<?php } ?>

				</div>
			</div>
				<div style="text-align: right">
					<div class="pagination">
						<ul>
						  <li><a href="#"> Pervious </a> </li>
						  <li>  <a href="#"> 1 </a> </li>
						  <li>  <a href="#"> 2 </a> </li>
						  <li>  <a href="#"> 3 </a> </li>
						  <li>  <a href="#"> Next </a> </li>
						</ul>
					</div>                                                          
				</div>
                </div>
            </div>
			
<?php echo $this->renderPartial('_siderbar'); ?> 

	<?php // include("sidebar.php"); ?>

        </div>

    </div>
    <!-- /.container -->