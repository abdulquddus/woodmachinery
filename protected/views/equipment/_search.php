<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(	'action'=>Yii::app()->createUrl($this->route),	'method'=>'get',)); ?>		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>		<?php echo $form->textFieldRow($model,'id_category',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'id_manufacturer',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'model',array('class'=>'span5','maxlength'=>200)); ?>		<?php echo $form->textFieldRow($model,'serial_number',array('class'=>'span5','maxlength'=>200)); ?>		<?php echo $form->textFieldRow($model,'year',array('class'=>'span5','maxlength'=>10)); ?>		<?php echo $form->textFieldRow($model,'sold_status',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'condition',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'hits',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'posted_on',array('class'=>'span5')); ?>		<?php echo $form->textAreaRow($model,'detail',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>		<?php echo $form->textAreaRow($model,'feature',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>		<?php echo $form->textAreaRow($model,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>		<?php echo $form->textFieldRow($model,'is_featured',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'video',array('class'=>'span5','maxlength'=>200)); ?>		<?php echo $form->textFieldRow($model,'year_of_manufacturer',array('class'=>'span5','maxlength'=>10)); ?>		<?php echo $form->textFieldRow($model,'price_type',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'price_start',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'price_end',array('class'=>'span5')); ?>		<?php echo $form->textFieldRow($model,'lease_time',array('class'=>'span5','maxlength'=>200)); ?>		<?php echo $form->textFieldRow($model,'lease_price',array('class'=>'span5','maxlength'=>10)); ?>		<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>                                <?php echo $form->textFieldRow($model,'our_price',array('class'=>'span5','maxlength'=>10)); ?>	<div class="form-actions">		<?php $this->widget('bootstrap.widgets.TbButton', array(			'buttonType' => 'submit',			'type'=>'primary',			'label'=>'Search',		)); ?>	</div><?php $this->endWidget(); ?>