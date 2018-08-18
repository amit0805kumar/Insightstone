<?php
include 'db.php';
$query = "SELECT * FROM blog_data";
$result = mysqli_query($connect,$query);
//$row=mysqli_fetch_array($result);

$storeArray_images = Array();
$storeArray_blog_name = Array();
$storeArray_blog_content = Array();
$storeArray_date = Array();
$counter = 0;
while ($row = mysqli_fetch_array($result)){
    $storeArray_images[] =  $row['image'];
    $storeArray_blog_name[] = $row['blog_name'];
    $storeArray_blog_content[] = $row['blog_content'];
    $storeArray_date[] = $row['date_of_blog'];
    $counter++;
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="img/png" href="images/icon.png">
        <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700,800,900|Cabin:400,400i,500,600,700|Caveat:400,700" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/scroll.js"></script>
        <title>Insightstone</title>
        <style type="text/css">
      

        </style>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body onload="loaderFun()">


        <!--LOADER-->
        <div class="loader-container" id="loader-c">
            <img src="images/logo.png" alt="loader" id="loader" class="shakeAnimate">
        </div>

        <div id="myDiv">
           <div id="top"></div>
            <!--Navbar-->
            <nav class="navbar navbar-default" id="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="images/logo1.png" alt="logo" class="logo-img fadeIn animated delay1" id="logo"></a>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle navbar-btn" data-toggle="collapse" data-target="#main" id="cmd">
                    <span class="icon-bar" id="bar1"></span>
                    <span class="icon-bar" id="bar2"></span>
                    <span class="icon-bar" id="bar3"></span>
                </button>
                    </div>
                    <div class="collapse navbar-collapse" id="main">
                        <ul class="nav navbar-nav navbar-right" id="nav">
                            <li><a href="index.html" id="l1">HOME</a></li>
                            <li><a id="l2">COLLEGES</a></li>
                            <li><a href="blog.php" id="l3">BLOG</a></li>
                            <li><a id="l4">EVENTS</a></li>
                            <li><a id="l5">INTERNSHIPS</a></li>
                            <li><a id="l6">TEAM</a></li>
                            <li><a id="l7">ABOUT US</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            
            <div class="header_image">

           
                <a href="admin_login.php" class="addBtn"><button class="btn btn-addBlog">ADD BLOG</button></a>
            
            </div>
            <div class="container-fluid">
                <?php
         $blog_no = 0;
        for ($i=0; $i < $counter; $i++) { 
           
          ?>
                    <div class="col-md-4">
                        <h3>
                            <?php echo $storeArray_blog_name[$blog_no];?>
                        </h3>
                        <h4>Posted On:
                            <?php echo $storeArray_date[$blog_no];?>
                        </h4>
                        <img src="<?php echo($storeArray_images[$blog_no]) ?>" class="img-responsive" style="width: 300px;height: 300px;" alt="image"><br>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Read About It...</button>
                    </div>

                    <?php
         $blog_no++;
        }
        ?>

            </div>
            <!--MODAL-->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">
                                <?php echo $storeArray_blog_name[0];?>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <pre><?php echo $storeArray_blog_content[0] ?></pre>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="scrollUp" id="up" title="Back To Top">
                <a href="#header"><i class="fa fa-chevron-circle-up fa-3x scrollUp__icon"></i></a>
            </div>
        </div>

        <script src="js/script.js"></script>

        <script>
            //Navbar
            $(window).scroll(function() {
                // 150 = The point you would like to fade the nav in.
                if ($(window).scrollTop() > 20) {
                    if ($(window).width() >= 767) {
                        $('#navbar').addClass('show');
                        $('#l1').addClass('show2');
                        $('#l2').addClass('show2');
                        $('#l3').addClass('show2');
                        $('#l4').addClass('show2');
                        $('#l5').addClass('show2');
                        $('#l6').addClass('show2');
                        $('#l7').addClass('show2');
                        $('#logo').attr("src", "images/logo.png");
                    }
                    $('#up').addClass('showUp');
                } else {
                    if ($(window).width() >= 767) {
                        $('#navbar').removeClass('show');
                        $('#l1').removeClass('show2');
                        $('#l2').removeClass('show2');
                        $('#l3').removeClass('show2');
                        $('#l4').removeClass('show2');
                        $('#l5').removeClass('show2');
                        $('#l6').removeClass('show2');
                        $('#l7').removeClass('show2');
                        $('#logo').attr("src", "images/logo1.png");
                    }
                    $('#up').removeClass('showUp');
                };
            });
         



            $(document).ready(function() {
                // Add smooth scrolling to all links
                $("#up").on('click', function(event) {
                    console.log(this.hash);
                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = document.getElementById("top");

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 1100, function() {

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            // window.location.hash = hash;
                        });
                    } // End if
                });
            });

            // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.querySelector("#navbar").classList.add("expandNav");

                } else {
                    document.querySelector("#navbar").classList.remove("expandNav");
                }
            }

        </script>

    </body>

    </html>
