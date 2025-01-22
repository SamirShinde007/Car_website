<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/main.css">

</head>

<body>
    <section class="one">
        <div class="main-container">
            <div class="navbar">
                <div class="nav-1">
                    <a href="./index.php">CabHub</a>
                </div>
                <div class="nav-2">
                    <a href="index.php">home</a>
                    <a href="#about">About</a>
                    <a href="./book_cab.php">Booking</a>
                    <a href ="./viewbooking.php">View Booking Details</a>
                    <a href="./feedback.php">Feedback</a>
                    <a href="./logout.php">logout</a>
                </div>
            </div>
            <div class="main-heading">
                <h4> WELCOME TO CabHub !</h4>
                <h2>BOOK CAB FOR YOUR RIDE</h2>
                <p>There are many variations of passages available the majority have suffered alteration in some form generators on the Internet tend to repeat predefined chunks injected humour randomised words look even slightly believable.</p>
            </div>
        </div>
    </section>


    <div class="heading" id="booking">
        <h2> <span class="color">Few Cab book</span></h2>
    </div>


    <section class="two">
        <div class="c1">

            <?php
            include('db/connection.php');
            $query = mysqli_query($conn, "select * from addcabdetails");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="card">
                    <div class="card-info">
                        <div class="card-img">
                            <p><img src="./images/new_cab.png" alt=""></p>
                        </div>
                        <div class="card-content">
                            <p class="cab-info">Location : <?php echo $row['location']; ?></p>
                            <p class="cab-info">Cab Name : <?php echo $row['cab_name']; ?></p>
                            <p class="cab-info">Cab No :<?php echo $row['cab_no']; ?></p>
                            <p class="cab-info">Location distance in (KM) :<?php echo $row['km']; ?></p>
                            <p class="cab-info">Price :<?php echo $row['price']; ?></p>
                            <p class="cab-info">Driver Name :<?php echo $row['dri_name']; ?></p>
                            <p class="cab-info">Driver No :<?php echo $row['dri_no']; ?></p>
                            <!-- <p class="cab-info">Driver licence:<?php echo $row['dri_li']; ?></p> -->

                            <h5><button><a href="book_cab.php">Book Now</a></button></h5>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

        <style>
            .c2 h2 {
                text-align: center;
            }
        </style>
        <div class="c2">
            <h2>Populer Locations</h2>
            <br>
            <?php
            include('db/connection.php');
            $query = mysqli_query($conn, "select * from working_locations");

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <h6>

                    <?php echo $row['city_name']; ?>
                </h6>
            <?php } ?>
        </div>
    </section>
<hr>

   <div class="heading">
    <h2> Vehicles</h2>
</div>

<section class="three">
    <div class="vehicle-container">
        
         <!-- <div class="container">
            <h3>Categories</h3>
            <ul>
                <li><a href="#suv">SUV</a></li>
                <li><a href="#luxury">Luxury</a></li>
                <li><a href="#sportscar">Sports Cars</a></li>
            </ul>
        </div> -->

        <!-- Main Vehicle Content -->
        <div class="main-tariff">
            <div class="inner-tarrif"> 
                <hr>
                <div class="inner-box" id="suv">
                    <hr>
                    <img src="images/wegnar.png" alt="image of wegnar">
                    <h2>Wegnar car</h2><br>
                    <p>Spacious and comfortable, ideal for family trips.</p>
                     <p>Seats up to 5 passengers.</p>
                    <p>Ample boot space for luggage.</p>
                    <p>Fuel-efficient and reliable.</p>
                    <p>Perfect for city and highway driving.</p>
                    <p>Available in multiple colors.</p> <br><br><br><br><hr>
                </hr>
                </div>
            </hr>
                <hr>
                 <div class="inner-box" id="luxury">
                    <hr>
                    <img src="images/swift.png" alt="image of swift">
                    <h2 class="heading-yellow">Swift car</h2><br>
                    <p>Compact and fuel-efficient, perfect for city rides.</p>
                    <p>Seats up to 4 passengers.</p>
                    <p>Easy to maneuver in traffic.</p>
                    <p>Low maintenance cost.</p>
                    <p>Stylish design and comfortable interior.</p>
                    <p>Great for daily commutes.</p><br><br><br> <hr>
                </div>
                <hr> 
                <div class="inner-box">
                    <hr>
                    <img src="images/Ertiga.png" alt="image of Ertiga">
                   
                    <h2 class="heading-yellow">Ertiga car</h2><br>
                     <p>Stylish and versatile, great for long journeys.</p>
                    <p>Seats up to 7 passengers.</p>
                    <p>Spacious interior with flexible seating.</p>
                    <p>Advanced safety features.</p>
                    <p>Fuel-efficient and powerful engine.
                    <p>Ideal for family vacations. <br><br><br><br><br><hr>
                    <br>
                </div>
                <hr>
                <div class="inner-box" id="sportscar">
                    <hr>
                    <img src="images/innova.png" alt="image of innova">
                  
                    <h2>Innova car</h2><br>
                    <p>Luxurious and powerful, suitable for all terrains.</p>
                     <p>Seats up to 8 passengers.</p>
                    <p>High ground clearance for rough roads.</p>
                    <p>Premium interior with advanced features.</p>
                    <p>Strong and durable build.</p>
                    <p>Perfect for long-distance travel.</p><br><br><br>
                     <hr>
                </div>
                <hr>
                
                 <div class="inner-box" id="sportscar">
                    <hr>
                    <img src="images/scorpio.png" alt="image of scorpio">
                    <h2>scorpio car</h2><br>
                    <p>Rugged and reliable, perfect for off-road adventures.</p>
                    <p>Seats up to 7 passengers.</p>
                    <p>Powerful engine with high torque.</p>
                    <p>Advanced 4x4 capabilities.</p>
                    <p>Robust design and build quality.</p>
                    <p>Ideal for adventurous trips.</p><br><br><br><br>
                    <hr>
                </div>
                <hr>
            </div>
            
        </div>
        
    </div>
    <hr>
