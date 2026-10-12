<?php
$success_msg = "";
$error_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to      = "info@nasmataljabal.com";
    $subject = "پەیامەکا نوو ژ ماڵپەڕی - Nasmat Aljabal Factory";
    
    $body    = "ناڤ: $name\n";
    $body   .= "ئیمێل: $email\n\n";
    $body   .= "پەیام:\n$message";
    
    $headers = "From: " . $email;

    // ل سەر هۆستینگێ ڕاستەقینە دێ ئیمێل ڕاستەوخۆ ڤرێکەت
    if (mail($to, $subject, $body, $headers)) {
        $success_msg = "پەیاما تە ب سەرکەفتیانە بۆ info@nasmataljabal.com هاتە ڤرێکرن!";
    } else {
        // بۆ تێستێ ل سەر Localhost ئەڤ پەیامە دەرکەت ژی کارێ خۆ دکەت
        $success_msg = "پەیاما تە هاتە وەرگرتن (ل سەر سێرڤەرا لۆکەل دڤێت هۆستینگ هه‌بیت بۆ ڤرێکرنا ڕاستەقینە).";
    }
}
?>
<!DOCTYPE html>
<html lang="ku" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasmat Aljabal Factory - Premium Food Products</title>
    <style>
        :root {
            --bg-dark: #0d0d0d;
            --card-bg: #161616;
            --gold: #d4af37;
            --gold-hover: #f1c40f;
            --text-light: #ffffff;
            --text-gray: #b0b0b0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--bg-dark);
            color: var(--text-light);
            scroll-behavior: smooth;
        }

        /* Header & Navigation */
        header {
            background-color: var(--card-bg);
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #222;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .logo-area h1 {
            color: var(--gold);
            font-size: 1.3rem;
            margin: 0;
            letter-spacing: 1px;
        }
        .nav-links {
            display: flex;
            gap: 25px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-links a {
            color: var(--text-light);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--gold);
        }
        .btn-get-in-touch {
            background-color: var(--gold);
            color: #000;
            padding: 8px 18px;
            border-radius: 30px;
            font-weight: bold;
            text-decoration: none;
            font-size: 0.85rem;
            transition: background 0.3s;
        }
        .btn-get-in-touch:hover {
            background-color: var(--gold-hover);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url('https://via.placeholder.com/1920x800?text=Luxury+Food') no-repeat center center/cover;
            padding: 90px 50px;
            border-bottom: 2px solid var(--gold);
        }
        .hero-content {
            max-width: 600px;
        }
        .hero h4 {
            color: var(--gold);
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.85rem;
            margin-bottom: 10px;
        }
        .hero h2 {
            font-size: 3.2rem;
            margin: 0 0 20px 0;
            line-height: 1.1;
        }
        .hero p {
            color: var(--text-gray);
            font-size: 1.05rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .btn-explore {
            background-color: var(--gold);
            color: #000;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }
        .hero-features {
            display: flex;
            gap: 30px;
            margin-top: 40px;
            font-size: 0.85rem;
            color: #ddd;
        }

        /* About Section */
        .about-section {
            background-color: #f7f7f7;
            color: #222;
            padding: 70px 50px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }
        .about-img img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .about-text h2 {
            font-size: 2.3rem;
            margin-top: 0;
            color: #111;
        }
        .about-text p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 20px;
        }
        .mission-vision {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .mv-item h4 {
            margin: 0 0 3px 0;
            color: #000;
        }
        .mv-item p {
            margin: 0;
            font-size: 0.85rem;
            color: #666;
        }

        /* Products Section */
        .products-section {
            background-color: var(--bg-dark);
            padding: 70px 50px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }
        .section-header h2 {
            font-size: 2.2rem;
            margin: 0;
            color: var(--text-light);
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }
        .product-card {
            background: var(--card-bg);
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #222;
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            border-color: var(--gold);
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .product-info h3 {
            margin: 0;
            font-size: 1rem;
            color: var(--text-light);
        }
        .arrow-icon {
            color: var(--gold);
            font-weight: bold;
        }

        /* Contact Section & Form */
        .contact-section {
            background-color: #121212;
            padding: 70px 50px;
            border-top: 1px solid #222;
            text-align: center;
        }
        .contact-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .contact-section h2 {
            color: var(--gold);
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        .contact-section p {
            color: var(--text-gray);
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            text-align: left;
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            background: #1c1c1c;
            border: 1px solid #333;
            color: #fff;
            border-radius: 6px;
            font-size: 0.95rem;
        }
        input:focus, textarea:focus {
            border-color: var(--gold);
            outline: none;
        }
        label {
            color: var(--gold);
            font-size: 0.85rem;
            display: block;
            margin-bottom: 5px;
        }
        .btn-submit {
            background: var(--gold);
            color: #000;
            padding: 12px;
            border: none;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: 0.3s;
        }
        .btn-submit:hover {
            background: var(--gold-hover);
        }

        /* Footer */
        footer {
            background-color: #080808;
            padding: 40px 50px;
            border-top: 1px solid #222;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 30px;
            align-items: center;
        }
        .footer-logo h2 {
            color: var(--gold);
            margin: 0 0 8px 0;
            font-size: 1.2rem;
        }
        .footer-info p {
            margin: 4px 0;
            color: var(--text-gray);
            font-size: 0.85rem;
        }
        .social-icons {
            display: flex;
            gap: 12px;
        }
        .social-icons a {
            background: var(--card-bg);
            color: var(--gold);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #333;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo-area">
            <h1>🌾 NASMAT ALJABAL</h1>
        </div>
        <ul class="nav-links">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#products">Our Products</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a href="#contact" class="btn-get-in-touch">Get in Touch →</a>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h4>PREMIUM FOOD PRODUCTS</h4>
            <h2>Good Food<br>Better Life</h2>
            <p>At Nasmat Aljabal Factory, we are committed to providing high-quality food products made with care, trust and the best ingredients.</p>
            <a href="#products" class="btn-explore">Explore Our Products →</a>
            
            <div class="hero-features">
                <span>✔ High Quality</span>
                <span>🛡 Safe & Hygienic</span>
                <span>✨ Natural Taste</span>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-section">
        <div class="about-img">
            <img src="https://via.placeholder.com/600x400?text=Nasmat+Aljabal+Factory" alt="Factory">
        </div>
        <div class="about-text">
            <h2>About Us</h2>
            <p>Nasmat Aljabal Factory is a leading enterprise in the food industry, specializing in the production and distribution of high-quality products. We believe in delivering excellence through innovation and strict quality control.</p>

            <div class="mission-vision">
                <div class="mv-item">
                    <h4>Our Mission</h4>
                    <p>To provide healthy and high-quality food products to our customers.</p>
                </div>
                <div class="mv-item">
                    <h4>Our Vision</h4>
                    <p>To be a trusted name in the food industry locally and globally.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="section-header">
            <h2>Our Products</h2>
        </div>

        <div class="products-grid">
            <?php
            $products = [
                ["name" => "Pasta", "img" => "https://via.placeholder.com/250x150?text=Pasta"],
                ["name" => "Olive Oil", "img" => "https://via.placeholder.com/250x150?text=Olive+Oil"],
                ["name" => "Grains", "img" => "https://via.placeholder.com/250x150?text=Grains"],
                ["name" => "Canned Food", "img" => "https://via.placeholder.com/250x150?text=Canned+Food"],
                ["name" => "Spices", "img" => "https://via.placeholder.com/250x150?text=Spices"]
            ];

            foreach ($products as $p) {
                echo '
                <div class="product-card">
                    <img src="' . $p['img'] . '" alt="' . $p['name'] . '">
                    <div class="product-info">
                        <h3>' . $p['name'] . '</h3>
                        <span class="arrow-icon">→</span>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </section>

    <!-- Contact Section with Form -->
    <section id="contact" class="contact-section">
        <div class="contact-container">
            <h2>Get in Touch</h2>
            <p>Send a message directly to <strong>info@nasmataljabal.com</strong></p>

            <?php if (!empty($success_msg)): ?>
                <p style="background: #1e3a2f; color: #2ecc71; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-weight: bold;"><?php echo $success_msg; ?></p>
            <?php endif; ?>

            <form action="#contact" method="POST">
                <div>
                    <label>Your Name:</label>
                    <input type="text" name="name" required placeholder="Enter your name">
                </div>
                <div>
                    <label>Your Email:</label>
                    <input type="email" name="email" required placeholder="name@example.com">
                </div>
                <div>
                    <label>Your Message:</label>
                    <textarea name="message" rows="4" required placeholder="Type your message here..."></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message ✉️</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-logo">
            <h2>🌾 NASMAT ALJABAL FACTORY</h2>
            <p style="color: var(--text-gray); font-size: 0.85rem;">All Rights Reserved &copy; <?php echo date('Y'); ?></p>
        </div>
        <div class="footer-info">
            <p>📍 Iraq (Factory Location)</p>
            <p>📞 +964 750 123 4567</p>
            <p>✉️ info@nasmataljabal.com</p>
        </div>
        <div class="social-icons">
            <a href="#">f</a>
            <a href="#">in</a>
            <a href="#">ig</a>
            <a href="#">yt</a>
        </div>
    </footer>

</body>
</html>
