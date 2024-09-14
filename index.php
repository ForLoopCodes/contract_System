<?php
// Initialize variables
$name = $email = $subject = $message = "";
$success = "";
$error = "";

// Database connection settings
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "farmingsystem";

// Create a connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO contact (name, Email, Subject, Message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        $success = "Message sent successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }

    $stmt->close();
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assured Contract Farming Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/index-responsive.css">
</head>

<body>

    <!-- header section starts here -->

    <header>
        <div class="container-fluid">
            <nav class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo.png" alt="logo"></a>
                </div>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about-us">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#faqs">FAQs</a></li>
                    <li><a href="./assets/pages/login.php" class="btn">Login/Signup</a></li>
                </ul>
                <button class="toggle-menu" id="toggle-menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <!-- header section ends here -->

    <!-- main section starts here -->

    <main>

        <!-- home section starts here -->

        <section id="home">
            <div class="container-fluid">
                <div class="hero">
                    <div class="hero-content">
                        <h1>Empowering Farmers with Stable Market Access</h1>
                        <p>Connecting farmers with guaranteed buyers, ensuring secure contracts and timely payments.</p>
                        <a href="./assets/pages/login.php" class="btn cta-button">Get Started</a>
                        <a href="#about-us" class="btn cta-button">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- home section ends here -->

        <!-- feature section starts here -->

        <section id="features">
            <div class="container">
                <h2>Key Features</h2>
                <div class="features-container">
                    <div class="feature">
                        <i class="fa-solid fa-file-shield"></i>
                        <h3>Secure Contracts</h3>
                        <p>Ensure transparent agreements between farmers and buyers.</p>
                    </div>
                    <div class="feature">
                        <i class="fa-solid fa-phone"></i>
                        <h3>Real-time Communication</h3>
                        <p>Facilitate direct communication for negotiations.</p>
                    </div>
                    <div class="feature">
                        <i class="fa-solid fa-credit-card"></i>
                        <h3>Guaranteed Payments</h3>
                        <p>Secure and track payments with ease.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- feature section ends here -->

        <!-- how-it-works section starts here -->

        <section id="how-it-works">
            <div class="container">
                <h2>How It Works</h2>
                <div class="steps">
                    <div class="step">
                        <h3>Step 1</h3>
                        <p>Farmers register and list their crops.</p>
                    </div>
                    <div class="step">
                        <h3>Step 2</h3>
                        <p>Buyers browse and select crops.</p>
                    </div>
                    <div class="step">
                        <h3>Step 3</h3>
                        <p>Contracts are negotiated and signed.</p>
                    </div>
                    <div class="step">
                        <h3>Step 4</h3>
                        <p>Payments are processed securely.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- how-it-works section ends here -->

        <!-- about section starts here -->

        <section id="about-us">
            <div class="container">
                <h2>About Us</h2>
                <p>
                    Our mission is to provide a reliable platform that empowers farmers by ensuring stable market access
                    and secure transactions. We believe that contract farming can revolutionize the agricultural
                    industry by
                    connecting farmers directly with buyers, reducing uncertainty, and fostering long-term, mutually
                    beneficial relationships.
                </p>
                <p>
                    Through our platform, farmers can focus on what they do best—growing crops—while we handle the
                    complexities of market access, contract negotiations, and secure payments. Our goal is to create a
                    transparent, efficient, and fair marketplace that benefits all stakeholders in the agricultural
                    value chain.
                </p>

                <h3>Our Vision</h3>
                <p>
                    We envision a world where farmers are empowered with technology that guarantees them a stable
                    income,
                    ensuring their livelihoods are secure. Our vision is to bring about a sustainable, tech-enabled
                    agricultural
                    ecosystem where farmers can thrive with guaranteed market access and secure contract farming
                    solutions.
                </p>

                <h3>Our Approach</h3>
                <p>
                    Our approach is simple yet innovative. We connect farmers and buyers through a digital marketplace
                    that
                    facilitates transparent negotiations, secure contracts, and timely payments. Our platform ensures
                    that
                    every transaction is recorded and traceable, giving confidence to both parties.
                </p>

                <h3>Why Choose Us?</h3>
                <ul>
                    <li> <span><i class="fa-solid fa-angles-right"></i></span> Guaranteed and stable market access for
                        farmers.</li>
                    <li><span><i class="fa-solid fa-angles-right"></i></span> Transparent and fair pricing through
                        contract negotiations.</li>
                    <li><span><i class="fa-solid fa-angles-right"></i></span> Timely and secure payment processing for
                        both parties.</li>
                    <li><span><i class="fa-solid fa-angles-right"></i></span> Comprehensive tracking of farming
                        contracts and product delivery.</li>
                    <li><span><i class="fa-solid fa-angles-right"></i></span> Support and guidance throughout the entire
                        farming season.</li>
                </ul>

                <h3>Our Impact</h3>
                <p>
                    Since our inception, we have helped thousands of farmers connect with reliable buyers, creating a
                    ripple
                    effect of positive change across rural communities. Our platform has reduced financial risk for
                    farmers,
                    increased transparency in transactions, and promoted sustainable agriculture.
                </p>
            </div>
        </section>


        <!-- about section ends here -->

        <!-- contact section starts here -->
        <section id="contact">
            <div class="container">
                <div class="contact-container">
                    <h2>Contact Us</h2>
                    <p>If you have any questions or need assistance, feel free to contact us using the form below.</p>

                    <!-- Display success or error messages -->
                    <?php if ($success): ?>
                        <p style="color:green;"><?php echo $success; ?></p>
                    <?php elseif ($error): ?>
                        <p style="color:red;"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <form id="contactForm" method="POST" action="">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>

                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>

                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Enter your message here..."
                            required></textarea>

                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- contact section ends here -->

        <!-- FAQ section starts here -->

        <section id="faqs">
            <div class="container">
                <div class="faq-container">
                    <h2>Frequently Asked Questions</h2>
                    <div class="accordion">
                        <div class="accordion-item">
                            <button class="accordion-header">What is contract farming?</button>
                            <div class="accordion-body">
                                <p>Contract farming involves an agreement between farmers and buyers to produce and
                                    supply
                                    agricultural products under predetermined agreements. It ensures a market for
                                    farmers
                                    and a supply for buyers.</p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-header">How do I create a contract?</button>
                            <div class="accordion-body">
                                <p>You can create a contract by logging into your account, navigating to the 'Contracts'
                                    section, and filling out the necessary details. Ensure that you review all terms
                                    before
                                    submitting the contract.</p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-header">What payment methods are accepted?</button>
                            <div class="accordion-body">
                                <p>We accept multiple payment methods including Credit Card, Debit Card, Bank Transfer,
                                    and
                                    UPI. Please choose the method that suits you best during the payment process.</p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-header">Can I cancel a contract?</button>
                            <div class="accordion-body">
                                <p>Contracts can be canceled before they are approved by both parties. Once approved,
                                    cancellation may involve penalties depending on the contract terms. Please review
                                    the
                                    contract details before proceeding.</p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-header">How does the contract farming system ensure fair pricing
                                for
                                farmers?</button>
                            <div class="accordion-body">
                                <p>The platform facilitates transparent price negotiation between farmers and buyers,
                                    allowing both parties to agree on a fair price before the contract is finalized.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ section ends here -->

    </main>

    <!-- main section ends here -->

    <!-- footer section starts here -->

    <footer>
        <div class="container-fluid">
            <p>© 2024 ContractFarm. All rights reserved.</p>
        </div>
    </footer>

    <!-- footer section ends here -->


    <script src="./assets/js/index.js"></script>
</body>

</html>