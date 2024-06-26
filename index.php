<?php
$message = ''; // Variable to store the message
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $host = "yourhost"; 
    $username = "username";
    $password = "password";
    $database = "database_name";

    // Connect to the database
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Receive and sanitize input
    $guardianName = $conn->real_escape_string($_POST['guardian_name']);
    $studentName = $conn->real_escape_string($_POST['student_name']);
    $class = $conn->real_escape_string($_POST['class']);
    $board = $conn->real_escape_string($_POST['board']);
    $contactNumber = $conn->real_escape_string($_POST['contact_number']);

    // SQL query to insert data
    $sql = "INSERT INTO tutoring_registrations (guardian_name, student_name, class, board, contact_number) VALUES ('$guardianName', '$studentName', '$class', '$board', '$contactNumber')";

    if ($conn->query($sql) === TRUE) {
      $message = '<div style="color: green;">Registration successful!</div>';
  } else {
      $message = '<div style="color: red;">Error: ' . htmlspecialchars($sql) . '<br>' . htmlspecialchars($conn->error) . '</div>';
  }
  
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>Personalized Tutoring</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<main>
  <div class="hero-section">
    <div class="hero-content">
        <h1>PERSONALIZED TUTORING UNIQUE TO YOUR CHILD</h1>
        <!-- <p>This text should be on the top of the image on mobile and to the right on desktop.</p> -->
    </div>
    <img src="images/main.png" class="hero-image">
</div>

<form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h3 class="form-title" id="section1">Join Our Individualized </h3>
  <h3 style="color:#7D3F98;text-align: center;
  margin-bottom: 20px;
  font-size: 1.8em;">Tutoring Today</h3>
  <div class="form-group">
    <input type="text" id="guardian-name" name="guardian_name" placeholder="Guardian Name" required>
  </div>
  <div class="form-group">
    <input type="text" id="student-name" name="student_name" placeholder="Student Name" required>
  </div>
  
  <div class="form-group">
    <style>
      .radio-button {
        display: inline-block;
        margin-right: 10px; /* Space between buttons */
        margin-bottom: 10px; /* Space between lines of buttons */
      }
      
      .radio-button input[type="radio"] {
        display: none; /* Hide the default radio button */
      }
      
      .radio-button label {
        display: block;
        width: 45px; /* Width of the box */
        height: 35px; /* Height of the box */
        border: 2px solid #CCCCCC; /* Border color */
        border-radius: 5px; /* Rounded corners */
        text-align: center;
        line-height: 35px; /* Center text vertically */
        cursor: pointer;
      }
      
      .radio-button input[type="radio"]:checked + label {
        background-color: #007BFF; /* Background color for selected */
        color: white; /* Text color for selected */
        border: 2px solid #007BFF; /* Border color for selected */
      }
    </style>
  
    <label for="class">Class:</label><br>
    <!-- Radio button for KG -->
    <div class="radio-button">
      <input type="radio" name="class" id="classKG" value="KG">
      <label for="classKG">KG</label>
    </div>
    <!-- Radio button for class 1 -->
    <div class="radio-button">
      <input type="radio" name="class" id="class1" value="1">
      <label for="class1">1</label>
    </div>
    <div class="radio-button">
      <input type="radio" name="class" id="class2" value="2">
      <label for="class2">2</label>
    </div>
    <div class="radio-button">
      <input type="radio" name="class" id="class3" value="3">
      <label for="class3">3</label>
    </div>
    <div class="radio-button">
      <input type="radio" name="class" id="class4" value="4">
      <label for="class4">4</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class5" value="5">
      <label for="class5">5</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class6" value="6">
      <label for="class6">6</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class7" value="7">
      <label for="class7">7</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class8" value="8">
      <label for="class8">8</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class9" value="9">
      <label for="class9">9</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class10" value="10">
      <label for="class10">10</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class11" value="11">
      <label for="class11">11</label>
    </div>
    
    <div class="radio-button">
      <input type="radio" name="class" id="class12" value="12">
      <label for="class12">12</label>
    </div>
    
  </div>
  
  <div>
    <label style="font-weight: bold; margin-right: 10px;">Board:</label>
    <div style="margin-bottom: 10px;">
        <br>
        <input type="radio" id="cbse_icse" name="board" value="CBSE/ICSE" style="margin-right: 5px;">
        <label for="cbse_icse" style="margin-right: 20px;">CBSE/ICSE</label>
        <input type="radio" id="ib_igcse" name="board" value="IB/IGCSE" style="margin-right: 5px;">
        <label for="ib_igcse">IB/IGCSE</label>
    </div>
