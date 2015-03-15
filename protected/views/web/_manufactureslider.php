 
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