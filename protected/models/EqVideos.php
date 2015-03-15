<?php



/**

 * This is the model class for table "eq_videos".

 *

 * The followings are the available columns in table 'eq_videos':

 * @property integer $id

 * @property string $video

 * @property integer $is_main

 * @property integer $id_equipment

 *

 * The followings are the available model relations:

 * @property Equipment $idEquipment

 */

class EqVideos extends CActiveRecord

{

	/**

	 * Returns the static model of the specified AR class.

	 * @param string $className active record class name.

	 * @return EqVideos the static model class

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

		return 'eq_videos';

	}



	/**

	 * @return array validation rules for model attributes.

	 */

	public function rules()

	{

		// NOTE: you should only define rules for those attributes that

		// will receive user inputs.

		return array(

			array('is_main, id_equipment', 'numerical', 'integerOnly'=>true),

			array('image_thume', 'length', 'max'=>200),

                         array('video', 'file', 'types'=>'flv,mov,mp4'),

			//array('video,image_thume', 'length', 'max'=>200),

			// The following rule is used by search().

			// Please remove those attributes that should not be searched.

			array('id, video, is_main, id_equipment', 'safe', 'on'=>'search'),

		);

	}

 public function Getmain($data)
        {
            if($data==0)
                return 'No';
            else 
                return 'Yes';
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

			'video' => 'Video',

			'is_main' => 'Is Main',

			'id_equipment' => 'Id Equipment',

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

		$criteria->compare('video',$this->video,true);

		$criteria->compare('is_main',$this->is_main);

		$criteria->compare('id_equipment',$this->id_equipment);



		return new CActiveDataProvider($this, array(

			'criteria'=>$criteria,

		));

	}

}