</div>

    <div>
      <input type="radio" id="state_board_other" name="board" value="State Board/Other">
      <label for="state_board_other">State Board/Other</label>
    </div>
    <br>
  </div>
  
  <div class="form-group">
    <input type="tel" id="contact-number" name="contact_number" placeholder="Contact Number" required>
  </div>
  
  <div class="form-group">
    <button type="submit" class="submit-button">Submit</button>
  </div>

  <?php if (!empty($message)): ?>
        <div style="text-align: center; width: 100%; margin-top: 20px;">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
</form>

<div class="features-section">
  <h2 class="features-title">What Interval Does Better</h2>
  
  <div class="feature" style="background: linear-gradient(to right, #d0e1fd, #dff4fd);">
    <img src="images/affordable.png" alt="Customized Pricing" class="feature-icon">
    <div class="feature-text">
      <h3 class="feature-heading">Customized Pricing,</h3>
      <p>Pay according to sessions</p>
    </div>
  </div>
  
  <div class="feature" style="background: linear-gradient(to right, #fee3de, #ffd1d1);">
    <img src="images/flexible-time.png" alt="Flexible Timings" class="feature-icon">
    <div class="feature-text">
      <h3 class="feature-heading">Flexible timings,</h3>
      <p>Choose according to your time</p>
    </div>
  </div>
  
  <div class="feature" style="background: linear-gradient(to right, #c3f9dd, #c4ecf2);">
    <img src="images/atom.png" alt="Science-backed Teaching" class="feature-icon">
    <div class="feature-text">
      <h3 class="feature-heading">Science–backed teaching,</h3>
      <p>Child–specific teaching styles</p>
    </div>
  </div>
</div>
<br>
<div style="background-color: white; color:#7D3F98; text-align: center; font-size: 28px; font-weight: bold; height: 65px; font-family: 'poppins', sans-serif;margin-bottom: 18px;">
  JUST 3 MINUTES
  <div style="font-size: 14px;color: black; font-weight: normal;">
    
    To unlock their true potential
  </div>
</div>


<div>
<button class="demo-button" onclick="scrollToSection('section1')">BOOK FREE DEMO</button>
<br>
</div>
<p style="text-align:center">Join our 30,000+ winning learners</p>
<br>
<!-- testimonial -->
<div class="testimonial-container">
  <h2>Our Happy <br>Family Voices</h2>

  <!-- Slick Carousel -->
  <div class="slick-carousel mySlickCarousel">
    <!-- Slide 1 -->
    <div class="slick-slide">
      <div class="video-wrapper">
        <iframe src="https://www.youtube.com/embed/_F-4cE0HGGg?enablejsapi=1&controls=1&rel=0&showinfo=0" style="width: 100%; height: 100%; border-radius: 10px;" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="slick-slide">
      <div class="video-wrapper">
        <iframe src="https://www.youtube.com/embed/zlTMQKHhGqg?enablejsapi=1&controls=1&rel=0&showinfo=0" style="width: 100%; height: 100%; border-radius: 10px;" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="slick-slide">
      <div class="video-wrapper">
        <iframe src="https://www.youtube.com/embed/oppNed4nQBU?enablejsapi=1&controls=1&rel=0&showinfo=0" style="width: 100%; height: 100%; border-radius: 10px;" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <!-- Slide 4 -->
    <div class="slick-slide">
      <div class="video-wrapper">
        <iframe src="https://www.youtube.com/embed/iDairzza6cY?enablejsapi=1&controls=1&rel=0&showinfo=0" style="width: 100%; height: 100%; border-radius: 10px;" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- Add Pagination -->
  <div class="slick-pagination"></div>
  
  <button class="book-demo" onclick="scrollToSection('section1')">BOOK FREE DEMO</button>
