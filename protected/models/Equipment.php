<?php

/**
 * This is the model class for table "equipment".
 *
 * The followings are the available columns in table 'equipment':
 * @property integer $id
 * @property string $name
 * @property integer $id_category
 * @property integer $id_manufacturer
 * @property string $model
 * @property string $serial_number
 * @property string $year
 * @property integer $sold_status
 * @property integer $condition
 * @property integer $hits
 * @property integer $status
 * @property string $posted_on
 * @property string $detail
 * @property string $feature
 * @property string $note
 * @property integer $is_featured
 * @property string $video
 * @property string $year_of_manufacturer
 * @property integer $price_type
 * @property string $price_start
 * @property string $price_end
 * @property string $lease_time
 * @property string $lease_price
 * @property string $price
 * @property string $oour_price
 *
 * The followings are the available model relations:
 * @property EqImages[] $eqImages
 * @property Category $idCategory
 * @property Manufacturer $idManufacturer
 * @property PurchaseOrder[] $purchaseOrders
 * @property RelatedProducts[] $relatedProducts
 */
class Equipment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Equipment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'equipment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, id_category, product_type, id_manufacturer, condition, price, our_price', 'required'),
			//array('feature,detail, note ', 'filter', 'filter'=>'strip_tags'),
			array('id_category,showdate, id_manufacturer, sold_status, condition,product_type, hits, status, is_featured, price_type', 'numerical', 'integerOnly'=>true),

			array('name, model, serial_number, video, lease_time', 'length', 'max'=>200),
			array('year, year_of_manufacturer, lease_price, price, our_price', 'length', 'max'=>10),
			array('posted_on, detail, feature, note, price_start, price_end, our_price', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, id_category,product_type, id_manufacturer, model, serial_number, year, sold_status, condition, hits, status, posted_on, detail, feature, note, is_featured, video, year_of_manufacturer, price_type, price_start, price_end, lease_time, lease_price, price, our_price', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'eqImages' => array(self::HAS_MANY, 'EqImages', 'id_equipment'),
			'idCategory' => array(self::BELONGS_TO, 'Category', 'id_category'),
			'idManufacturer' => array(self::BELONGS_TO, 'Manufacturer', 'id_manufacturer'),
			'purchaseOrders' => array(self::HAS_MANY, 'PurchaseOrder', 'id_equipment'),
			'relatedProducts' => array(self::HAS_MANY, 'RelatedProducts', 'id_equipment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'id_category' => 'Category',
			'id_manufacturer' => 'Manufacturer',
			'model' => 'Model',
			'serial_number' => 'Serial Number',
			'year' => 'Year',
			'sold_status' => 'Sold Status',
			'condition' => 'Condition',
			'hits' => 'Hits',
			'status' => 'Status',
			'posted_on' => 'Posted On',
			'detail' => 'Detail',
			'feature' => 'Feature',
			'note' => 'Note',
			'is_featured' => 'Is Featured',
			'video' => 'Video',
			'year_of_manufacturer' => 'Year Of Manufacturer',
			'price_type' => 'Price Type',
			'price_start' => 'Price Start',
			'price_end' => 'Price End',
			'lease_time' => 'Lease Time',
			'lease_price' => 'Lease Price',
			'price' => 'Price',
                        'our_price' => 'Our Price',
		);
	}
  
public function soldstatus($data)
{

if($data==1)
return 'Sold';
else
return 'Not Sold';


}




public function condition($data1)
{

if($data1==1)
return 'New Equipment';
else
return 'Used Equipment';


}

public function getstatus($data2)
{

if($data2==1)
return 'In Stock';
else
return 'Out of Stock';


}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

                //$criteria->addSearchCondition('id',$this->id);

		
		$criteria->compare('t.id',$this->id,true);
		//$criteria->compare('id_category',$this->id_category);
		//$criteria->compare('id_manufacturer',$this->id_manufacturer);
                $criteria->compare('t.name',$this->name,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('sold_status',$this->sold_status);
		$criteria->compare('condition',$this->condition);
		$criteria->compare('hits',$this->hits);
		$criteria->compare('status',$this->status);
		$criteria->compare('posted_on',$this->posted_on,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('feature',$this->feature,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('is_featured',$this->is_featured);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('year_of_manufacturer',$this->year_of_manufacturer,true);
		$criteria->compare('price_type',$this->price_type);
		$criteria->compare('price_start',$this->price_start,true);
		$criteria->compare('price_end',$this->price_end,true);
		$criteria->compare('lease_time',$this->lease_time,true);
		$criteria->compare('lease_price',$this->lease_price,true);
		$criteria->compare('price',$this->price,true);
                $criteria->compare('our_price',$this->our_price,true);
                

		$criteria->with[]='idCategory';
		$criteria->addSearchCondition("idCategory.name",$this->id_category);

                $criteria->with[]='idManufacturer';
		$criteria->addSearchCondition("idManufacturer.name",$this->id_manufacturer);

		
return new CActiveDataProvider(get_class($this),array(
    'pagination'=>array(
        'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
    ),
    'criteria'=>$criteria,
));
	}
}