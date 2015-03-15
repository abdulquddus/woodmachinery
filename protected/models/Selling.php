<?php

/**
 * This is the model class for table "selling".
 *
 * The followings are the available columns in table 'selling':
 * @property integer $id
 * @property string $company
 * @property string $full_name
 * @property string $contact
 * @property string $email
 * @property string $eq_location
 * @property integer $priority
 * @property string $details
 * @property string $ask_price
 * @property string $date
 * @property integer $status
 */
class Selling extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'selling';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('priority, status', 'numerical', 'integerOnly'=>true),
			array('company, full_name, email', 'length', 'max'=>200),
			array('contact', 'length', 'max'=>100),
			array('eq_location', 'length', 'max'=>500),
			array('ask_price', 'length', 'max'=>10),
			array('details, date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company, full_name, contact, email, eq_location, priority, details, ask_price, date, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	 
	 public function getpriority($item)
	 {
	//  return $item;
	//  exit;
	 $data=array(1=>'Low',2=>'Normal',3=>'high');
	 
	 return $data[$item];
	 
	 }
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company' => 'Company',
			'full_name' => 'Full Name',
			'contact' => 'Contact',
			'email' => 'Email',
			'eq_location' => 'Eq Location',
			'priority' => 'Priority',
			'details' => 'Details',
			'ask_price' => 'Ask Price',
			'date' => 'Date',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('eq_location',$this->eq_location,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('ask_price',$this->ask_price,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Selling the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
