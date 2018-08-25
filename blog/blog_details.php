<?php
include 'db.php';
$hidden_blog_name = $_POST['hidden_blog_name'];
$query = "SELECT * FROM blog_data WHERE blog_name='".$hidden_blog_name."'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);
$query1 = "SELECT * FROM ".$hidden_blog_name."";
$result1 = mysqli_query($connect,$query1);
$storeArray_image = Array();
$storeArray_heading = Array();
$storeArray_content = Array();
$storeArray_s_no = Array();
$counter=0;
while ($row1 = mysqli_fetch_array($result1)){
    $storeArray_image[] =  $row1['image'];
    $storeArray_heading[] = $row1['heading'];
    $storeArray_content[] = $row1['content'];
    $storeArray_s_no[] = $row1['s_no'];
    $counter++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="shotcut icon" type="img/png" href="../images/icon.png">
    
    <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700,800,900|Cabin:400,400i,500,600,700|Caveat:400,700" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
    
    
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <script type="text/javascript" src="../js/wow.min.js"></script>
    <script type="text/javascript" src="../js/scroll.js"></script>
    <title>Insightstone</title>

    <link rel="stylesheet" href="../css/style.css">
    <style>
    .blogBack{
    width: 100%;
    height: 30vh;
    background-image: url(../images/blogsbg.jpg);
overflow: hidden;
    background-repeat: no-repeat;
    background-size: cover;
}

.blogs_container{
    width: 80rem;
    height: 60rem;;
    background: #fff;
    margin-top: -10rem;
    margin-left: auto;
    margin-right: auto;
    border-radius: 3px;
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
    </style>
</head>

<body onload="loaderFun()">

    <!--LOADER-->
    <div class="loader-container" id="loader-c">
        <img src="../images/logo.png" alt="loader" id="loader" class="shakeAnimate">
    </div>
     
     
     
     <div class="blogBack"></div>
     <div class="blogs_container">
        <h3><?php echo $row['blog_name']; ?></h3>
        <img class="img-responsive" src="<?php echo($row['image']); ?>">

        <?php
         $blog_no = 0;
        for ($i=0; $i < $counter; $i++) { 
           
          ?>
                    <div class="blog">
                        
                            <div class="heading">
                                <h3><?php echo $storeArray_heading[$blog_no];?></h3>
                            </div>
                            <div class="image">
                                <img src="<?php echo ($storeArray_image[$blog_no]);?>">
                            </div>
                            <p class="content">
                              <?php echo $storeArray_content[$blog_no];?>
                            </p>
                       
                    </div>

                    <?php
                        $blog_no++;
            
                        }
                        ?>


     </div>
     
     
      <script src="../js/script.js"></script>
    </body>
</html>