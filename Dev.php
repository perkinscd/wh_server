<?php include "../../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Does this work?</h1>
<?php
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
        if(mysqli_connect_errno()){
                echo "Fart Lick.";
        }
        else{
                echo "Fartlek.";
        }
?>
</body>
</html>