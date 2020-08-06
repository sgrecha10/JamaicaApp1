<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>PageMaker</title>
</head>
<body>
    <h1>PageMaker</h1>
       
    <div>
        <form action="index.php" method="POST">
            <input type="text" name="id_row" size="25" placeholder="id" />
            <button type="submit">Горшочек, вари!</button>
            &nbsp;&nbsp;<a href="index.php">reset</a>
        </form>
    </div>

    <div style="margin-top: 1.6em;">
        <?
            if ($out[1]){
                echo "id ".$out[1]." is ".$out[2];
            } 
        
        ?>
    </div>
    
    
	<div id="name" style="margin-top: 1.6em;">
        <?
        if($out[3]['result']){
            echo "result ".$out[3]['result']."<br>";
            foreach($out[3]['time'] as $key=>$val) echo $key." ".$val."<br>";
        }
        ?>
	</div>
    
</body>
</html>