</div>



<div class="statistics-section">
  <h2>According to 90% of the Parents</h2>

  <div class="statistic">
    <div class="statistic-value" style="background: linear-gradient(rgba(161, 196, 253, 0.7), rgba(194, 233, 251, 0.7))">4/5</div>
    <p>Students face study related anxiety</p>
  </div>
  
  <div class="statistic">
    <div class="statistic-value" style="background: linear-gradient(rgba(243, 175, 184, 0.7), rgba(251, 209, 214, 0.7))">50%</div>
    <p>Upper primary students find maths and science tough</p>
  </div>
  
  <div class="statistic">
    <div class="statistic-value" style="background: linear-gradient(rgba(133, 244, 187, 0.7), rgba(140, 217, 232, 0.7));">5/5</div>
    <p>Parents claim that ordinary classroom methods are not enough</p>
  </div>
  
  <p class="call-to-action">Your child needs special attention for their studies!</p>
</div>

<div>
  <button class="demo-button"onclick="scrollToSection('section1')">BOOK FREE DEMO</button>
  <br>
  </div>

  <div style="background-color:#f5f4f4;">
    <br>
    <div class="heading-container">
      <h1>US <img style="width: 50px;" src="images/vs.png" alt="VS"> THEM</h1>
    </div>
  
    <div class="description" style="text-align: center;">
      <p style="margin: 0 auto; width: fit-content; white-space: nowrap;">This is what sets apart from Traditional teaching <br> institutions!</p>
    </div>
        
  
    <!-- Wrapper added for flexbox display and border -->
    <div style="display: flex;">
  
      <div class="featuresb-container" style="flex: 1; padding-right: 20px; border-right: 2px solid red;">
        <div class="featureb-column left">
          <h2 class="centered-heading">Our Classroom</h2>
          <!-- Your features go here -->
          <div class="featureb" >
            <img src="images/learning.png" alt="Feature 1">
            <p>One Teacher for a Student</p>
          </div>
          <!-- Additional features omitted for brevity -->
          <div class="featureb">
            <img src="images/brain.png" alt="Feature 1">
            <p>Special Attention</p>
          </div>
          <div class="featureb">
            <img src="images/blended-learning.png" alt="Feature 1">
            <p>Blended Learning</p>
          </div>
          <div class="featureb">
            <img src="images/communications.png" alt="Feature 1">
            <p>Live Doubt Solving</p>
          </div>
          <!-- Repeat for other features -->
        </div>
      </div>
  
      <!-- Right side does not need extra padding or border, but kept inside the wrapper for layout -->
      <div class="featuresb-container" style="flex: 1; padding-left: 20px;">
        <div class="featureb-column right">
          <h2 class="centered-heading">Regular Classroom</h2>
          <!-- Your features go here -->
          <div class="featureb">
            <img src="images/classroom (1).png" alt="Feature 5">
            <p>1 Teacher for a Whole Classroom</p>
          </div>
          <!-- Additional features omitted for brevity -->
          <div class="featureb">
            <img src="images/Dispersed-attention.png" alt="Feature 5">
            <p>Dispersed Attention</p>
            
          </div>
          <div class="featureb">
            <img src="images/reading-book.png" alt="Feature 5">
            <p>Textual Learning</p>
            
          </div>
          <div class="featureb">
            
            <img src="images/people.png" alt="Feature 5">
            <p>Basic Answering Session</p>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  
<div style="background-color: #f5f4f4;">
  <button class="demo-button" onclick="scrollToSection('section1')">BOOK FREE DEMO</button>
  <br>
