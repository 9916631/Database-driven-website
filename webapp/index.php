<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Web Application</title>
</head>

<body class="container">
<?php include "app/connection.php" ?>

  <!--menu row-->
  <div class="row">
    <div class="col">
      <ul class="nav navbar-light bg-light">

        <!--run php loop threw db and display page names -->
        <?php foreach($result as $page): ?>
          <li class="nav-item active">
          <a href="index.php?page='<?php echo $page['itemnumber']; ?>'" class="nav-link"><?php echo $page['itemnumber']; ?></a>
        </li>
        <?php endforeach ?>

        <li class="nav-item active">
          <a href="form.php" class="nav-link">Enter a new database record</a>
        </li>
      </ul>
    </div>
  </div>

  <!--Database content here-->
  <div class="row">
    <div class="col">
      <?php
      
      if(isset($_GET['page']))
      {
        //remove single quotes from value
        $pg = trim($_GET['page'], "'");
        //run sql command based on get value
        $record = $connection->query("select * from foundation where itemnumber='$pg'") or die($connection->error());

        $row = $record->fetch_assoc();

        $itemnumber = $row['itemnumber'];
        $objectclass = $row['objectclass'];        

        $h1 = $row['h1'];
        $h2 = $row['h2'];
        $h3 = $row['h3'];
        $h4 = $row['h4'];

        $p1 = $row['p1'];
        $p2 = $row['p2'];
        $p3 = $row['p3'];
        $p4 = $row['p4'];

        $img1 = $row['img1'];
        $img2 = $row['img2'];
        $img3 = $row['img3'];

        #display information screen
        echo "
        <h1>{$itemnumber}</h1>
        <h2>{$objectclass}</h2>  
        <p><img src='{$img1}'></p>            
        <h2>{$h1}</h2>         
        <p>{$p1}</p> 
        <h2>{$h2}</h2>
        <p>{$p2}</p> 
        <p><img src='{$img2}'></p>       
        <h2>{$h3}</h2>
        <p>{$p3}</p>
        <h2>{$h4}</h2> 
        <p>{$p4}</p>       
        <p><img src='{$img3}'></p>       
        ";
      }
      else{
        #first time page access display content below
        echo "
          <h1>Welcome to the SCP Foundation Website</h1>
          <p class='text-center'>Use the links above to view the kool database that we have on our creepy things</p>
          <p class='text-center'><img src='images/800px-SCP002.jpg'></p>        
        ";
      }      
      ?>

    </div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>