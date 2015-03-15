<script>
function gotocate(valu) {
    
    if(valu!=0)
      
      window.location =' <?php echo Yii::app()->baseUrl ?>/index.php/web/category/id/'+valu;
      
    //alert(valu)
}

function getlist(item)
{
//alert(item.value)
   $('#loadingmessage').show(); 
$.ajax({
  type: "POST",
  url: "<?php echo Yii::app()->createUrl('web/sideload'); ?>",
  data: { data: item.value }
})
  .done(function( msg ) {
  $('#loaddata').html(msg)
//    alert( "Data Saved: " + msg );

if(item.value=='v')
$('a#moreurl').attr("href", "<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/hits/1");

else if(item.value=='f')
$('a#moreurl').attr("href", "<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/featured/1");

else if(item.value=='r')
$('a#moreurl').attr("href", "<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/sold");



else if(item.value=='n')
$('a#moreurl').attr("href", "<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/new/1");

  $('#loadingmessage').hide(); 
  });


}



</script>

<div class="col-lg-4">
  <div class="well">
    <div class="input-group equip-search"> <?php echo CHtml::beginForm($action='?r=web/advanceseach', $method='get'); ?>
      <h5>Search Equipment</h5>
      <input type="text" name="product" class="form-control">
      <?php //$this->endWidget(); ?>
      <?php echo CHtml::endForm(); ?> </div>
    <div class="input-group cat-search">
      <h5>Category Search</h5>
      <select onchange="gotocate(this.value)" id="cateid">
        <option value="0" selected>Select a Category</option>
        <?php $cates = Category::model()->findAllByAttributes(array('status'=>1)); 
                                                        
 foreach ($cates as $cate) {
    

                                                        ?>
        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?> </option>
        <?php } ?>
      </select>
      <p><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/search">Advance Search ></a></p>
    </div>
					<hr>
    <!-- /input-group -->
    <div class="new-arrivals">
      <h4><strong>New Arrivals</strong></h4>
      <?php //$neweq= Equipment::model()->findAllByAttributes(array('status'=>1),array('order'=>'id DESC'));
          $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 order by e.id DESC limit 5";
          $neweq = Yii::app()->db->createCommand($sql)->queryAll();
 foreach ($neweq as $newe) {
                                        ?>
      <div class="col-sm-12">
        <div class="pull-left col-sm-2" style="margin: 0px 25px 10px -30px;padding: 0px;"><a  href="equipment?id=<?php echo $newe['id_equipment'] ?>"><img width="45" height="41" src="<?php echo Yii::app()->baseUrl ?>/upload/images/small_<?php echo $newe['image_large'] ?>"></a></div>
        <div class="col-sm-10" style="padding: 0px;"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment?id=<?php echo $newe['id_equipment'] ?>"><strong><p><?php echo substr($newe['name'],0,15)?></p></strong></a></div>
      </div>
					<hr>
      <?php } ?>
      <p><a class="more" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/new/1">More ></a></p>
    </div>
    <div id='loadingmessage' style='display:none'>
  <img src='<?php echo Yii::app()->baseUrl ?>/images/loading.gif'/>
</div>
    <div class="most-viewed">
      <div class="input-group cat-search">
        <select id="list" onchange="getlist(this)">
          <option selected value="v">Most viewed</option>
          <option value="f">Featured</option>
          <option value="r">Recently Sold</option>
          <option value="n">New Arival</option>
        </select>
      </div>
      <div id="loaddata">
        <?php                    
                                             $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 order by hits DESC limit 5";
                        $neweq = Yii::app()->db->createCommand($sql)->queryAll();
 foreach ($neweq as $newe) {
                                        ?>
        <div class="col-sm-12">
          <div class="pull-left col-sm-2" style="margin: 0px 25px 10px -30px;padding: 0px;"><a href="#"><img width="45" height="41" src="<?php echo Yii::app()->baseUrl ?>/upload/images/small_<?php echo $newe['image_large'] ?>"></a></div>
          <div class="col-sm-10" style="padding: 0px;"><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment?id=<?php echo $newe['id_equipment'] ?>"><strong><p><?php echo substr($newe['name'],0,15)?></p></strong></a></div>
        </div>
        <?php } ?>
      </div>
      <p><a  id="moreurl" class="more" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/hits/1">More ></a></p>
    </div>
  </div>
  <!-- /well --> 
</div>
