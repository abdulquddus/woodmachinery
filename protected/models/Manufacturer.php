<?php

/**
 * This is the model class for table "manufacturer".
 *
 * The followings are the available columns in table 'manufacturer':
 * @property integer $id
 * @property string $name
 * @property string $image_main_page
 * @property string $image_logo
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Equipment[] $equipments
 */
class Manufacturer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Manufacturer the static model class
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
		return 'manufacturer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image_logo', 'file', 'types'=>'jpg, gif, png, jpeg, bmp', 'maxSize'=>1024 * 1024 * 10, 'tooLarge'=>'File is more than 10MB.', 'except'=>'update'),
			array('name, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			//array('image_logo', 'file', 'types'=>'jpg, gif, png'),
			array('name, image_main_page, image_logo', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, image_main_page, image_logo, status', 'safe', 'on'=>'search'),
		);
	}


public function getmodelbymanufacturer($id) {
            
            $model=  Madeon::model()->findAllByAttributes(array('manufactureid'=>$id));
            
           
            
            return $model;
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
			'equipments' => array(self::HAS_MANY, 'Equipment', 'id_manufacturer'),
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
			'image_main_page' => 'Manufacturer Page URL',
			'image_logo' => 'Image Logo',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image_main_page',$this->image_main_page,true);
		$criteria->compare('image_logo',$this->image_logo,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}