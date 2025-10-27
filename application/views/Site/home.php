<!-- HERO SECTION WITH ANIMATIONS -->
<div class="home-hero-bg">
  <div class="home-hero-container">
    <div class="hero-caption">
      <div class="hero-text animate-fade-in">
         <?php if ($this->session->flashdata('success')): ?>
        <div class="success-message animate-bounce-in">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
        <h1>
          <span class="highlight pulse-animation">Switch to solar</span> in YourCity,<br>at <span class="zero-investment">Zero Investment!</span>
        </h1>
        <p class="slide-in-left">
          Government subsidy covers your down payment, and monthly solar savings cover your EMIs.<br>
          <span class="sub-text">Let us power your home affordably and sustainably.</span>
        </p>
        <div class="hero-benefits">
          <div class="benefit-item fade-in-delay-1">
            <span class="benefit-icon">⚡</span>
            <span>Save up to 90% on electricity bills</span>
          </div>
          <div class="benefit-item fade-in-delay-2">
            <span class="benefit-icon">🛡️</span>
            <span>25-year performance warranty</span>
          </div>
          <div class="benefit-item fade-in-delay-3">
            <span class="benefit-icon">🏛️</span>
            <span>Government subsidies available</span>
          </div>
        </div>
      </div>
      <div class="hero-img float-animation">
        <img src="<?=base_url('assets/img/solar-energy-6013572_1920.png')?>" alt="Solar Team" style="width:100%;display:block;border-radius:21px;">
      </div>
    </div>
    
    <form class="hero-form slide-in-right" method="post" action="<?=site_url('site/save_quote')?>">
      <h3>Book a FREE Solar Consultation</h3>
      <p class="form-subtitle">Get expert advice and a custom quote</p>
      
      <div class="form-group">
        <label>Full name *</label>
        <input type="text" name="full_name" required placeholder="Enter your full name">
      </div>
      
      <div class="form-group">
        <label>WhatsApp number *</label>
        <input type="text" name="whatsapp" required placeholder="Enter your WhatsApp number">
      </div>
      
      <div class="form-group">
        <label>Pin code *</label>
        <input type="text" name="pincode" required placeholder="Enter your area pin code">
      </div>
      
      <div class="form-group">
        <label>What is your average monthly bill?</label>
        <input type="hidden" name="avg_monthly_bill" id="avg_monthly_bill" required>
        <div class="bill-choices">
          <button type="button" class="bill-btn" onclick="setBill('Less than ₹1500')">Less than ₹1500</button>
          <button type="button" class="bill-btn" onclick="setBill('₹1500 - ₹2500')">₹1500 - ₹2500</button>
          <button type="button" class="bill-btn" onclick="setBill('₹2500 - ₹4000')">₹2500 - ₹4000</button>
          <button type="button" class="bill-btn" onclick="setBill('₹4000 - ₹8000')">₹4000 - ₹8000</button>
          <button type="button" class="bill-btn" onclick="setBill('More than ₹8000')">More than ₹8000</button>
        </div>
      </div>
      
      <div class="form-group checkbox-group">
        <input type="checkbox" id="terms" required>
        <label for="terms">I agree to the terms & privacy policy</label>
      </div>
      
      <button type="submit" class="submit-btn glow-on-hover">
        <span>Get a FREE Quote</span>
        <span class="btn-arrow">→</span>
      </button>
      
      <div class="form-footer">
        <p>✅ No hidden costs</p>
        <p>✅ 100% satisfaction guaranteed</p>
      </div>
    </form>

    <script>
    function setBill(val) {
        document.getElementById('avg_monthly_bill').value = val;
        var btns = document.querySelectorAll('.bill-btn');
        btns.forEach(b => b.classList.remove('selected'));
        event.target.classList.add('selected');
        
        // Add click animation
        event.target.style.transform = 'scale(0.95)';
        setTimeout(() => {
            event.target.style.transform = 'scale(1)';
        }, 150);
    }
    </script>

   
  </div>
</div>

