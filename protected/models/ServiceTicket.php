<?php

/**
 * This is the model class for table "service_ticket".
 *
 * The followings are the available columns in table 'service_ticket':
 * @property integer $id
 * @property integer $service_no
 * @property string $service_detail
 * @property string $company
 * @property string $full_name
 * @property string $contact
 * @property string $email
 * @property string $eq_location
 * @property integer $priority
 * @property integer $date
 * @property integer $status
 */
class ServiceTicket extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServiceTicket the static model class
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
		return 'service_ticket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_no, priority, date, status', 'numerical', 'integerOnly'=>true),
			array('company, full_name, email', 'length', 'max'=>200),
			array('contact', 'length', 'max'=>100),
			array('eq_location', 'length', 'max'=>500),
			array('service_detail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, service_no, service_detail, company, full_name, contact, email, eq_location, priority, date, status', 'safe', 'on'=>'search'),
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
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'service_no' => 'Service No',
			'service_detail' => 'Service Detail',
			'company' => 'Company',
			'full_name' => 'Full Name',
			'contact' => 'Contact',
			'email' => 'Email',
			'eq_location' => 'Eq Location',
			'priority' => 'Priority',
			'date' => 'Date',
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
		$criteria->compare('service_no',$this->service_no);
		$criteria->compare('service_detail',$this->service_detail,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('eq_location',$this->eq_location,true);
		$criteria->compare('priority',$this->priority);
		$criteria->compare('date',$this->date);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}