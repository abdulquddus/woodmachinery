<?php

/**
 * This is the model class for table "purchase_order".
 *
 * The followings are the available columns in table 'purchase_order':
 * @property integer $id
 * @property integer $id_equipment
 * @property string $company
 * @property string $full_name
 * @property string $email
 * @property string $contact
 * @property string $message
 * @property integer $option
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Equipment $idEquipment
 */
class PurchaseOrder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PurchaseOrder the static model class
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
		return 'purchase_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_equipment, option, type, status', 'numerical', 'integerOnly'=>true),
			array('company, full_name', 'length', 'max'=>200),
			array('email, contact', 'length', 'max'=>100),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_equipment, company, full_name, email, contact, message, option, type, status', 'safe', 'on'=>'search'),
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
			'idEquipment' => array(self::BELONGS_TO, 'Equipment', 'id_equipment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_equipment' => 'Id Equipment',
			'company' => 'Company',
			'full_name' => 'Full Name',
			'email' => 'Email',
			'contact' => 'Contact',
			'message' => 'Message',
			'option' => 'Option',
			'type' => 'Type',
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
		$criteria->compare('id_equipment',$this->id_equipment);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('option',$this->option);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}