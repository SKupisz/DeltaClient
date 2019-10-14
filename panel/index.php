<?php
    if(isset($_POST["access-key"]) && isset($_POST["cypher-content"])){
        $content = $_POST["cypher-content"];
        $content = rawurlencode($content);
        //$content = htmlentities($content);
        if(strlen($content) > 100){
            $toComplete = "";
            if(!isset($_POST["encryptOrdecrypt"])){
                $alpha = explode("k",$content);
                for($i = 0 ; $i < count($alpha); $i++){
                    $nowPart = $alpha[$i];
                    $askQuery = "localhost/delta/deltaApiCenter/api.php?method=friend&a={$_POST['access-key']}&c={$nowPart}";
                    $toDo = curl_init($askQuery);
                    curl_setopt($toDo,CURLOPT_RETURNTRANSFER,true);
                    $result = curl_exec($toDo);
                    $response = json_decode($result);
                    $toComplete.=$response;
                }
            }
            else{
                for($i = 0 ; $i < strlen($content); $i+=100)
                {
                    $flag = 0;
                  if($i + 100  < strlen($content))
                  {
                    $forNowText = substr($content,$i,100);
                  }
                  else {
                    $forNowText = substr($content,$i,(strlen($content)-$i));
                    $flag = 1;
                  }
                    $askQuery = "localhost/delta/deltaApiCenter/api.php?method=mate&a={$_POST['access-key']}&c={$forNowText}";
                  $toDo = curl_init($askQuery);
                  curl_setopt($toDo,CURLOPT_RETURNTRANSFER,true);
                  $result = curl_exec($toDo);
                  $response = json_decode($result);
                  if($_POST["access-key"] && $flag == 0){
                      $toComplete.=$response;
                      $toComplete.="k";
                  }
                }
            }
            $iscypher = 1;
        }
        else{
            if(isset($_POST["encryptOrdecrypt"])){
                $askQuery = "localhost/delta/deltaApiCenter/api.php?method=mate&a={$_POST['access-key']}&c={$content}";
            }
            else{
                $askQuery = "localhost/delta/deltaApiCenter/api.php?method=friend&a={$_POST['access-key']}&c={$content}";
            }
            $toDo = curl_init($askQuery);
            curl_setopt($toDo,CURLOPT_RETURNTRANSFER,true);
            $result = curl_exec($toDo);
            $toComplete = json_decode($result);
            $iscypher = 1;
        }

    }
    else{
        $iscypher = 0;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = "../src/css/main.css"/>
    <link rel = "icon" href = "../src/img/logo2.png"/>
    <title>Delta cipher</title>
</head>
<body>
    <header class = "welcome-header">Cyphering panel</header>
    <?php if($iscypher == 1){
        ?><section class = "returnSection">
            <div class = "returnHeader">Your message is: </div>
            <main class = "message-container"><?php echo $toComplete; ?></main>
            <nav class = "buttons-nav">
                <button class = "button clip-button">Copy to clipboard</button>
                <button type = "submit" class = "resetBtn">Go again</button>
            </nav>
            </section><?php
    }
    else{
        ?>
        <form method = "post" action = "">
            <div class = "setup">
                <input type = "text" class = "access-keyInp" name = "access-key" required placeholder = "Authorization key here"/>
                 <label class = "input-describe">Cyphering </label><input type = "checkbox" checked name = "encryptOrdecrypt" class = "entryptInp"/><label class = "input-describe"> Decoding</label>
            </div>
            <textarea name = "cypher-content" class = "content-textarea" required placeholder = "Your message"></textarea>
            <button type = "submit" class = "Enbutton button">Encrypt</button>
        </form>       
        <?php
    }?>

</body>
<script src = "../src/js/main.js"></script>

</html>