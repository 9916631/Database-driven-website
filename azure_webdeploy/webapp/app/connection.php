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
    if(isset($_POST['submit']))
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

    if(isset($_GET['delete']))
    {
        $itemnumber =$_GET['delete'];
        #create deltet sql command
        $del = "delete from foundation where itemnumber=$itemnumber";
        
        #run the command and then display appropreiate succes or error messages
        if($connection->query($del) === TRUE)
        {
            echo "<p>Record was deleted. <a href='../index.php'>Return to index page</a></p>";
        }
        else
        {
            echo "
            <p>There was an error deleting this record</p>
            <p{$connection->error()}></p>
            <p><a href='../index.php'>Back to index page</p>
            ";
        }
    }

    #update form checkm if update button has been clicked
    if(isset($_POST['update']))
    {
        #create varibles from posted form values
        $itemnumber = $_POST['itemnumber'];# i already had this so not sure if it will work
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

        #create  an update command, may need to add the itme number if what i do next doesnt work adding item number didnt work
        $update = "
                update foundation set objectclass='$objectclass', h1='$h1', h2='$h2', h3'$h3', h4'$h4',
                p1='$p1', p2='$p2', p3='$p3', img1='$img1', img2='$img2', img3='$img3'
                where itemnumber='$itemnumber' ";       

        #display error or success on screen
        if($connection->query($update) === TRUE)
        {
            echo "
            <h1>Record updated succesfully</h1>
            <p><a href='../index.php'>Back to index page</p>
            ";
        }
        else
        {
            echo "
            <h1>Error updating data</h1>
            <p>{$connection->error()}</p>
            <p><a href='../index.php'>Back to index page</p>
            ";

        }
    }

?>
