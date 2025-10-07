 !DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - User Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --purple-primary: #9b7df5;
      --purple-dark: #7d5fd8;
      --dark-bg: #1a1a1a;
      --dark-secondary: #2a2a2a;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: var(--dark-bg);
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    .main-container {
      min-height: 100vh;
      display: flex;
    }

    /* Form panel now on left with dark background */
    .form-panel {
      background: var(--dark-bg);
      color: white;
      overflow-y: auto;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 3rem 1.5rem;
    }

    .form-wrapper {
      width: 100%;
      max-width: 450px;
    }

    .form-title {
      font-size: 3rem;
      font-weight: 600;
      color: white;
      margin-bottom: 0.5rem;
    }

    .form-subtitle {
      color: #888;
      margin-bottom: 2.5rem;
    }

    /* Welcome panel now on right with purple gradient */
    .welcome-panel {
      background: linear-gradient(135deg, var(--purple-primary) 0%, var(--purple-dark) 100%);
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .welcome-panel::before {
      content: '';
      position: absolute;
      width: 150%;
      height: 150%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      top: -25%;
      left: -25%;
    }

    .welcome-content {
      position: relative;
      z-index: 1;
      text-align: center;
      color: white;
      padding: 3rem;
    }

    .welcome-title {
      font-size: 3.5rem;
      font-weight: 700;
      line-height: 1.2;
      margin-bottom: 1rem;
      text-transform: lowercase;
    }

    .welcome-subtitle {
      font-size: 1.125rem;
      opacity: 0.9;
      margin-bottom: 2.5rem;
      text-transform: capitalize;
    }

    .illustration {
      max-width: 450px;
      margin: 2rem auto 0;
    }

    /* Error Alert */
    .alert-danger {
      background: rgba(220, 53, 69, 0.2);
      border: 1px solid #dc3545;
      color: #ff6b6b;
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      margin-bottom: 1.5rem;
    }

    /* Loading Overlay */
    .loading-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      z-index: 9999;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .loading-overlay.active {
      display: flex;
    }

    .spinner {
      width: 50px;
      height: 50px;
      border: 4px solid rgba(155, 125, 245, 0.3);
      border-top-color: var(--purple-primary);
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .loading-text {
      color: white;
      margin-top: 1rem;
      font-size: 1.125rem;
    }

    /* Profile Upload */
    .profile-upload-section {
      text-align: center;
      margin-bottom: 2rem;
    }

    .profile-picture-wrapper {
      position: relative;
      width: 120px;
      height: 120px;
      margin: 0 auto;
    }

    .profile-preview {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 3px solid #444;
      overflow: hidden;
      background: var(--dark-secondary);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
    }

    .profile-preview:hover {
      border-color: var(--purple-primary);
      transform: scale(1.05);
    }

    .profile-preview img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: none;
    }

    .profile-preview.has-image img {
      display: block;
    }

    .profile-preview.has-image .upload-icon {
      display: none;
    }

    .upload-icon {
      font-size: 2.5rem;
      color: #666;
    }

    .upload-overlay {
      position: absolute;
      bottom: 0;
      right: 0;
      width: 35px;
      height: 35px;
      background: var(--purple-primary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      border: 3px solid var(--dark-bg);
    }

    .upload-overlay:hover {
      background: var(--purple-dark);
    }

    .upload-text {
      font-size: 0.875rem;
      color: #888;
      margin-top: 0.75rem;
    }

    /* Form Controls */
    .form-label {
      font-size: 0.8125rem;
      color: #ccc;
      margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
      background: transparent;
      border: none;
      border-bottom: 1px solid #444;
      border-radius: 0;
      color: white;
      padding: 0.75rem 0;
      transition: border-color 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
      background: transparent;
      border-color: var(--purple-primary);
      box-shadow: none;
      color: white;
    }

    .form-control::placeholder {
      color: #666;
    }

    .form-select {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23888' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 0.75rem center;
      padding-right: 2.5rem;
    }

    .form-select option {
      background: var(--dark-secondary);
      color: white;
    }

    /* Password Toggle */
    .password-wrapper {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 0.5rem;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #888;
      font-size: 1.125rem;
      background: none;
      border: none;
      padding: 0.25rem;
    }

    .toggle-password:hover {
      color: #ccc;
    }

    /* Submit Button */
    .btn-submit {
      background: var(--purple-primary);
      border: none;
      border-radius: 0.5rem;
      color: white;
      font-weight: 600;
      padding: 1rem;
      transition: all 0.3s ease;
    }

    .btn-submit:hover {
      background: var(--purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 5px 20px rgba(155, 125, 245, 0.4);
    }

    .btn-submit:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    /* Sign In Link */
    .signin-link {
      text-align: center;
      color: #888;
      font-size: 0.875rem;
    }

    .signin-link a {
      color: var(--purple-primary);
      text-decoration: none;
      font-weight: 600;
    }

    .signin-link a:hover {
      text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 991px) {
      .welcome-title {
        font-size: 2.5rem;
      }

      .form-title {
        font-size: 2.25rem;
      }
    }

    @media (max-width: 767px) {
      .welcome-panel {
        min-height: 40vh;
      }

      .welcome-title {
        font-size: 2rem;
      }

      .form-title {
        font-size: 2rem;
      }

      .illustration {
        max-width: 300px;
      }
    }
  </style>
</head>
<body>
  <!-- Loading Overlay -->
  <div class="loading-overlay" id="loadingOverlay">
    <div class="spinner"></div>
    <div class="loading-text">Creating your account...</div>
  </div>

  <div class="container-fluid main-container">
    <div class="row w-100 g-0">
      <!-- Left Panel - Registration Form (swapped from right) -->
      <div class="col-lg-6 form-panel">
        <div class="form-wrapper">
          <h1 class="form-title">Sign Up</h1>
          <p class="form-subtitle">Create your account</p>

          <?php if (isset($error_message)): ?>
            <div class="alert alert-danger">
              <?php echo htmlspecialchars($error_message); ?>
            </div>
          <?php endif; ?>
              <?php getErrors(); ?>
        <?php getMessage(); ?>
          <form method="POST" action="<?= site_url('/create-user'); ?>" enctype="multipart/form-data" id="signupForm">
            <!-- Profile Picture Upload -->
            <div class="profile-upload-section">
              <div class="profile-picture-wrapper">
                <div class="profile-preview" id="profilePreview" onclick="document.getElementById('profile_picture').click()">
                  <i class="bi bi-person-circle upload-icon"></i>
                  <img id="previewImage" src="/placeholder.svg" alt="Profile Preview">
                </div>
                <div class="upload-overlay" onclick="document.getElementById('profile_picture').click()">
                  <i class="bi bi-camera-fill" style="color: white;"></i>
                </div>
              </div>
              <div class="upload-text">Click to upload profile picture</div>
              <input type="file" id="profile_picture" name="profile_picture" accept="image/*" style="display: none;">
            </div>

            <!-- Name Fields -->
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
              </div>
            </div>

            <!-- Username -->
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" required pattern="[a-zA-Z0-9_]{3,20}" title="Username should be 3-20 characters and contain only letters, numbers, and underscores">
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="password-wrapper">
                <input type="password" name="password" id="password" class="form-control" required minlength="6">
                <button type="button" class="toggle-password" onclick="togglePassword('password', 'eyeIcon')">
                  <i class="bi bi-eye" id="eyeIcon"></i>
                </button>
              </div>
            </div>
            
            <!-- Confirm Password -->
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <div class="password-wrapper">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required minlength="6">
                <button type="button" class="toggle-password" onclick="togglePassword('confirm_password', 'eyeIconConfirm')">
                  <i class="bi bi-eye" id="eyeIconConfirm"></i>
                </button>
              </div>
            </div>

            <button type="submit" class="btn btn-submit w-100" id="submitBtn">Sign Up</button>
          </form>

          <div class="signin-link mt-4">
            Already have an account? <a href="<?= site_url('/'); ?>">Sign In</a>
          </div>
        </div>
      </div>

      <!-- Right Panel - Welcome Section (swapped from left) -->
      <div class="col-lg-6 welcome-panel">
        <div class="welcome-content">
          <h2 class="welcome-title">Welcome to<br>student portal</h2>
          <p class="welcome-subtitle">Login to access your account</p>

          <div class="illustration">
            <svg viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
              <!-- Document/Form -->
              <rect x="180" y="80" width="280" height="300" rx="15" fill="white" opacity="0.95"/>
              <line x1="220" y1="140" x2="420" y2="140" stroke="#e0e0e0" stroke-width="3"/>
              <line x1="220" y1="170" x2="420" y2="170" stroke="#e0e0e0" stroke-width="3"/>
              <line x1="220" y1="200" x2="380" y2="200" stroke="#e0e0e0" stroke-width="3"/>
              <line x1="220" y1="250" x2="420" y2="250" stroke="#e0e0e0" stroke-width="3"/>
              <line x1="220" y1="280" x2="420" y2="280" stroke="#e0e0e0" stroke-width="3"/>
              <line x1="220" y1="310" x2="350" y2="310" stroke="#e0e0e0" stroke-width="3"/>
              
              <!-- Smiley face on document -->
              <circle cx="280" cy="220" r="25" fill="#9b7df5"/>
              <circle cx="280" cy="212" r="10" fill="white"/>
              <path d="M 260 235 Q 280 245 300 235" fill="white" stroke="white" stroke-width="2"/>
              
              <!-- Person 1 (left side) -->
              <ellipse cx="100" cy="200" rx="20" ry="22" fill="white"/>
              <circle cx="100" cy="190" r="18" fill="#2c2c2c"/>
              <ellipse cx="100" cy="260" rx="35" ry="55" fill="white"/>
              <rect x="70" y="230" width="60" height="80" rx="30" fill="white"/>
              <rect x="65" y="305" width="30" height="15" rx="7" fill="#2c2c2c"/>
              <rect x="105" y="305" width="30" height="15" rx="7" fill="#2c2c2c"/>
              <rect x="85" y="240" width="22" height="35" rx="3" fill="#9b7df5"/>
              
              <!-- Person 2 (right side, sitting on document) -->
              <ellipse cx="420" cy="180" rx="20" ry="22" fill="white"/>
              <circle cx="420" cy="170" r="18" fill="#2c2c2c"/>
              <ellipse cx="420" cy="240" rx="35" ry="45" fill="white"/>
              <path d="M 385 230 Q 385 280 420 290 Q 455 280 455 230 Z" fill="white"/>
              <rect x="395" y="285" width="25" height="15" rx="7" fill="#2c2c2c"/>
              <rect x="430" y="285" width="25" height="15" rx="7" fill="#2c2c2c"/>
              <rect x="400" y="200" width="50" height="35" rx="2" fill="#2c2c2c"/>
              <rect x="395" y="235" width="60" height="3" fill="#2c2c2c"/>
              
              <!-- Decorative leaves -->
              <ellipse cx="460" cy="360" rx="30" ry="40" fill="#2c2c2c" opacity="0.8"/>
              <ellipse cx="445" cy="345" rx="25" ry="35" fill="#2c2c2c" opacity="0.6"/>
              <ellipse cx="30" cy="320" rx="25" ry="35" fill="white" opacity="0.3"/>
              <ellipse cx="45" cy="305" rx="20" ry="30" fill="white" opacity="0.2"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Toggle password visibility
    function togglePassword(inputId, iconId) {
      const passwordInput = document.getElementById(inputId);
      const eyeIcon = document.getElementById(iconId);
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('bi-eye');
        eyeIcon.classList.add('bi-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('bi-eye-slash');
        eyeIcon.classList.add('bi-eye');
      }
    }

    // Profile picture preview
    document.getElementById('profile_picture').addEventListener('change', function(e) {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const preview = document.getElementById('profilePreview');
          const img = document.getElementById('previewImage');
          img.src = e.target.result;
          preview.classList.add('has-image');
        };
        reader.readAsDataURL(file);
      }
    });

    // Show loading overlay on form submit
    document.getElementById('signupForm').addEventListener('submit', function() {
      document.getElementById('loadingOverlay').classList.add('active');
      document.getElementById('submitBtn').disabled = true;
    });

    // Password match validation
    document.getElementById('signupForm').addEventListener('submit', function(e) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm_password').value;
      
      if (password !== confirmPassword) {
        e.preventDefault();
        alert('Passwords do not match!');
        document.getElementById('loadingOverlay').classList.remove('active');
        document.getElementById('submitBtn').disabled = false;
      }
    });
  </script>
</body>
</html>
