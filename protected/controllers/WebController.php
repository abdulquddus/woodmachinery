<?php

class WebController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column3';

/**
* @return array action filters
*/

public function actionIndex()
{
    $this->render('index');
}

public function actionEquipPrint()
{
    $this->render('equipprint');
}


public function actionDetailticket()
{
    
    if(isset($_POST['message']))
    {
          $date=date("Y-m-d");
        $sql="INSERT INTO `ticket_detail` (`ticket_id`, `subject`, `message`, `created_by`, `status`, `date`)"
        . " VALUES ( '".$_POST['id']."', '', '".$_POST['message']."', '".Yii::app()->session['user']."', '1','$date' )";
       $command = Yii::app()->db->createCommand($sql)->execute();
            
        }
    
    $this->render('detail');
}


public function actionTicket()
{
        if(isset( Yii::app()->session['user']))
    {
      $this->render('ticket');
    }else 
    {
    $this->render('servicetickets');
    }
    
    }


public function actionMap()
{
    $this->render('map');
}


public function actionDirectory()
{
    $this->render('directory');
}


public function actionDisclaimer()
{
    $this->render('disclaimer');
}

public function actionCloseticket()
{
    
    //print_r($_GET); exit;
    //$model=  Ticket::model()->find("email = '".$_GET['id']."'");

    $sql="update ticket set status=0 where id =  '".$_GET['id']."' ";
     $command = Yii::app()->db->createCommand($sql)->execute();

     $this->redirect(array('web/detailticket', 'id'=>$_GET['id']));
     
     
}



public function actionforgotpassword()

{
    $email= $_POST['email'];
       
  
    $model= UserReg::model()->find("email = '".$_POST['email']."'");
  
    
    if (!empty($model))
        {
   // $sql="INSERT INTO `newsletter_signup` (`email`, `status`,`key`) VALUES ('$email', '1','$hash')";
   // echo $sql;   
      //$command = Yii::app()->db->createCommand($sql)->execute();
   /// exit;
      
$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject
$message = '
 
Thanks for contacting AKINS password recovery!
Please find the following information relavent to your account/password.

Your password is :'.$model->password.'

To login please go to the following link:
http://seowebdesigningcompany.com/'.Yii::app()->baseUrl.'/web/serviceticket';
                     
$headers = 'From:noreply@akinsmachinery.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
$mes=1;
 $this->render('thankyou',array('mesg'=>$mes));
        }
  else     
        {
      $mes=0;
 $this->render('thankyou',array('mesg'=>$mes));
        }
    
}

public function actionTellAFriend()
{
    if (isset($_POST['tellafriend']))
 { 
 // Validate the email addresses and URL
 
    $sname = $_POST['sfull_name'];
    $semail=$_POST['semail'];
    $rname = $_POST['rfull_name'];
    $remail=$_POST['remail'];
    $detail=$_POST['details'];
    // Go ahead only if the values are OK
 
 if ($semail & $remail)
 
 { 
 
 $subject = 'Check out this web page';
 
 // Build the message 
 
 $message = 'Hi, ' . strip_tags($_POST['rfull_name']) . ",\r\n\r\n"; 
 
 $message .= strip_tags($_POST['sfull_name']) . " has recommended that you check out the following web page:\r\n\r\n"; 
 
 //$message .= strip_tags($_POST['title']) . "\r\n\r\n";

 //$message .= $url . "\r\n\r\n";
 
 $message .= strip_tags($_POST['details']);
 // Add email headers 
 
 $headers = "From: webmaster@akinsmachinery.com\r\n";

 $headers .= "Reply-to: $semail\r\n";

 $headers .= 'Content-type: text/plain;
 
 charset=utf-8'; 
 
 $mailSent = mail($remail, $subject, $message, $headers);
	}
else 
	{ 
	$mailSent = false;
	}
	} 
    $this->renderPartial('tellafriend');
}



  public function ActionManufactureModel()
        {
            //print_r($_POST); exit;
             $id=$_POST['id'];
            //echo $id; exit;
            $facility= Equipment::model()->findAllByAttributes(array('id_manufacturer'=>$id));//  Manufacturer::model()->getmodelbymanufacturer($id);
            $optn='<option>Select Model</option>';
            foreach ($facility as $facily) {
                if($facily['model']!='')
                $optn.='<option value="'.$facily['model'].'">'.$facily['model'].'</option>';
                
            }
            echo $optn;
        }

