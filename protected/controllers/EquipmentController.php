<?php

class EquipmentController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
//public function filters()/
///{
//return array(
//'accessControl', // perform access control for CRUD operations
//);
//}


//public function __construct($id,$module=null)
//{
//  
//  parent::__construct($id,$module=null);
//  
//    if(!isset( Yii::app()->session['userid']))
//                $this->redirect('index.php?r=site/login');
//  
//}
/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
//public function accessRules()
//{
//return array(
//array('allow',  // allow all users to perform 'index' and 'view' actions
//'actions'=>array('index','view'),
//'users'=>array('*'),
//),
//array('allow', // allow authenticated user to perform 'create' and 'update' actions
//'actions'=>array('create','update','sold'),
//'users'=>array('@'),
//),
//array('allow', // allow admin user to perform 'admin' and 'delete' actions
//'actions'=>array('admin','delete'),
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

public function actionToAddNewField()
   {
      if($_POST['Equipment']['product_type']== 'Accessories')
         echo CHtml::textField("Equipment", 'model') ; 
   }
   
   
public function actionSold()
{
$id=$_GET["eqid"];

$model=$this->loadModel($id);

if($model->sold_status==1)
$model->sold_status=0;
else
    $model->sold_status=1;
            
$model->save();


$this->redirect(array('admin'));


}

public function actionCreate()
{
$model=new Equipment;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Equipment']))
{
$model->attributes=$_POST['Equipment'];

  //$model->video=CUploadedFile::getInstance($model,'video');
//  
//  $uploadedFile=CUploadedFile::getInstance($model,'image');
//            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//            $model->image = $fileName;


$model->posted_on=date("Y-m-d",  strtotime("Now"));
//$model->price_start=date("Y-m-d",  strtotime($model->price_start));
//$model->price_end=date("Y-m-d",  strtotime($model->price_end));
            
if($model->save())
{
    //  $model->video->saveAs("upload/$model->video");
$this->redirect(array('view','id'=>$model->id));

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
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Equipment']))
{
    
 $_POST['Equipment']['video'] = $model->video;
$model->attributes=$_POST['Equipment'];

            $uploadedFile=CUploadedFile::getInstance($model,'video');
 
            
            
if($model->save())
{
    
     if(!empty($uploadedFile))  // check if uploaded file is set or not
                {
                    $uploadedFile->saveAs(Yii::app()->basePath.'/../upload/'.$model->video);
                }
    
    $this->redirect(array('view','id'=>$model->id));
}
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
$dataProvider=new CActiveDataProvider('Equipment');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{

    $model=new Equipment('search');



    $model->unsetAttributes();  // clear any default values

if (isset($_GET['pageSize'])) {
                    Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
                    unset($_GET['pageSize']);
                }

if(isset($_GET['Equipment']))
    $model->attributes=$_GET['Equipment'];
//    echo 'asdasdasd'; exit;

$this->render('admin',array('model'=>$model));
 }

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Equipment::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='equipment-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}