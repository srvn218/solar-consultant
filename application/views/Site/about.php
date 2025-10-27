<!-- Section 3: About with Map/Graphic -->
<div class="about-hero-section">
  <div class="about-hero-container">
    <div class="about-content">
      <div class="about-badge fade-in-up">About Us</div>
      <h2 class="about-title animate-typing">Eco-Friendly Solar Solutions for India</h2>
      <div class="about-description">
        <p class="fade-in-delay-1">Aswin Solar Consultant is a leader in solar consulting and project execution, enabling industries, communities, and businesses to move towards clean energy.</p>
        <p class="fade-in-delay-2">Our platform empowers clients to collaborate with experts and realize turnkey renewable installations—helping make solar affordable and accessible across India.</p>
        <p class="fade-in-delay-3"><b>Since 2015</b>, we have completed over 500 solar projects, delivering reliable green energy and supporting sustainability initiatives across the country.</p>
      </div>
      <a href="#" class="cta-button glow-on-hover">
        <span>Download Brochure</span>
        <span class="btn-icon">📥</span>
      </a>
    </div>
    <div class="about-graphic slide-in-right">
      <div class="map-container">
        <img src="https://i.ibb.co/tpqtpyQ/india-map-markers.png" alt="India Map with Solar Projects" class="map-image">
        <div class="floating-stats">
          <div class="stat-bubble bounce-in">
            <span class="stat-number">500+</span>
            <span class="stat-label">Projects</span>
          </div>
          <div class="stat-bubble bounce-in" style="animation-delay: 0.2s;">
            <span class="stat-number">2015</span>
            <span class="stat-label">Established</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section 1: Vision & Mission -->
<div class="vision-mission-section">
  <div class="vm-container">
    <div class="vm-grid">
      <div class="vm-card slide-in-left">
        <div class="vm-icon">🎯</div>
        <h3 class="vm-title">Vision</h3>
        <p class="vm-description">To be a leader in affordable, sustainable solar solutions for the nation, driving India's transition to clean energy.</p>
        <div class="vm-highlights">
          <div class="vm-highlight-item">
            <span class="highlight-icon">☀️</span>
            <span>Clean Energy Leadership</span>
          </div>
          <div class="vm-highlight-item">
            <span class="highlight-icon">🏠</span>
            <span>Nationwide Impact</span>
          </div>
        </div>
      </div>
      
      <div class="vm-card slide-in-right">
        <div class="vm-icon">🚀</div>
        <h3 class="vm-title">Mission</h3>
        <p class="vm-description">Deliver reliable, high-efficiency solar products and services to homes and businesses, championing a greener India.</p>
        <div class="vm-highlights">
          <div class="vm-highlight-item">
            <span class="highlight-icon">⚡</span>
            <span>High-Efficiency Solutions</span>
          </div>
          <div class="vm-highlight-item">
            <span class="highlight-icon">🌱</span>
            <span>Green Technology</span>
          </div>
        </div>
      </div>
    </div>
    
    <div class="core-values-section fade-in-up">
      <div class="values-header">
        <h2 class="values-title">Core Values</h2>
        <p class="values-subtitle">Our guiding principles for everything we do</p>
      </div>
      <div class="values-grid">
        <div class="value-item card-hover">
          <div class="value-icon">❤️</div>
          <h4>Customer-First</h4>
          <p>Putting our clients at the heart of every decision</p>
        </div>
        <div class="value-item card-hover">
          <div class="value-icon">🛡️</div>
          <h4>Accountability</h4>
          <p>Taking ownership and delivering on promises</p>
        </div>
        <div class="value-item card-hover">
          <div class="value-icon">🤝</div>
          <h4>Value Team Work</h4>
          <p>Collaborating for greater impact and success</p>
        </div>
        <div class="value-item card-hover">
          <div class="value-icon">⭐</div>
          <h4>Integrity</h4>
          <p>Operating with honesty and transparency</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section 2: Team Section -->
<div class="team-section">
  <!-- Our Leadership Team -->
  <div class="leadership-team">
    <div class="section-header">
      <h2 class="section-title animate-typing">Our Leadership Team</h2>
      <div class="title-underline"></div>
      <p class="section-subtitle">Experienced professionals driving our solar revolution</p>
    </div>
    <div class="team-grid">
      <?php foreach($lead_team as $member): ?>
        <div class="team-card card-hover">
          <div class="member-image">
            <?php if(!empty($member['image'])): ?>
              <img src="<?= base_url($member['image']) ?>" alt="<?= htmlspecialchars($member['name']) ?>">
            <?php else: ?>
              <div class="default-avatar">
                <span class="avatar-icon">👤</span>
              </div>
            <?php endif; ?>
            <div class="image-overlay"></div>
          </div>
          <div class="member-info">
            <h3 class="member-name"><?= htmlspecialchars($member['name']) ?></h3>
            <p class="member-qualification"><?= htmlspecialchars($member['qualification']) ?></p>
            <div class="member-age">Age: <?= htmlspecialchars($member['age']) ?></div>
            <div class="member-experience">
              <span class="experience-badge">Solar Expert</span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Key Workers -->
  <div class="key-workers-section">
    <div class="section-header">
      <h3 class="section-title">Key Workers</h3>
      <div class="title-underline orange"></div>
      <p class="section-subtitle">Dedicated professionals ensuring project excellence</p>
    </div>
    <div class="workers-grid">
      <?php foreach($key_workers as $member): ?>
        <div class="worker-card card-hover">
          <div class="worker-image">
            <?php if(!empty($member['image'])): ?>
              <img src="<?= base_url($member['image']) ?>" alt="<?= htmlspecialchars($member['name']) ?>">
            <?php else: ?>
              <div class="default-avatar small">
                <span class="avatar-icon">👷</span>
              </div>
            <?php endif; ?>
          </div>
          <div class="worker-info">
            <h4 class="worker-name"><?= htmlspecialchars($member['name']) ?></h4>
            <p class="worker-qualification"><?= htmlspecialchars($member['qualification']) ?></p>
            <div class="worker-age">Age: <?= htmlspecialchars($member['age']) ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

