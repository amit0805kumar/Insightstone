<?php
include 'db.php';
$query = "SELECT * FROM blog_data";
$result = mysqli_query($connect,$query);
//$row=mysqli_fetch_array($result);

$storeArray_images = Array();
$storeArray_blog_name = Array();
$storeArray_blog_content = Array();
$storeArray_s_no = Array();
$storeArray_date = Array();
$counter=0;
while ($row = mysqli_fetch_array($result)){
    $storeArray_images[] =  $row['image'];
    $storeArray_blog_name[] = $row['blog_name'];
    $storeArray_blog_content[] = $row['blog_content'];
    $storeArray_date[] =  date("d/m/Y", strtotime($row['date_of_blog']));
     $storeArray_s_no[] = $row['s_no'];
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
        <link rel="icon" type="img/png" href="../images/icon.png">
        <link href="https://fonts.googleapis.com/css?family=Barlow:100,300,400,500,600,700,800,900|Cabin:400,400i,500,600,700|Caveat:400,700" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/animate.css">
        <script type="text/javascript" src="../js/wow.min.js"></script>
        <script type="text/javascript" src="../js/scroll.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <title>Insightstone</title>
        <style type="text/css">


        </style>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body onload="loaderFun()">


        <!--LOADER
        <div class="loader-container" id="loader-c">
            <img src="images/logo.png" alt="loader" id="loader" class="shakeAnimate">
        </div>
-->
        <div id="myDiv">
            <div id="top"></div>
            <!--Navbar-->
            <nav class="navbar navbar-default" id="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="../images/logo1.png" alt="logo" class="logo-img fadeIn animated delay1" id="logo"></a>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle navbar-btn" data-toggle="collapse" data-target="#main" id="cmd">
                    <span class="icon-bar" id="bar1"></span>
                    <span class="icon-bar" id="bar2"></span>
                    <span class="icon-bar" id="bar3"></span>
                </button>
                    </div>
                    <div class="collapse navbar-collapse" id="main">
                        <ul class="nav navbar-nav navbar-right" id="nav">
                            <li><a href="../index.html" id="l1">HOME</a></li>
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

            <div class="blog-container">


                <?php
         $blog_no = 0;
        for ($i=0; $i < $counter; $i++) { 
           
          ?>
                    <div class="blog">
                        <div class="blog__image-box">
                        <img src="<?php echo($storeArray_images[$blog_no]) ?>" class="blog__image" alt="image">
                        </div>
                        <div class="blog__main">
                               <div class="blog-date">Posted On:
                                <?php echo $storeArray_date[$blog_no];?>
                            </div>
                            <h3 class="blog-heading">
                                <?php echo $storeArray_blog_name[$blog_no];?>
                            </h3>
                            <p class="blog-showcase">
                              <?php echo $storeArray_blog_content[$blog_no];?>
                            </p>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Read About It...</button>
                        </div>
                    </div>

                    <?php
                        $blog_no++;
            
                        }
                        ?>



            </div>




            <!--/////////////////////////////////////////////////////////////////MODAL-->
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
            
            
        <footer class="footer container-fluid">
            <div class="social-media col-md-12" style="text-align: center; margin-bottom: 20px;">
                <a href="#"><i class="fa fa-youtube-play" aria-hidden="true" style="font-size: 35px; color: #fff;"></i></a>
                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true" style="font-size: 35px; padding-left:8px; color: #fff;"></i></a>
                <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true" style="font-size: 35px; padding-left: 8px; color: #fff;"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true" style="font-size: 35px; padding-left: 8px; color: #fff;"></i></a>
            </div>

            <div class="container logo col-md-6">
                <img src="../images/logo1.png" class="img-responsive" style="width: 350px;height: auto;margin-top: 40px ;">
            </div>
            <div class="mailsection col-md-6">
                <i class="fa fa-envelope" aria-hidden="true" style="font-size: 21px; padding-right: 7px;padding-top:50px; padding-bottom: 10px; color: grey;"></i><a href="mailto:shashwatvats10@gmail.com"> info@insightone.in</a><span> - For Internship and Tie-Ups</span><br>
                <i class="fa fa-envelope" aria-hidden="true" style="font-size: 21px; padding-right: 7px; color: grey;"></i><a href="mailto:shashwatvats10@gmail.com"> influencers@insightone.in</a><span> - For Influencers Marketing Programme</span>
            </div><br>

            <div class="csi"><a href="http://csiakgec.in" target="_blank"><img src="../images/logocsi.png" class="csi__image animated infinite pulse delay-2s" alt="CSI"></a><span class="csi__text">Powered by <a class="csitext" href="http://csiakgec.in" target="_blank">csiakgec</a></span></div>
            <hr>
            <p style="text-align: center;color:#C6C3C2;">&copy; 2018 Insightone, All rights reserved</p>
        </footer>
           
           
            <div class="scrollUp" id="up" title="Back To Top">
                <a href="#header"><i class="fa fa-chevron-circle-up fa-3x scrollUp__icon"></i></a>
            </div>
        </div>

        <script src="../js/script.js"></script>

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
                        $('#logo').attr("src", "../images/logo.png");
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
                        $('#logo').attr("src", "../images/logo1.png");
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
