
<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>

<div class="container">

        <div class="row">
      <div class="col-md-9">
			
				
                <h3><?php //echo $category->name ?></h3>
                <div class="featuredmainwrapper">
                     <div class="featuredwrapper featuredwrapper2">Search Results</div>
                     <div class="show show2">
                         <form>
                              <select>
                                     <option>Show 10</option>
                              </select>
                         </form>
                     </div>
                 </div>
                 
                <div class="row">
              <?php //$neweq= Equipment::model()->findAllByAttributes(array('status'=>1),array('order'=>'id DESC'));
                                       //    $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and id_category=$category->id order by e.id DESC ";
                      //  $neweq = Yii::app()->db->createCommand($sql)->queryAll();
 foreach ($data as $newe) {  ?>
                    <div class="col-sm-2">
                        <div class="thumbnail">
                            <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/main_<?php echo $newe['image_large'] ?>" alt="">
							<div class="caption">
								<h6><strong><?php echo $newe['name'] ?></strong></h6>
								<p><a target="_blank" href="equipment?id=<?php echo $newe['id_equipment'] ?>">Details ></a></p>
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