</div>
</div>

<div class="steps-container">
  <h2>Here’s How We Can Get Started!</h2>
  <div class="step" id="step1" style="position: relative;">
      <div class="icon-container" style="background: linear-gradient(rgb(78, 134, 224), rgb(107, 169, 198))">
          <img src="images/viber.png" alt="Book a Demo">
      </div>
      <div class="step-info">
          <h3>Book a Demo</h3>
          <p>Tell us you’re interested and we will reach out to you!</p>
      </div>
      <!-- Arrow Below Step 1 -->
      <div style="position: absolute; left: 50%; bottom: -10px; transform: translateX(-50%); border-left: 10px solid transparent; border-right: 10px solid transparent; border-top: 10px solid black;"></div>
  </div>
  <div class="step" id="step2" style="position: relative;">
      <div class="icon-container" style="background: linear-gradient(rgb(243, 175, 184), rgb(251, 209, 214))">
          <img src="images/checklist.png" alt="Assessment">
      </div>
      <div class="step-info">
          <h3>Assessment</h3>
          <p>We will fix an assessment for your child to help figure out the weak points and personalize a unique schedule for your child.</p>
      </div>
      <!-- Arrow Below Step 2 -->
      <div style="position: absolute; left: 50%; bottom: -10px; transform: translateX(-50%); border-left: 10px solid transparent; border-right: 10px solid transparent; border-top: 10px solid black;"></div>
  </div>
  <div class="step" id="step3" style="position: relative;">
      <div class="icon-container" style="background: linear-gradient(rgb(133, 244, 187), rgb(140, 217, 232));">
          <img src="images/low-cost.png" alt="Decide">
      </div>
      <div class="step-info">
          <h3>Decide</h3>
          <p>Customize your plan along with the price to suit your needs and outcomes!</p>
      </div>
      <!-- Arrow Below Step 3 -->
      <div style="position: absolute; left: 50%; bottom: -10px; transform: translateX(-50%); border-left: 10px solid transparent; border-right: 10px solid transparent; border-top: 10px solid black;"></div>
  </div>
</div>

<div style="background-color: white; color:#7D3F98; text-align: center; font-size: 28px; font-weight: bold; height: 65px; font-family: 'poppins', sans-serif;margin-bottom: 18px;">
  JUST 3 MINUTES
  <div style="font-size: 14px;color: black; font-weight: normal;">
    
    To unlock their true potential
  </div>
</div>
<div>
  <button class="demo-button"onclick="scrollToSection('section1')">BOOK FREE DEMO</button>
  </div>

  <!-- banner -->
  <div class="cta-section">
    <p class="cta-quote">“Let them learn better and score better with Classroom”</p>
    <p class="cta-text">Let your child start their journey now!</p>
    <div class="button-container">
      <button class="demo-button"onclick="scrollToSection('section1')">BOOK FREE DEMO</button>
  
    </div>
  </div>
  <br>
  <br>
<!-- end of the banner   -->

<!-- Frequently Asked Questions -->
<h2 style="color:#7D3F98;">Frequently Asked Questions</h2>

<div class="faq-container">

  <!-- Initially visible FAQ items -->
  <div class="faq-item">
    <button class="faq-question">Are the tutors well qualified?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>Yes, our tutors are considered to be subject matter experts, hence they will assist your child in their weak areas, especially in subjects like mathematics where our tutor mathematics puts in the extra effort.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">What are the timings for the classes?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>Each of our online classroom sessions has highly flexible timings according to your child's needs. Our crash course fees depend on the child's needs and weak areas.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Is the price fixed for this course?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>No, at Intervals our classroom course is mainly based on providing customized prices to your child's personalized needs hence the price differs. our prices are highly suitable for even class 12 online classes.</p>
    </div>
  </div>
  
  <div class="faq-item">
    <button class="faq-question">How many sessions are there in total?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>The sessions depend on the need and the subject you need, whether it's for any language classes or for an advanced physics syllabus your child will get sessions accordingly which will be every week based on the need.</p>
    </div>
  </div>
  
  <div class="faq-item">
    <button class="faq-question">Do you provide all subjects?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>Yes, our tutors are considered to be subject matter experts, hence they will assist your child in their weak areas, especially in subjects like mathematics where our tutor mathematics puts in the extra effort.</p>
    </div>
  </div>
  

  <!-- Initially hidden FAQ items -->
