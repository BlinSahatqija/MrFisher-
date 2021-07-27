<!-- PHP PER SIGNUP -->
<?php
    session_start();

    $errorName = "";
    $errorEmail = "";

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
    }
    require 'db.php';

    if(isset($_POST['signup'])){
        
        if(empty($_POST['signup-username'])){
            $errorName = "Write your username";
        }
        
        if(empty($_POST['signup-email'])){
            $errorEmail = "Email is required";
        }else{
            $email = test_input($_POST['signup-email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errorEmail = "This email format is invalid!";
            }
        }
        
        $password = password_hash($_POST['signup-password'], PASSWORD_BCRYPT);
        
        $sql = 'INSERT INTO users (name, email, password) values (:name, :email, :password)';
        $query = $pdo->prepare($sql);
        $query->bindParam('name', $name);
        $query->bindParam('email',$email);
        $query->bindParam('password',$password);
        
        if($query->execute()){
            echo '<script>alert("Signed up successfully");</script>';
        }else{
            echo '<script>alert("There was a problem while siging up");</script>';
            header("Location: index.php");
        }
    }
?>

<!-- PHP PER LOG IN -->
<?php
    if(isset($_SESSION['user_id'])){
        header("Location: index.php");
    }
    require 'db.php';
       
    if(isset($_POST['login'])):
        $email=$_POST['login-email'];
        $password=$_POST['login-password'];
        
        $query = $pdo->prepare('SELECT id, name, email, password FROM users WHERE email=:email');
        $query->bindParam(':email', $email);
        $query->execute();
        
        $user = $query->fetch();
        
        if(count($user)>0 && password_verify($password, $user['password'])){
            $_SESSION['user_id']=$user['id'];
            $_SESSION['name']=$user['name'];

            echo '<script>alert("Logged in");</script>';
            header("Location: index.php");
        }else{
            echo '<script>alert("Email  or Passowrd is wrong!");</script>';
        }
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mediaQuery.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="ionicons.min.css">
    <title>Mr Fisher</title>
</head>
<body>
    <div class="banner">
        <audio autoplay >
            <source src="media/wp-audio.mp3" type="audio/mp3">
        </audio>
        <nav class="navbar">
        <div class="logo">
            <img src="media/logo.jpg">
        </div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li><a href="#second" onmousemove="bubbleSound.play()">How it works</a></li>
                <li><a href="#cities" onmousemove="bubbleSound.play()">Our locations</a></li>
                <li><a href="#" class="contact-btn" onmousemove="bubbleSound.play()">Contact Us</a></li>
                <li><a href="#" class="login-btn" onmousemove="bubbleSound.play()">Login</a></li>
            </ul>
        </div>
    </nav>
        <video muted autoplay loop>
            <source src="media/home-fm.mp4" type="video/mp4">
        </video>
        <div class="content" data-aos="fade-up">
          <h1>Welcome to <br>Mr Fisher Restaurant</h1>
          <a href="#second" onclick="bubbleSound.play()">Show me more</a>
        </div>
        <div class="bubbles">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
            <img src="media/bubble.png">
        </div>
    </div>
    <section class="second" id="second">
        
        <div class="row">
            <h2>If it swims we have it!</h2><h2>Fresh fish from the sea straight to your table.</h2>
            <p class="long-copy">
                Hello, we're Mr. Fisher, your new premium food restaurant. We know you're hungry, so let us take care of that, we're really good at it, we promise!
            </p>
        </div>
        <div class="posts">
            <div class="post" data-aos="fade-right">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="content">
                    <h3>READY IN 20 MINUTES</h3>
                    <p>You're only twenty minutes away from your delicious and super healthy meals delivered right to your home. We work with the best chefs in each town to ensure that you're 100% happy.</p>
                </div>
            </div>
            <div class="post" data-aos="fade-up">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="content">
                    <h3>100% ORGANIC</h3>
                    <p>All our vegetables are fresh, organic and local. Sea animals are raised without added hormones or antibiotics. Good for your health, the environment, and it also tastes better!</p>
                </div>
            </div>
            <div class="post" data-aos="fade-left">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="content">
                    <h3>ORDER ANYTHING</h3>
                    <p>We don't limit your creativity, which means you can order whatever you feel like. You can also choose from our menu containing over 100 delicious meals. It's up to you!</p>
                </div>
            </div>
        </div>
        
    </section>
    <section class="third" id="third">
        <div class="third-container">
            <div class="location" data-aos="fade-down">
                <h1>Find Your<br>Mr Fisher Restaurant</h1>
                <h2>
                    As for now we operate only in Kosovo.<br>
                    You can find us in these 4 cities: Prishtine, Gjakove, Prizren, Gjilan.
                </h2>
                <a href="#cities">Learn more</a>
            </div>
            <div class = "slider" data-aos="fade-up">
                <div class="slider-item visible">
                    <img src="media/1.jpg">
                </div>
                <div class="slider-item">
                    <img src="media/2.jpg">
                </div>
                <div class="slider-item">
                    <img src="media/3.jpg">
                </div>
                <div class="slider-item">
                    <img src="media/4.jpg">
                </div>
                <div class="slider-item">
                    <img src="media/5.jpg">
                </div>
                <div class="slider-item">
                    <img src="media/6.jpg">
                </div>
                <div class="slider-item">
                    <img src="media/7.jpg">
                </div>
                <div class="slider-buttons">
                    <img id="prev" src="media/previous3.png">
                    <img id="next" src="media/next3.png">
                </div>
            </div>
        </div>
    </section>
    <section class="reviews-section">
        <div class="overlay"></div>
        <h2>Our customers can't live without us</h2>
        <div class="reviews-list">
           
            <div class="review-item"  data-aos="fade-right">
                "Mr Fisher is just awesome! A close friend of mine recommended this place to me. I'm wasn't into sea food that much at first but now I can't live without visiting it weekly!"
                <cite><img src="media/AlbertoDuncan.jpeg">Alberto Duncan</cite>
            </div>
            <div class="review-item"  data-aos="fade-up">
               "Inexpensive, healthy and great-tasting meals, delivered right to my home. We have lots of sea food restaurants here in Prishtina, but no one comes even close to Mr Fisher."
                <cite><img src="media/JoanaSilva.jpeg">Joana Silva</cite>
            </div>
            <div class="review-item"  data-aos="fade-left">
                "I was looking for the best sea food restaurant in the city. I tried a lot of them and ended up with Mr Fisher. The best meals and customer service in Prishtina. Keep up the great work!"
                <cite><img src="media/MiltonChapman.jpeg">Milton Chapman</cite>
            </div>
        </div>
    </section>
    <section class="cities-section" id="cities">
        <img class="bg-img" src="media/blue-bg2.png">
        <div class="overlay"></div>
        <h2>We're currently in these cities</h2>
        <div class="cities-list">
            <div class="city"  data-aos="fade-right">
                <img src="media/prishtina.jpg" alt="Prishtine">
                <h3>Prishtine</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    3700+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    160+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="https://twitter.com/">@mrfisher_pr</a>
                </div>
                <div class="city-feature">
                    <button class="booking booking-btn" href="#">Book Now</button>
                </div>
            </div>
            <div class="city"  data-aos="fade-up">
                <img src="media/gjakova.jpg" alt="Gjakove">
                <h3>Gjakove</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    1600+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    70+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="https://twitter.com/">@mrfisher_gjk</a>
                </div>
                <div class="city-feature">
                    <button class="booking booking-btn" href="#">Book Now</button>
                </div>
            </div>
            <div class="city"  data-aos="fade-up">
                <img src="media/prizren.jpg" alt="Prizren">
                <h3>Prizren</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    2300+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    110+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="https://twitter.com/">@mrfisher_pz</a>
                </div>
                <div class="city-feature">
                    <button class="booking booking-btn" href="#">Book Now</button>
                </div>
            </div>
            <div class="city"  data-aos="fade-left">
                <img src="media/gjilan.jpg" alt="Gjialn">
                <h3>Gjilan</h3>
                <div class="city-feature">
                    <i class="ion-ios-person icon-small"></i>
                    1200+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-ios-star icon-small"></i>
                    50+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="https://twitter.com/">@mrfisher_gjl</a>
                </div>
                <div class="city-feature">
                    <button class="booking booking-btn" href="#">Book Now</button>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-nav">
                <ul class="footer-nav-1">
                    <li><a href="#second">About us</a></li>
                    <li><a href="#cities" class="booking-btn">Bookings</a></li>
                    <li><a class="contact-btn">Contact Us</a></li>
                    <li><a href="comingSoon.php">iOS App</a></li>
                    <li><a href="comingSoon.php">Android App</a></li>
                </ul>
                <ul class="footer-nav-1" id="footer-nav-2">
                    <li><a href="https://www.facebook.com/"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/"><i class="ion-social-instagram"></i></a></li>
                </ul>
        </div>
    </footer>
    <div class="login-modal">
        <div class="modal-box">
            <div class="modal-body">
                <h3>Log In</h3>
                <form action="index.php" method="post" class="login-form" name="loginForm" onsubmit="return validateLogin(this);">
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" id="login-email" name="login-email">
                        <label for="email" id="login-email-val"></label>
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="login-password" name="login-password">
                        <label  id="login-password-val"></label>
                    </div>
                    <button class="btn login-btn-dark" type="submit" name="login">Log In</button>
                </form>
            </div>
            <div class="modal-footer">
                <p>Don't have an account? <a class="signup-btn" href="#">Sign Up</a></p>
            </div>
            <img class="login-close" src="media/close-btn.svg" alt="close">
        </div>
    </div>
    <div class="signup-modal">
        <div class="modal-box">
            <div class="modal-body">
                <h3>Sign Up</h3>
                <form action="index.php" method="post" class="signup-form" name="signupForm" onsubmit="return validateSignup(this);">
                    <div class="form-control" >
                        <label for="username">Username</label>
                        <input type="username" id="signup-username" name="signup-username">
                        <label for="username" id="signup-username-val"></label>
                    </div>
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" id="signup-email" name="signup-email">
                        <label for="email" id="signup-email-val"></label> 
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="signup-password" name="signup-password">
                        <label for="password" id="signup-password-val"></label> 
                    </div>
                    <button class="btn signup-btn-dark" type="submit" name="signup">Sign Up</button>
                </form>
            </div>
            <img class="signup-close" src="media/close-btn.svg" alt="close">
        </div>
    </div>

    <!-- PHP PER CONTACT FORM -->
    <?php 
        require 'db.php';

            if(isset($_POST['send'])){
            $name = $_POST['contact-name'];
            $email = $_POST['contact-email'];
            $message = $_POST['contact-message'];
        
            $sql = 'INSERT into contactus (name, email, message) values (:name, :email, :message)';
            
            $query = $pdo->prepare($sql);
            $query->bindParam('name',$name);
            $query->bindParam('email',$email);
            $query->bindParam('message',$message);
        
            $query->execute();
            echo '<script>alert("Thank you for your comment");</script>';
            header("Location: index.php");
        }

    ?>




    <div class="contact-modal">
        <div class="modal-box">
            <div class="modal-body">
                <h3>Contact Us</h3>
                <form action="index.php" method="post" class="contact-form" name="contactForm" onsubmit="return validateContact(this);">
                    <div class="form-control">
                        <label for="name">Name</label>
                        <input type="name" id="contact-name" name="contact-name">
                        <label for="name" id="contact-name-val"></label> 
                    </div>
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" id="contact-email" name="contact-email">
                        <label for="email" id="contact-email-val"></label>
                    </div>
                    <div class="form-control">
                        <label for="message">Message</label>
                        <textarea id="contact-message" name="contact-message"></textarea>
                        <label for="message" id="contact-message-val"></label>
                    </div>
                    <button class="btn contact-btn-dark" type="submit" name="send">Send</button>
                </form>
            </div>
            <img class="contact-close" src="media/close-btn.svg" alt="close">
        </div>
    </div>




    <!-- PHP PER BOOKING -->
    <?php 
        require 'db.php';

        if(isset($_POST['booking'])){
            $name = $_POST['booking-name'];
            $email = $_POST['booking-email'];
            $date = $_POST['booking-date'];
            $time = $_POST['booking-time'];
        
            $sql = 'INSERT into bookings (name, email, date, time) values (:name, :email, :date, :time)';
            
            $query = $pdo->prepare($sql);
            $query->bindParam('name',$name);
            $query->bindParam('email',$email);
            $query->bindParam('date',$date);
            $query->bindParam('time',$time);
        
            $query->execute();
            echo '<script>alert("Thank you for your booking!");</script>';
            header("Location: index.php");
        }
    ?>

    <div class="booking-modal">
        <div class="modal-box">
            <div class="modal-body">
                <h3>Book a table:</h3>
                <form action="index.php" method="post" class="booking-form" name="bookingForm" onsubmit="return validateBooking(this);">
                    <div class="form-control">
                        <label for="name">Name</label>
                        <input type="name" id="booking-name" name="booking-name">
                        <label for="name" id="booking-name-val"></label>
                    </div>
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" id="booking-email" name="booking-email">
                        <label for="email" id="booking-email-val"></label> 
                    </div>
                    <div class="form-control">
                        <label for="date">Date and time:</label>
                        <input type="date" id="booking-date" name="booking-date" onfocus="this.min=new Date().toISOString().split('T')[0]">
                        <label for="date" id="booking-date-val"></label> 
                    </div>
                    <div class="form-control">
                        <input type="time" id="booking-time" name="booking-time" min="18:00" max="21:00" >
                        <label for="time" id="booking-time-val"></label> 
                    </div>
                    <button class="btn booking-btn-dark" type="submit" name="booking">Book the table</button>
                </form>
            </div>
            <img class="booking-close" src="media/close-btn.svg" alt="close">
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init(
         {duration: 1500}
      );
    </script>  
    <script src="main.js"></script>
</body>
</html>