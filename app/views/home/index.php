<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <h5>Welcome to Home <?php echo htmlspecialchars($name); ?></h5>
        <ul>
            <?php foreach($number as $num){
                echo "<li>".htmlspecialchars($num)."</li>";
            }?>
        </ul>
    </body>

</html>
