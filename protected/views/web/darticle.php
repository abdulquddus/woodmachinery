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
                </div>
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2 news"><strong>Industry News</strong></h3>
                 
                <div class="row">
                    <?php  $datas= blog::model()->findAllByAttributes(array('status'=>'1','type'=>'2','id'=>$_GET["id"]),array('order'=>'id DESC')); 
                    foreach($datas as $data)
									{
                    ?>
					<div class="headline col-md-12">
						<div class="pull-left col-md-10"><h5><strong><?php echo $data->date=date("d-m-Y",  strtotime($data->date)).'-'.$data['title']?></strong></h5><p><?php echo $data['content']?>.</p></div>
						<div class="pull-right col-md-2"><img width="80" src="<?php echo Yii::app()->baseUrl ?>/blogimgs/<?php echo $data['image'] ?>"></div>
						<br clear="both" />
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
