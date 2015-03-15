<?php

/**
 * This is the model class for table "user_reg".
 *
 * The followings are the available columns in table 'user_reg':
 * @property integer $id
 * @property string $full_name
 * @property string $username
 * @property string $password
 * @property integer $user_level
 * @property string $email
 * @property string $contact
 * @property integer $status
 */
class UserReg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_reg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('full_name, username, password, email, contact, status', 'required'),
			array('user_level, status', 'numerical', 'integerOnly'=>true),
			array('full_name, username, password, email, contact', 'length', 'max'=>200),
			array('email', 'unique','message'=>'Email already exists!'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, full_name, username, password, email, contact, status', 'safe', 'on'=>'search'),
		);
	}



        public function Getstatus($data)
        {
            if($data==0)
                return 'De-Active';
            else 
                return 'Active';
        }

  public function Getlevel($data)
        {
            if($data==0)
                return 'Subscriber';
            else 
                return 'Admin';
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
			'full_name' => 'Full Name',
			'username' => 'Username',
			'password' => 'Password',
			'user_level' => 'User Level',
			'email' => 'Email',
			'contact' => 'Contact #',
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
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('user_level',$this->user_level);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserReg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
