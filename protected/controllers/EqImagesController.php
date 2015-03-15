<?php

class EqImagesController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
//public function accessRules()
//{
//return array(
//array('allow',  // allow all users to perform 'index' and 'view' actions
//'actions'=>array('index','view','Setmain'),
//'users'=>array('*'),
//),
//array('allow', // allow authenticated user to perform 'create' and 'update' actions
//'actions'=>array('create','update','Setmain','deleteimages'),
//'users'=>array('@'),
//),
//array('allow', // allow admin user to perform 'admin' and 'delete' actions
//'actions'=>array('admin','delete','Setmain'),
//'users'=>array('admin'),
//),
//array('deny',  // deny all users
//'users'=>array('*'),
//),
//);
//}

 public function __construct($id,$module=null)
{
  
  parent::__construct($id,$module=null);
  
    if(!isset( Yii::app()->session['adminuser']))
                $this->redirect(array('site/login'));
  
} 

function actionDeleteimages()
{
    $id=$_POST['id'];
    
    
    $model=$this->loadModel($id);
  $model->delete();
 //   unset("upload/images/");
   unlink("upload/images/$model->image_large"); 
   unlink("upload/images/thum_$model->image_large"); 
    unlink("upload/images/small_$model->image_large"); 
     unlink("upload/images/main_$model->image_large"); 
   
    $model->delete();
    
}
/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new EqImages;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['EqImages']))
{
$model->attributes=$_POST['EqImages'];

//$model->image_large=CUploadedFile::getInstance($model,'image_large');

$rnd=rand();

  $uploadedFile=CUploadedFile::getInstance($model,'image_large');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->image_large = $fileName;

//$model->idEquipment=1;



if($model->save())
{
       $uploadedFile->saveAs("upload/images/$fileName");
Yii::import("ext.EPhpThumb.EPhpThumb.EPhpThumb");

$thumb=new EPhpThumb();
$thumb->init(); //this is needed
 
//chain functions
$thumb->create("upload/images/$fileName")->resize(70,70)->save("upload/images/thum_$fileName");
$thumb->create("upload/images/$fileName")->resize(300,300)->save("upload/images/small_$fileName");
$thumb->create("upload/images/$fileName")->resize(110,110)->save("upload/images/main_$fileName");
                                        
                                        
$this->redirect(array('create','eqid'=>$model->id_equipment));
}
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/

public function actionSetmain() {
   
    $id=$_POST['id'];
    
    $sql="select id_equipment from eq_images where id= $id";
    $command = Yii::app()->db->createCommand($sql);
    $eq_id= $command->queryRow();

    $sql="UPDATE `eq_images` SET `is_main`=0  WHERE `id_equipment`= '".$eq_id['id_equipment']."' ";
     $command = Yii::app()->db->createCommand($sql)->execute(); 
    
     
      $sql="UPDATE `eq_images` SET `is_main`=1  WHERE `id`= $id ";
     $command = Yii::app()->db->createCommand($sql)->execute(); 
    
     
}


public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['EqImages']))
{
$model->attributes=$_POST['EqImages'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('EqImages');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new EqImages('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['EqImages']))
$model->attributes=$_GET['EqImages'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=EqImages::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='eq-images-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