<div id="additional-faqs" style="display: none;">
  <div class="faq-item">
    <button class="faq-question">Does the classroom provide maths tutoring?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>Yes, the classroom is mostly enquired for its online tutor for mathematics as our tutors for this subject are known to handle maths as a subjects efficiently and we even have online tutor physics as well.</p>
    </div>
  </div>
  
  <div class="faq-item">
    <button class="faq-question">Does classroom provide better math teacher online?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>Yes, our mathematics teacher online are the best that there is to offer and they are equipped to handle your child's needs on academics efficiently.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">Do you provide maths tuitions in countries like Qatar and Dubai?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>Yes, our classroom sessions aren't limited to one place as our maths tutor in Qatar and maths tuition in Dubai are rated to be the best among what's available out there.</p>
    </div>
  </div>

  <div class="faq-item">
    <button class="faq-question">What all crash courses are there in the classroom?<span class="toggle-icon">+</span></button>
    <div class="faq-answer">
      <p>We provide crash courses in the form of class 11 crash courses and crash course class 12 which helps your child prepare well.</p>
    </div>
  </div>
</div>


  <!-- See More/Less Toggle Button -->
  <button onclick="toggleFaqs()" id="faq-toggle-btn" style="background:none; color:blue; border:none; cursor:pointer; text-decoration:underline; float:right; font-size:12px;">See more</button>
</div>
  

<div>
  <br>
  <button class="demo-button" onclick="scrollToSection('section1')">Book a Demo Now</button>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  </div>

  <div class="floating-cta">
    <div class="ctas-text">
      
    <button class="float-button" onclick="scrollToSection('section1')">Unlock Your Child's Potential Today!</button>
    </div>
  </div>

<!-- Slick Carousel CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>



</body>
<script>document.querySelectorAll('.faq-question').forEach(function(question) {
  question.addEventListener('click', function() {
    var answer = this.nextElementSibling;
    var icon = this.querySelector('.toggle-icon');


    if (answer.style.display === 'none' || answer.style.display === '') {
      answer.style.display = 'block';
      icon.textContent = '−'; 
    } else {
      answer.style.display = 'none';
      icon.textContent = '+'; 
    }

    document.querySelectorAll('.faq-answer').forEach(function(otherAnswer) {
      if (otherAnswer !== answer) {
        otherAnswer.style.display = 'none';
        otherAnswer.previousElementSibling.querySelector('.toggle-icon').textContent = '+';
      }
    });
  });
});

$(document).ready(function(){
  var slickCarousel = $('.mySlickCarousel');

  slickCarousel.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
    var currentIframe = slick.$slides.eq(currentSlide).find('iframe');
    if (currentIframe.length > 0) {
      slick.slickPause(); // Pause autoplay when video starts
    } else {
      slick.slickPlay(); // Resume autoplay when video ends
    }
  });

  slickCarousel.slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    pauseOnHover: true,
    pauseOnFocus: true
  });
});



function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    section.scrollIntoView({ behavior: 'smooth' });
}

function toggleFaqs() {
    var additionalFaqs = document.getElementById('additional-faqs');
    var toggleBtn = document.getElementById('faq-toggle-btn');
    if (additionalFaqs.style.display === 'none') {
      additionalFaqs.style.display = 'block';
      toggleBtn.textContent = 'See less';
    } else {
      additionalFaqs.style.display = 'none';
      toggleBtn.textContent = 'See more';
    }
  }

</script>
</html>
