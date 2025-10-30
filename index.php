<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data safely
    $full_name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile_number = htmlspecialchars($_POST['mobile_number']);
    $course = htmlspecialchars($_POST['course']);
    $training_mode = htmlspecialchars($_POST['training_mode']);
    $message = htmlspecialchars($_POST['message']);

    // ✅ Step 1: Database connection
    $servername = "localhost";   // your host
    $username = "root";          // default for XAMPP
    $password = "";              // default empty for XAMPP
    $dbname = "company_info";    // your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    // ✅ Step 2: Insert query with mobile number
    $sql = "INSERT INTO company_info (full_name, email, mobile_number, course, training_mode, message)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $full_name, $email, $mobile_number, $course, $training_mode, $message);

    if ($stmt->execute()) {
        // echo "<h3>✅ Form Submitted & Data Saved Successfully!</h3>";
        // echo "<p><strong>Name:</strong> $full_name</p>";
        // echo "<p><strong>Email:</strong> $email</p>";
        // echo "<p><strong>Mobile:</strong> $mobile_number</p>";
        // echo "<p><strong>Course:</strong> $course</p>";
        // echo "<p><strong>Training Mode:</strong> $training_mode</p>";
        // echo "<p><strong>Message:</strong> $message</p>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ShreeInfotech Software Development Pvt. Ltd.</title>
  <meta name="description" content="ShreeInfotech Software Development Private Limited – empowering farmers and students with digital solutions for agriculture and education." />
  <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
      <div class="logo"><h3>Shreeinfotech Software Development Pvt. Ltd.</h3>
        <p class="logo-p">Innovating for Agriculture & Education</p>
      </div>
       <button class="menu-toggle">☰</button>
    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#courses">All Courses</a></li>
      <!-- <li><a href="">Attendance</a></li> -->
      <li><a href="#Project_info">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  <section class="info" id="home">
    <div class="info-container">
        <!-- <section class="projects" id="Project_info"> -->
    <h2 class="about-us">About Us</h2>
     <p><strong>ShreeInfotech Software Development Private Limited</strong> is a technology-driven startup dedicated to transforming the agriculture and education sectors through smart digital solutions.</p>
 <!-- <section> -->
    </div>
  </section>

<section class="projects" id="Project_info">
    
      <div class="vision-container">
      <h2>Our Vision</h2>
      <p><strong>ShreeInfotech Software Development Private Limited</strong> is a technology-driven startup dedicated to transforming the agriculture, education, and security sectors through smart digital solutions. Our expertise includes developing software platforms for farmers and students, as well as providing <strong>AI-powered surveillance camera systems</strong> for smart monitoring and safety applications.</p>
  </div>

 <div class="services-section">
    <h2>Our Services</h2>
    <!-- <div class="services-container">
      <div class="service-item">Online platform for agriculture product sales and purchase</div>
        <div class="service-item">Educational portal for student learning and skill development</div>
        <div class="service-item">Custom software development and IT solutions</div>
    </div> -->
</div>

    <div class="project-container">
      <div class="project-card">
        <div class="service-item">Online platform for agriculture product sales and purchase</div>
        <img src="Farmeasy.jpg" alt="Agriculture Marketplace">
        <div class="project-content">
          <h3>Agricultural Marketplace</h3>
          <p>FarmEasy is an e-commerce platform designed to empower farmers by providing bio-chemicals and agricultural
            supplies directly from verified suppliers. It eliminates middlemen, ensuring affordable pricing, product
            transparency, and easy doorstep delivery for every farmer.</p>
        </div>
      </div>

      <div class="project-card">
        <div class="service-item">Educational portal for student learning and skill development</div>
        <img src="edu.webp" alt="Education Portal">
        <div class="project-content">
          <h3>Education Portal</h3>
          <p>StudyNest is a digital learning portal that connects students and educators for both online and offline
            education. It offers course enrollment, study materials, and assessments in one place — helping learners
            grow at their own pace with accessible and modern tools.</p>
        </div>
      </div>

      <div class="project-card">
         <div class="service-item">Custom software development and IT solutions</div>
        <img src="surv.jpg" alt="Smart Surveillance">
        <div class="project-content">
          <h3>Surveillance Camera</h3>
          <p>TrackEye is an intelligent surveillance system that monitors traffic and detects violations automatically.
            Using real-time tracking and analytics, it helps authorities ensure road safety, reduce accidents, and
            enforce traffic regulations efficiently.</p>
        </div>
      </div>
    </div>
  </section>

 <!-- <section>
      <h2>Our Services</h2>
      <ul>
        <li>Online platform for agriculture product sales and purchase</li>
        <li>Educational portal for student learning and skill development</li>
        <li>Custom software development and IT solutions</li>
      </ul>
    </section> -->

  <section class="hero">
    <h1>Learn Website & Mobile App Development</h1>
    <p>Join our expert-led courses and start your journey today!</p>
  </section>

  <section class="courses" id="courses">
    <h2>Popular Courses with free Internship</h2>
    <div class="course-container">
      <div class="course-card">
        <img src="Mern.jpg" alt="Web Development">
        <h3>MERN</h3>
        <p>Duration: 6 Months</p>
      </div>
      <div class="course-card">
        <img src="Javapng.png" alt="Java Full Stack">
        <h3>Full Stack Java</h3>
        <p>Duration: 6 Months</p>
      </div>
      <div class="course-card">
        <img src="pythonpng.png" alt="Python Full Stack">
        <h3>Full Stack Python</h3>
        <p>Duration: 5 Months</p>
      </div>
    </div>
    <div class="explore">
      <a href="" class="exp">Explore All Courses</a>
    </div>
  </section>

  <section class="features-why">
    <div class="feature-card">
      <img src="https://img.icons8.com/color/96/000000/training.png" alt="">
      <h3>Experienced Trainers</h3>
      <p>Learn from industry experts with real-world experience.</p>
    </div>
    <div class="feature-card">
      <img src="on-off.png" alt="">
      <h3>Online & Offline</h3>
      <p>Flexible learning options to fit your schedule.</p>
    </div>
    <div class="feature-card">
      <img src="https://img.icons8.com/color/96/000000/diploma.png" alt="">
      <h3>Certified Courses</h3>
      <p>Get recognized certifications upon course completion.</p>
    </div>
    <!-- <div class="feature-card">
      <img src="inter.png" alt="">
      <h3>Internship Offers</h3>
      <p>Career support and Internship assistance for students.</p>
    </div> -->
  </section>


  <section class="value">
    <h1 href="" class="gradient">Our Values</h1>
    <h1 class="value-h2" id="value-h1">Empowering Futures: ShreeInfoTech</h1>
    <p class="value-p">With experts trainers and a mission to empower,<br> we ensure successful future and career
      advancement for our students.</p>
    <div class="value-d1">
      <div class="left">
        <img src="exp.jpg" alt="">
      </div>
      <div class="right">
        <h2 class="value-h2">We Belive in Empowering Tech Talent</h2>
        <p class="value-p1">Nurturing future innovators with the right skills and mindset, <br> Empowering every learner
          to
          build the technology of tomorrow</p>
      </div>
    </div>
    <div class="value-d1">
      <div class="left">
        <img src="launch.jpg" alt="">
      </div>
      <div class="right">
        <h2 class="value-h2">We Belive in Building Careers</h2>
        <p class="value-p1">Guiding every learner toward industry-ready skills. <br>Your journey to a successful tech
          career starts here.</p>
      </div>
    </div>

  </section>

  <section class="cta-section">
    <div class="container">
      <div class="left">
        <img src="images.jpg" alt="">
      </div>
      <div class="right">
        <h2>Start Your Learning Journey Today!</h2>
        <form method="POST" action="submit.php">
          <div class="row">
            <input type="text" name="full_name" placeholder="Full Name">
            <input type="text" name="email" placeholder="Email-ID">
          </div>
          <input type="text" name="mobile_no" placeholder="Mobile No">
          <div class="row">
            <select name="course">
              <option value="">Choose Course</option>
              <option value="Java">Java Full Stack</option>
              <option value="MERN">MERN Full Stack</option>
              <option value="Python">Python Full Stack</option>
              <option value="HTML/CSS">HTML/CSS</option>
              <option value="Javascript">Javascript</option>
              <option value="PHP">PHP</option>
            </select>
            <select name="training_mode">
              <option value="">Select Mode of Training</option>
              <option value="online">Online</option>
              <option value="offline">Offline</option>
            </select>
          </div>
          <textarea name="message" id="message" placeholder="Describe message here"></textarea>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </section>

  <section class="map-section">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7364.208962965908!2d78.09782500477132!3d20.383712594983844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd3e71a1b121657%3A0x25b972f5f5aaacb!2sShreeInfoTech%20Software%20Development%20Private%20Limited!5e0!3m2!1sen!2sin!4v1759768976088!5m2!1sen!2sin"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </section>
 <section class="contact">
      <h2>Contact Us</h2>
      <p>Email: <a href="mailto:director_prafullakinkar@shreeinfotechsoft.com">director_prafullakinkar@shreeinfotechsoft.com</a></p>
      <p>Location: Yavatmal, Maharashtra, India</p>
      <p>LinkedIn: <a href="https://www.linkedin.com/in/shreeinfotech-software-development-private-limited-1bb10138b" target="_blank">linkedin.com/company/shreeinfotechsoft</a></p>
    </section>
  <footer>
    <div class="footer-container">
      <div class="footer-box">
        <h2>Shreeinfotech Software Development Private limited</h2>
        <p>
          A leading institute dedicated to empowering students with cutting-edge technical skills in programming, web
          development, and emerging technologies. Learn, innovate, and build your future with us.
        </p>
        <p>
          <strong>Address:</strong> एकविरा चौक - सुयोग बाल उद्यान - दत्तात्रय बिचायत - दत्तात्रय नगर बोर्ड or गणेश
          वेल्डिंग - कंपनी.
        </p>
      </div>
<!-- 
      <div class="footer-box">
        <h2></h2>
        <ul>
          <li><a href="cancel.html">Cancellation Policy</a></li>
          <li><a href="shipping.html">Shipping & Delivery Policy</a></li>
          <li><a href="return.html">Return Policy</a></li>
          <li><a href="faq.html">FAQ</a></li> -->
          <!-- <li><a href="terms.html">Terms of Use</a></li> -->
        <!-- </ul> -->
      <!-- </div> --> 

      <div class="footer-box">
        <h2>Follow Us</h2>
        <div class="social-links">
          <a href="https://www.facebook.com/profile.php?id=61582597043940" target="_blank"><img src="/images/facebook.jpg" alt="Facebook"></a>
          <a href="https://wa.me/917057445099" target="_blank"><img src="/images/watsapp.jpg" alt="Watsapp"></a>
          <a href="https://www.instagram.com/shreeinfotech_sd/" target="_blank"><img src="/images/insta.jpg" alt="Instagram"></a>
          <a href="https://x.com/sisdpl06062025" target="_blank"><img src="/images/twitter.png" alt="Twitter"></a>
          <a href="https://www.linkedin.com/in/shreeinfotech-software-development-private-limited-1bb10138b" target="_blank"><img src="/images/linkedin.jpg" alt="LinkedIn"></a>
        </div>
      </div>

      <div class="footer-box" id="contact">
        <h2>Contact Us</h2>
       <p>Email: <a href="mailto:director_prafullakinkar@shreeinfotechsoft.com">director_prafullakinkar@shreeinfotechsoft.com</a></p>
        <p>LinkedIn: <a href="https://www.linkedin.com/in/shreeinfotech-software-development-private-limited-1bb10138b" target="_blank">linkedin.com/company/shreeinfotechsoft</a></p>
         <p>Location: Yavatmal, Maharashtra, India</p>
      </div>
    </div>

    <div class="footer-bottom">
      <footer>
    © 2025 ShreeInfotech Software Development Private Limited. All rights reserved.
  </footer>
    </div>
  </footer>

<script>
  const menuToggle = document.querySelector('.menu-toggle');
  const navLink = document.querySelector('.nav-links');

  menuToggle.addEventListener('click',()=>{
    navLink.classList.toggle('active')
  })

document.getElementById("contactForm").addEventListener("submit", async function(e) {
    e.preventDefault(); // stop normal form submission

    let mobile = document.getElementById("mobile").value.trim();
    let email = document.getElementById("email").value.trim();
    let message = document.getElementById("message").value.trim();
    let errorMsg = document.getElementById("errorMsg");
    let successMsg = document.getElementById("successMsg");
    errorMsg.textContent = "";
    successMsg.textContent = "";

    // ✅ Validate mobile number
    let mobilePattern = /^[0-9]{10}$/;
    if (!mobilePattern.test(mobile)) {
        errorMsg.textContent = "Please enter a valid 10-digit mobile number.";
        return;
    }

    // ✅ Validate email format
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
    if (!emailPattern.test(email)) {
        errorMsg.textContent = "Please enter a valid email address.";
        return;
    }

    // ✅ Check message for bad words
    const badWords = ["idiot", "stupid", "fool", "badword1", "badword2"];
    let lowerMsg = message.toLowerCase();

    for (let word of badWords) {
        if (lowerMsg.includes(word)) {
            errorMsg.textContent = "Message contains inappropriate words. Please remove them.";
            return;
        }
    }

    // ✅ Send data using fetch() to PHP
    try {
        let response = await fetch("submit.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({
                mobile: mobile,
                email: email,
                message: message
            })
        });

        let result = await response.text();
        successMsg.textContent = result;
        document.getElementById("contactForm").reset();

    } catch (error) {
        errorMsg.textContent = "Error sending data. Please try again.";
    }
});
</script>
</body>
</html>