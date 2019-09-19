<?php
    if(isset($_POST["access-key"]) && isset($_POST["cypher-content"])){
        $content = $_POST["cypher-content"];
        $content = htmlentities($content);
        $content = preg_replace("/\s+/","%20",$content);
        $askQuery = "http://localhost/delta/deltaApiCenter/api.php?method=mate&a={$_POST['access-key']}&c={$content}";
        $toDo = curl_init($askQuery);
        curl_setopt($toDo,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($toDo);
        $response = json_decode($result);
        $iscypher = 1;
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
    <link rel = "stylesheet" href = "./src/css/main.css"/>
    <title>Delta cipher</title>
</head>
<body>
    <header class = "welcome-header">Cyphering panel</header>
    <?php if($iscypher == 1){
        ?><section class = "">Your message is: <?php echo $response; ?></section><?php
    }
    else{
        ?>
        <form method = "post" action = "">
            <input type = "text" class = "access-keyInp" name = "access-key" required placeholder = "Authorization key here"/>
            <textarea name = "cypher-content" class = "content-textarea" required placeholder = "Your message"></textarea>
            <button type = "submit">Encrypt</button>
        </form>       
        <?php
    }?>

</body>
</html>