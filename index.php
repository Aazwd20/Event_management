<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU Event Management Website </title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

      <!-- Navigation Bar -->
  <?php require 'includes/nav.php'; ?>


    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Your Events<span> Your Way</span></h3>
            <a href="#" class="btn">Book Now</a>
        </div>

        <div class="swiper-container home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/pro.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/cul.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/cul.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/cul.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/cul.jpg" alt=""></div>
            </div>
        </div>

    </section>

    <!-- home section ends -->
    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading">Program <span>Categories</span></h1>

        <div class="box-container">

            <div class="box">
                <img src="images/cls.jpg" alt="">
                <h3 class="title">Workshop</h3>   
            </div>



            <div class="box">
                <img src="images/audit.jpg" alt="">
                <h3 class="title">Events</h3>
                
            </div>

            <div class="box">
                <img src="images/multi.jpg" alt="">
                <h3 class="title">Workshop</h3>
                
            </div>

            <div class="box">
                <img src="images/audit.jpg" alt="">
                <h3 class="title">Seminar</h3>
                
            </div>



        </div>

    </section>
    <!-- service section starts  -->

    <section class="service" id="service">

        <h1 class="heading"> our <span>services</span> </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-map-marker-alt"></i>
                <h3>venue selection</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
            </div>

            <div class="box">
                <i class="fas fa-laptop"></i>
                <h3>Hardware items</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
            </div>

            <div class="box">
                <i class="fas fa-code"></i>
                <h3>software items</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
            </div>

            <div class="box">
                <i class="fas fa-life-ring"></i>
                <h3>Human Resource</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
            </div>

            <div class="box">
                <i class="fas fa-photo-video"></i>
                <h3>photos and videos</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
            </div>



        </div>

    </section>

    <!-- service section ends -->




    <!-- gallery section ends -->

    

    <!-- review section starts  -->

    <section class="reivew" id="review">

        <h1 class="heading">Some Review About <span>Events</span></h1>

        <div class="review-slider swiper-container">

            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/cultural_club.png" alt="">
                        <div class="user-info">
                            <h3>Cultural Club</h3>
                            <span>verified</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis dolor dicta cum. Eos beatae
                        eligendi, magni numquam nemo sed ut corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.</p>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/computer_club.png" alt="">
                        <div class="user-info">
                            <h3>Computer Club</h3>
                            <span>verified</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis dolor dicta cum. Eos beatae
                        eligendi, magni numquam nemo sed ut corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.</p>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/robotics_club.jpg" alt="">
                        <div class="user-info">
                            <h3>Robotics Club</h3>
                            <span>verified</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis dolor dicta cum. Eos beatae
                        eligendi, magni numquam nemo sed ut corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.</p>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="images/pp.jpg" alt="">
                        <div class="user-info">
                            <h3>UIU Photography Club</h3>
                            <span>verified</span>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis dolor dicta cum. Eos beatae
                        eligendi, magni numquam nemo sed ut corrupti, ipsam iure nisi unde et assumenda perspiciatis
                        voluptatibus nihil.</p>
                </div>

            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading"> <span>Booking</span> Event </h1> 
        <a href="book.php"><button class="btn" style="height: 65px;width: 60%;font-size: 35px; margin-left:300px"> Book now</button></a>
        

    </section>

    <!-- contact section ends -->

  <!-- --------------------------- Footer ------------------------------- -->

  <?php require 'includes/footer.php'; ?>


  <!-- ---------------------------Footer Close------------------------------- -->

    <!-- theme toggler  -->

    <div class="theme-toggler">

        <div class="toggle-btn">
            
        </div>

        <h3>choose color</h3>

        <div class="buttons">
            <div class="theme-btn" style="background: #000000;"></div>
            <div class="theme-btn" style="background: #f7b731;"></div>
            <div class="theme-btn" style="background: #ff0033;"></div>
            <div class="theme-btn" style="background: #20bf6b;"></div>
            <div class="theme-btn" style="background: #fa8231;"></div>
            <div class="theme-btn" style="background: #FC427B;"></div>
        </div>

    </div>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>