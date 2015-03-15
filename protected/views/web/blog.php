<?php $this->pageTitle=Yii::app()->name;
?>


				
    <div class="container">

        <div class="row">

            
			<div class="slidemainwrapper">
                     <div class="slider4">
	<?php $datas= Manufacturer::model()->findAllByAttributes(array('status'=>'1')); 
									$j=0;
									foreach($datas as $data)
									{
                                                                            
                                                                            if($j==0) {
                                ?>
                         <div class="slide"><a href="<?php echo $data['image_main_page'] ?>"><img src="<?php echo Yii::app()->baseUrl ?>/logos/<?php echo $data['image_logo'] ?>"alt="alt text" ></a></div>
                                                             <?php
                                                                        }
                                                                        else 
                                                                        { ?>
                                  <div class="slide"><a href="<?php echo $data['image_main_page'] ?>"><img src="<?php echo Yii::app()->baseUrl ?>/logos/<?php echo $data['image_logo'] ?>"alt="alt text" > </a></div>
                                                <?php   } 
                                                                        
                                                                        $j++;
                                                                        } ?>
                    </div>
                </div>
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2 news"><strong>Machinery Blog</strong></h3>
                 
                <div class="row">
                    <?php $datas= Blog::model()->findAll();$datas= blog::model()->findAllByAttributes(array('type'=>'3', 'status'=>1),array('order'=>'id DESC')); 
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
			
<?php echo $this->renderPartial('_siderbar'); ?> 

	<?php // include("sidebar.php"); ?>

        </div>

    </div>
    <!-- /.container -->
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