</section>



    <div class="heading" id="about">
        <h2>About <span class="color">CabHub</span></h2>
    </div>


    <section class="four">
        <div class="home-container">
            <div class="info">
                <div class="box">
                    <img src="./images/add-user.gif" alt="">
                    <h6>User-Friendly Platform</h6>
                    <p> Emphasize the user-friendly interface of the CabHub app or website, making it easy for
                        customers
                        to book a cab with just a few clicks.
                    </p>
                </div>
                <div class="box">
                    <img src="./images/24-7.gif" alt="">
                    <h6>24/7 Service</h6>
                    <p> Highlight that CabHub operates 24/7, providing customers with the convenience of booking a
                        cab
                        anytime, day or night.
                    </p>
                </div>
                <div class="box">
                    <img src="./images/clock.gif" alt="">
                    <h6>Real-Time Tracking</h6>
                    <p> Highlight the real-time tracking feature, allowing customers to track their cab's location
                        and
                        estimated time of arrival.
                    </p>
                </div>
            </div>
        </div>
        <hr>

    </section>


    <div class="heading">
        <h2>Customer Reviews</h2>
    </div>

    <section class="five">
        <div class="review">
            <div class="r1">
                <div style="width: 20%;">
                    <img src="./images/user1.png" alt="">
                </div>
                <div style="width: 80%;">
                    <h5>Rohan </h5>
                    <p>I've been using CabHub for my daily commute, and I'm impressed with the efficiency and
                        professionalism of their drivers. The app is easy to navigate, making the entire experience
                        seamless.</p>
                </div>
            </div>
            <div class="r2">
                <div style="width: 20%;">
                    <img src="./images/user2.png" alt="">
                </div>
                <div style="width: 80%;">
                    <h5>Prathmesh</h5>
                    <p>CabHub's online cab booking has become my go-to choice. The drivers are courteous, and the
                        vehicles are well-maintained. The real-time tracking feature adds an extra layer of convenience
                        to the service.</p>
                </div>
            </div>
        </div><br><br>
        <hr><br>

    </section>


    <section class="six">
        <footer>
            <div class="column">
                <h2>CabHub</h2><br>
                <hr><br>
                <p style="text-align: left;">
                    CabHub is your go-to platform for reliable and comfortable rides. We are dedicated to providing
                    exceptional service, ensuring your journey is smooth and hassle-free. Contact us for all your
                    transportation needs.</p>
            </div>
            <div class="column">
                <h2>Quick Links</h2><br>
                <hr><br>
                <p><a href="signup.php">Signup</a></p><br>
                <p>blog</p><br>
                <p><a href="admin_login.php">Admin</a></p>
            </div>

            <div class="column">
                <h2>Contact Us</h2><br>
                <hr><br>
                <p>Email: cabHub@gamil.com</p><br>
                <p>Phone: +8010300951
                </p><br>
                <p>Facebook
                    Twitter</p>
            </div>
        </footer>


        <p class="" id="f_p">&copy; 2024 Your Cab Service. All rights reserved.</p>

    </section>













    <script src="script.js"></script>
</body>

</html>