public function actionSubmitticket()
{
     if(isset( Yii::app()->session['user']))
    {
         if(isset($_POST['submitticket']))
        {
    $company=$_POST['company'];
    $full_name = $_POST['full_name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];;
    $eq_location=$_POST['eq_location'];
    //$image=$_POST['image'];
    $priority=$_POST['priority'];
    $details=$_POST['details'];
    //$ask_price=$_POST['ask_price'];
    $date=date("Y-m-d");
    $status='1';
    
                $sql="INSERT INTO `ticket` (`company`,`full_name`, `contact`, `email`, `eq_location`, `priority`,`details`, `date`, `status`, client_id) VALUES ('$company','$full_name', '$contact', '$email', '$eq_location', '$priority','$details', '$date', '1', ".Yii::app()->session['user']." )"; 
                $command = Yii::app()->db->createCommand($sql)->execute();
             
    
           
    
                $this->render('submitticket');
                
                
                 }
    
    
else {
    $this->render('submitticket');
}


    //$this->render('submitticket');
}
else 
    {
    $this->render('servicetickets');
    }
}
 
public function actionsideload()
{

//print_r($_POST);
$data=$_POST['data'];

if($data=='r')
{

$sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and sold_status=1 order by e.id DESC limit 5 ";
}
elseif($data=='v')
{
 $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1   order by hits DESC limit 5  ";

}
 
 
 if($data=='f')
 {
      $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 and is_featured=1 order by e.id DESC limit 5";
 }
 
 if($data=='n')
 {
  $sql="SELECT * FROM `equipment`  e , eq_images img WHERE e.status=1 and e.id=img.id_equipment and img.is_main=1 order by e.id DESC limit 5";
  
 }
 
                        $neweq = Yii::app()->db->createCommand($sql)->queryAll();
   $send='';    
       foreach ($neweq as $newe) {
                                        $idd=$newe['id_equipment'] ;
       $img=$newe['image_large']   ;
       //$name=$newe['name'] ;
       $name=substr($newe['name'],0,15);
   $send.='<div class="col-sm-12"><div class="pull-left col-sm-2" style="margin: 0px 25px 10px -30px;padding: 0px;"><a href="equipment?id=$idd"><img width="45" height="41" src="'.Yii::app()->baseUrl.'/upload/images/small_'.$img.'"></a></div>
                    <div class="col-sm-10" style="padding: 0px;"><a  href="equipment?id='.$idd.'"><strong>'.$name.
     '</strong></a></div></div>';
     
                   } 
echo $send;
//exit;
}



public function actionUpload()
{
 
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
        $folder=Yii::getPathOfAlias('webroot').'/sellimages/';// folder for uploaded files
        $allowedExtensions = array("jpg","jpeg","gif","exe","mov","mp4","png");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 100 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
        //$img = CUploadedFile::getInstance($model,'image');
 
 
 $sql="SELECT Max(id) FROM  `selling` ";
   $lastid = Yii::app()->db->createCommand($sql)->queryRow();
$lastid=(int)$lastid['Max(id)'];
 
 $lastid++;
 
 $sql="INSERT INTO `sell_images` (`image_thume`, `image_large`, `is_main`, `id_selling`) VALUES ( '".$fileName."', '1','1', '".$lastid."')";
      
	  $connection=Yii::app()->db; 
	  
$command=$connection->createCommand($sql);
$rowCount=$command->execute();
	  
	    echo $return;// it's array
}





public function actionListing()
{
    $this->render('listing');

}


public function actionAccessories()
{
    $this->render('accessories');
}


public function actionAboutus()
{
    $this->render('aboutus');
}

public function actionPage()
{
    $this->render('page');
}

public function actionServiceTickets()
{
    
    if(isset($_POST['user']))
    {
        $sql="SELECT count(*) FROM  `user_reg` where username ='".$_POST['user']."' and password ='".$_POST['pass']."' ";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
        if($data['count(*)']==1)
        {
        $sql="SELECT * FROM  `user_reg` where username ='".$_POST['user']."' and password ='".$_POST['pass']."' ";
        $data = Yii::app()->db->createCommand($sql)->queryRow();
            Yii::app()->session['user'] = $data['id'];
            ///echo Yii::app()->session['user'];
            
        }
    }
    if(isset( Yii::app()->session['user']))
    {
        $this->render('submitticket');
    }else 
    {
    $this->render('servicetickets');
    }
}

public function actionRegister()
{ $error='';
    if(isset($_POST['register']))
        {
    
    $fullname = $_POST['fname'];
    $username = $_POST['uname'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $date=date("Y-m-d");
    $status='1';
    
    $from = $_POST["fname"]; // sender
    $subject = $_POST["uname"];
    //$message = $_POST["message"];
    
    
    $model1=  UserReg::model()->find("username = '".$_POST['uname']."'");
    if (empty($model1))
        {
     
    
    $model=  UserReg::model()->find("email = '".$_POST['email']."'");
    if (empty($model)){
    // email does't exist
    $message1='<table><tr><td> Name </td><td>'.$_POST["fname"].'</td></tr>'
            . '<tr><td>Contact </td><td>'.$_POST["contact"].'</td></tr>'
            . '<tr><td>Username </td><td>'.$_POST["uname"].'</td></tr>'
            . '<tr><td>Username </td><td>'.$_POST["email"].'</td></tr>'
            . '<tr><td>Address </td><td>'.$_POST["address"].'</td></tr></table>';
    
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    //$message = wordwrap($message, 70);
    // send mail

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: New Registration to Akins<info@akins.com>' . "\r\n";

    mail("attariakbar@yahoo.com",$subject,$message1,$headers);
  
			//$model->attributes=$_POST['ContactUs'];
   
        $sql="INSERT INTO `user_reg` (`full_name`,`username`, `password`, `email`, `contact`, `address`, `date`, `status`) VALUES ('$fullname','$username', '$password', '$email', '$contact', '$address', '$date', '1')"; 
        $command = Yii::app()->db->createCommand($sql)->execute();
//        $data=$command->queryAll();
        
 $error= "Thank you for registring on AKINS. Someone will respond you soon";
} else {
    $error= "email already exist";
}
        }
        else{
            $error= "Username Already Taken";
        }

       }
    $this->render('register',array('error'=>$error));

}


public function actionRequestqoute()
{
    
    if(isset($_POST['produectid']))
    {
        $sql="INSERT INTO `purchase_order` ( `id_equipment`, `company`, `full_name`, `email`, `contact`, `message`, `type`)"
                . " VALUES ( '".$_POST['produectid']."', '".$_POST['Company']."', '".$_POST['fname']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['comment']."', '".$_POST['priority']."')";
    		$command = Yii::app()->db->createCommand($sql)->execute();
//print_r($_POST); exit;
//                $from = $_POST["full_name"]; // sender
   $subject = $_POST["company"];
//    $message = $_POST["message"];
    
    
    $message1='<table><tr><td>Company Name </td><td>'.$_POST["company"].'</td></tr>'
            . '<tr><td> Name </td><td>'.$_POST["fname"].'</td></tr>'
            . '<tr><td>Contact </td><td>'.$_POST["phone"].'</td></tr>'
            . '<tr><td>Priority </td><td>'.$_POST["priority"].'</td></tr>'
            . '<tr><td>Message </td><td>'.$_POST["comment"].'</td></tr></table>';
    
    // Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: New Quote Request<webmaster@akins.com>' . "\r\n";

    mail("attariakbar@yahoo.com",$subject,$message1,$headers);
$this->render('requestqoute',array('send'=>1));

                }
    
    
$this->render('requestqoute');
}








public function actionCallnow()
{
    
    if(isset($_POST['produectid']))
    {
        $sql="INSERT INTO `callnow` ( `id_equipment`, `company`, `full_name`, `email`, `contact`, `message`, `type`)"
                . " VALUES ( '".$_POST['produectid']."', '".$_POST['Company']."', '".$_POST['fname']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['comment']."', '".$_POST['priority']."')";
    		$command = Yii::app()->db->createCommand($sql)->execute();
//print_r($_POST); exit;
//                $from = $_POST["full_name"]; // sender
   $subject = $_POST["company"];
//    $message = $_POST["message"];
    
    
    $message1='<table><tr><td>Company Name </td><td>'.$_POST["company"].'</td></tr>'
            . '<tr><td> Name </td><td>'.$_POST["fname"].'</td></tr>'
            . '<tr><td>Contact </td><td>'.$_POST["phone"].'</td></tr>'
            . '<tr><td>Priority </td><td>'.$_POST["priority"].'</td></tr>'
            . '<tr><td>Message </td><td>'.$_POST["comment"].'</td></tr></table>';
    
    // Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: New I want This Section<webmaster@akins.com>' . "\r\n";

    mail("attariakbar@yahoo.com",$subject,$message1,$headers);
$this->render('callnow',array('send'=>1));

                }
    
    
$this->render('callnow');
}











public function actionAdvanceseach()
{
    //print_r($_GET);
    $condtion='';
    if(isset($_GET['product']) && !empty($_GET['product']))
        $condtion.=" AND `name` LIKE  '%".$_GET['product']."%'  ";
        
   // if(isset($_GET['manufacture']))
     //   $condtion.=" AND '".$_GET['manufacture']."' ";
    
    if(isset($_GET['model']) && !empty($_GET['model']))
        $condtion.=" AND model= '".$_GET['model']."' ";
    
    if(isset($_GET['condition']) && !empty($_GET['condition']))
        $condtion.=" AND  `condition` = '".$_GET['condition']."' ";
    
    if(isset($_GET['category']) && !empty($_GET['category']))
        $condtion.=" AND id_category =  '".$_GET['category']."' ";
   if(isset($_GET['manufacture']) && !empty($_GET['manufacture']))
        $condtion.=" AND id_manufacturer =  '".$_GET['manufacture']."' ";
        
        
    $sql="select * from equipment e , eq_images img where e.status=1 and e.id=img.id_equipment and img.is_main=1  $condtion ";
    //echo $sql;
//echo '<br/>';    
//
   $data = Yii::app()->db->createCommand($sql)->queryAll();
  /// print_r($data);
    //exit;
    
    
    		$this->render('advancesearch',array('data'=>$data));
}


public function actionNews()
{
    $this->render('news');

}

public function actionArticle()
{
    $this->render('article');

}

public function actionBlog()
{
    $this->render('blog');

}

public function actionEquipment()
{
    $this->render('equipment');

}

public function actionSearch()
{
    $this->render('search');

}



public function actionSelling()
{
if(isset($_POST['selling']))
        {
		
		
		
		
    $company=$_POST['company'];
    $full_name = $_POST['full_name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];;
    $eq_location=$_POST['eq_location'];
    //$image=$_POST['image'];
    $priority=$_POST['priority'];
    $details=$_POST['details'];
    $ask_price=$_POST['ask_price'];
    $date=date("Y-m-d");
    $status='1';
    
                $sql="INSERT INTO `selling` (`company`,`full_name`, `contact`, `email`, `eq_location`, `priority`,`details`, `ask_price`, `date`, `status`) VALUES ('$company','$full_name', '$contact', '$email', '$eq_location', '$priority','$details', '$ask_price', '$date', '1')"; 
                $command = Yii::app()->db->createCommand($sql)->execute();
             
    
           
    
                $this->render('selling');
                
                
                 }
else {
    $this->render('selling');
}



}



public function actionContact()
{
    
//$contact=new ContactUs;
    
    if(isset($_POST['contact']))
        {
    
    $company=$_POST['company'];
    $full_name = $_POST['full_name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $equiploc=$_POST['equiploc'];
    $message=$_POST['message'];
    $date=date("Y-m-d");
    $status='1';
    
    $from = $_POST["full_name"]; // sender
    $subject = $_POST["company"];
    $message = $_POST["message"];
    
    
    $message1='<table><tr><td>Company Name </td><td>'.$_POST["company"].'</td></tr>'
            . '<tr><td> Name </td><td>'.$_POST["full_name"].'</td></tr>'
            . '<tr><td>Contact </td><td>'.$_POST["contact"].'</td></tr>'
            . '<tr><td>Location </td><td>'.$_POST["equiploc"].'</td></tr>'
            . '<tr><td>Message </td><td>'.$_POST["message"].'</td></tr></table>';
    
    // message lines should not exceed 70 characters (PHP rule), so wrap it
    //$message = wordwrap($message, 70);
    // send mail

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: Someone Contacted AKINS<webmaster@akins.com>' . "\r\n";

    mail("attariakbar@yahoo.com",$subject,$message1,$headers);
  
			//$model->attributes=$_POST['ContactUs'];
   
        $sql="INSERT INTO `contact_us` (`company`,`full_name`, `contact`, `email`, `equiploc`, `message`, `date`, `status`) VALUES ('$company','$full_name', '$contact', '$email', '$equiploc', '$message', '$date', '1')"; 
        $command = Yii::app()->db->createCommand($sql)->execute();
//        $data=$command->queryAll();
        
echo "<script>alert('Thank you for your feedback');</script>";
       }
// display form if user has not clicked submit
$this->render('contact');
}





public function actionnewsletter() {
    
    $email= $_POST['email'];
    $hash = md5( rand(0,1000) );
     
  
    $model=  NewsletterSignup::model()->find("email = '".$_POST['email']."'");
    if (empty($model))
        {
    $sql="INSERT INTO `newsletter_signup` (`email`, `status`,`key`) VALUES ('$email', '1','$hash')";
   // echo $sql;   
      $command = Yii::app()->db->createCommand($sql)->execute();
   // exit;
      
      $to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
Please click this link to activate your account:
http://seowebdesigningcompany.com/'.Yii::app()->baseUrl.'/web/verify?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@vd.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
echo 1;
        }
        else
        {
           echo 0  ;
        }
}




public function actionCategory()
{
    $this->render('category');

}


//public function actionDnews()
//{
//   if(isset($_GET['id']))
//       { 
//       
//       $model= Blog::model ()->findByPk($_GET['id']);
//                                 $show=1;
//                       
//                                }
//    $this->render('dnews');
//
//}

//public function actionDarticle()
//{
//   if(isset($_GET['id']))
//       { 
//       
//       $model= Blog::model ()->findByPk($_GET['id']);
//                                 $show=1;
//                       
//                                }
//    $this->render('dnews');
//
//}

public function actionDblog()
{
   if(isset($_GET['id']))
       { 
       
       $model= Blog::model ()->findByPk($_GET['id']);
                                 $show=1;
                        $datas= blog::model()->findAllByAttributes(array('id'=>$_GET["id"]),array('order'=>'id DESC'));
                                }
    $this->render('dnews',array('datas'=>$datas));

    }

}