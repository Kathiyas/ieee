<?php

if(!session_id()) {
    session_start();
}
use Facebook\Facebook;



    require('vendor/autoload.php');

    $fb = new \Facebook\Facebook([
        'app_id' => '1205035529881597', //also edit this to your app_id
        'app_secret' => '7389912325e803a10f9f01cb32907076', // and app_secrete
        'default_graph_version' => 'v2.10'
    ]);

    $helper= $fb->getRedirectLoginHelper();
    if(!isset($_SESSION['access_token'])){
    $_SESSION['FBRLH_state']=$_GET['state'];

    }

    //edit line num 25 to your website adress
    $login_url = $helper->getLoginUrl("http://localhost/ieee/admin/");

    //note : make sure this above adress is same as in the facebook developer login app you 
    //      can create this from here https://developers.facebook.com/apps
    // you can use above id and app_secrete  for 1 week just for testing the application
    
    try {
        $accessToken = $helper->getAccessToken();
        if(isset($accessToken)){
            $_SESSION['access_token'] = (string)$accessToken;
            header("Location:index1.php");
        }
    } catch (Exception $th) {
        // echo $th->getMessage();
    }

    if(isset($_SESSION['access_token'])){
        try{
            $fb->setDefaultAccessToken($_SESSION['access_token']);
            $res = $fb->get('/me?locate=en_US&fields=name,email');
            $user = $res->getGraphuser();

        }catch(Exception $e){
            // echo $e->getMessage();
        }
    }
?>