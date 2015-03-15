<?php

/**
 * This is the model class for table "banner".
 *
 * The followings are the available columns in table 'banner':
 * @property integer $id
 * @property string $image
 * @property string $text
 * @property string $url
 * @property integer $order
 * @property integer $status
 */
class Banner extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banner the static model class
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
		return 'banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'required'),
                        array('image', 'file', 'types'=>'jpg, gif, png, jpeg, bmp', 'maxSize'=>1024 * 1024 * 10, 'tooLarge'=>'File is more than 10MB.', 'except'=>'update'),
			array('text, url, order', 'required'),
			array('order, status', 'numerical', 'integerOnly'=>true),
			array('text', 'length', 'max'=>500),
                        //array('image', 'file', 'types'=>'jpg, gif, png'),
			array('url', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, text, url, order, status', 'safe', 'on'=>'search'),
		);
	}

         public function Getstatus($data)
        {
            if($data==0)
                return 'De-Active';
            else 
                return 'Active';
        }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Image',
			'text' => 'Text',
			'url' => 'Url',
			'order' => 'Order',
			'status' => 'Status',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}