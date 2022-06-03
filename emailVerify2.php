<?php
header("Access-Control-Allow-Origin: *");
    $post=false;
    $reachable='';

    if(isset($_GET['submit'])){
       $get=true;
       $userEmail=$_GET['userEmail'];
       //echo $email;
       //curl
       $ar=array(
           'to_userEmail' => $userEmail,
       );
       
       $post_data=json_encode($ar);
      // print_r($post_data);exit;
       $crl=curl_init('https://api.quickemailverification.com/v1/bulk-verify');
       curl_setopt($crl,CURLOPT_RETURNTRANSFER,true);
       curl_setopt($crl,CURLINFO_HEADER_OUT,true);
       curl_setopt($crl,CURLOPT_POST,true);
       curl_setopt($crl,CURLOPT_POSTFIELDS,$post_data);
       curl_setopt($crl,CURLOPT_HTTPHEADER,array(
           'content-Type : Application/json',
           'authorization:your api'));

       $result=curl_exec($crl);
       
       print_r($result);
       //echo 'hellotest';

        $decode=json_decode($result);

        $reachable=($decode['success']=='true')? '<span class="badge badge-success">Valid</span>':'<span class="badge badge-danger">Invalid</span>' ;

        print_r($decode);
    }
?>