<!-- OUR SOLAR SOLUTIONS SECTION WITH HOVER EFFECTS -->
<div class="solutions-section">
  <div class="solutions-container">
    <div class="solutions-header">
      <h2 class="section-title animate-typing">Our Solar Solutions</h2>
      <p class="section-subtitle fade-in-up">Comprehensive solar energy solutions for every need</p>
    </div>
    <div class="solutions-grid">
      <div class="solution-card card-hover">
        <div class="card-icon rotate-on-hover">
          <img src="https://img.icons8.com/ios-filled/50/67c167/home.png" alt="Residential Solar">
        </div>
        <div class="card-content">
          <h3>Residential Solar</h3>
          <p>Power your home with clean energy and save on utility costs.</p>
          
        </div>
      </div>
      
      <div class="solution-card card-hover">
        <div class="card-icon rotate-on-hover">
          <img src="https://img.icons8.com/ios-filled/50/67c167/factory.png" alt="Commercial Solar">
        </div>
        <div class="card-content">
          <h3>Commercial Solar</h3>
          <p>Optimize energy efficiency and reduce operational expenses.</p>
          
        </div>
      </div>
      
      <div class="solution-card card-hover">
        <div class="card-icon rotate-on-hover">
          <img src="https://img.icons8.com/ios-filled/50/67c167/battery.png" alt="Solar Battery">
        </div>
        <div class="card-content">
          <h3>Solar Battery Storage</h3>
          <p>Store energy for uninterrupted power supply.</p>
          
        </div>
      </div>
      
      <div class="solution-card card-hover">
        <div class="card-icon rotate-on-hover">
          <img src="https://img.icons8.com/ios-filled/50/67c167/leaf.png" alt="EV Charging">
        </div>
        <div class="card-content">
          <h3>EV Charging Stations</h3>
          <p>Smart solutions for electric vehicle owners.</p>
        
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 3 EASY STEPS SECTION WITH ANIMATIONS -->
<div class="steps-section">
  <div class="steps-container">
    <div class="steps-content">
      <div class="steps-header">
        <h2 class="animate-slide-in-left">
          <span class="highlight-blue">Switching To Solar</span><br>In 3 Easy Steps
        </h2>
      </div>
      <div class="steps-list">
        <div class="step-item fade-in-stagger">
          <div class="step-number pulse-animation">01</div>
          <div class="step-content">
            <h4>Consultation</h4>
            <p>Get a free energy audit and custom solar solution.</p>
          </div>
        </div>
        <div class="step-item fade-in-stagger" style="animation-delay: 0.2s;">
          <div class="step-number pulse-animation" style="animation-delay: 1.2s;">02</div>
          <div class="step-content">
            <h4>Installation</h4>
            <p>Our expert team ensures a smooth and quick installation.</p>
          </div>
        </div>
        <div class="step-item fade-in-stagger" style="animation-delay: 0.4s;">
          <div class="step-number pulse-animation" style="animation-delay: 1.4s;">03</div>
          <div class="step-content">
            <h4>Savings Begin</h4>
            <p>Enjoy reduced energy bills and sustainable living.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="steps-images">
      <div class="main-image float-animation">
        <img src="<?=base_url('assets/img/Gemini_Generated_Image_jsnxikjsnxikjsnx.png')?>" alt="Main work image">
      </div>
      <div class="side-images">
        <div class="side-image slide-in-right-delay">
          <img src="<?=base_url('assets/img/Gemini_Generated_Image_8495rz8495rz8495.png')?>" alt="Gallery image 1">
        </div>
        <div class="side-image slide-in-right-delay" style="animation-delay: 0.3s;">
          <img src="<?=base_url('assets/img/photovoltaic-8156008_1920.jpg')?>" alt="Gallery image 2">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ABOUT COMPANY SECTION WITH ENHANCED ANIMATIONS -->
<div class="about-section-enhanced">
  <div class="about-container">
    <div class="about-image">
      <img src="<?=base_url('assets/img/electricity-1298849_1280.png')?>" alt="Solar Company" class="zoom-on-hover">
      <div class="floating-stats">
        <div class="stat-item bounce-in">
          <span class="stat-number">548+</span>
          <span class="stat-label">Installed Capacity</span>
        </div>
        <div class="stat-item bounce-in" style="animation-delay: 0.2s;">
          <span class="stat-number">674+</span>
          <span class="stat-label">Global Customers</span>
        </div>
      </div>
    </div>
    <div class="about-content">
      <div class="about-header">
        <span class="section-badge slide-in-left">About Us</span>
        <h2>About Aswin Solar Consultant</h2>
        <p class="fade-in-up">
          We are a leading provider of clean solar energy solutions for homes, industry, and agriculture.<br>
          Our expert team ensures every project is delivered with top quality, warranty, and support.
        </p>
      </div>
      <div class="about-features">
        <div class="feature-item slide-in-left">
          <span class="feature-icon">✓</span>
          <span>600+ Successful Installations</span>
        </div>
        <div class="feature-item slide-in-left" style="animation-delay: 0.1s;">
          <span class="feature-icon">✓</span>
          <span>Top-Notch Warranty & Support</span>
        </div>
        <div class="feature-item slide-in-left" style="animation-delay: 0.2s;">
          <span class="feature-icon">✓</span>
          <span>Highly Skilled Professional Team</span>
        </div>
      </div>
      <a href="about" class="cta-button glow-on-hover">
        Read More About Us
        <span class="btn-sparkle">✨</span>
      </a>
      <div class="stats-grid">
        <div class="stat-card hover-lift">
          <span class="stat-value">548+</span>
          <span class="stat-title">Installed Capacity</span>
        </div>
        <div class="stat-card hover-lift">
          <span class="stat-value">674+</span>
          <span class="stat-title">Global Customers</span>
        </div>
        <div class="stat-card hover-lift">
          <span class="stat-value">Domestic</span>
          <span class="stat-title">Installation</span>
        </div>
        <div class="stat-card hover-lift">
          <span class="stat-value">Commercial</span>
          <span class="stat-title">Installation</span>
        </div>
      </div>
    </div>
  </div>
</div>
