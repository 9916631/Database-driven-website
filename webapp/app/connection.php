<?php
    //database credentials
    $user = "a9916631_Stacey";
    $pw = "Myfirstsql1";
    $db = "a9916631_SCP_Foundation";

    //Database connection object(address, user, pw, db)
    $connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));
//create a varible that stores all record from datbase
    $result = $connection->query("select * from foundation") or die($connection->error());

    #check if for has been submited with data
    if(isset($_POST['objectclass']))
    {
        #create varibles from posted form values
        $itemnumber = $_POST['itemnumber'];
        $objectclass = $_POST['objectclass'];        

        $h1 = $_POST['h1'];
        $h2 = $_POST['h2'];
        $h3 = $_POST['h3'];
        $h4 = $_POST['h4'];

        $p1 = $_POST['p1'];
        $p2 = $_POST['p2'];
        $p3 = $_POST['p3'];
        $p4 = $_POST['p4'];

        $img1 = $_POST['img1'];
        $img2 = $_POST['img2'];
        $img3 = $_POST['img3'];

        #create insert command
        $sql = "insert into foundation(itemnumber, objectclass, h1, h2, h3, h4, p1, p2, p3, img1, img2, img3)
        values('$itemnumber', '$objectclass', '$h1', '$h2', '$h3', '$h4', '$p1', '$p2', '$p3', '$img1', '$img2', '$img3')";

        #display error or success on screen
        if($connection->query($sql) === TRUE)
        {
            echo "
            <h1>Record added succesfully</h1>
            <p><a href='../index.php'>Back to index page</p>
            ";
        }
        else
        {
            echo "
            <h1>Error submiting data</h1>
            <p>{$connection->error()}</p>
            <p><a href='../index.php'>Back to index page</p>
            ";

        }
    }

?>
