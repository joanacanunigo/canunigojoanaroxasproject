
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Student Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #1a1a1a;
      display: flex;
      min-height: 100vh;
    }
    .container {
      display: flex;
      width: 100%;
      min-height: 100vh;
    }
    .form-panel {
      flex: 1;
      background: #1a1a1a;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px 80px;
      color: white;
    }
    .form-content {
      max-width: 400px;
      width: 100%;
    }
    .form-title {
      font-size: 48px;
      font-weight: 600;
      margin-bottom: 10px;
      color: white;
    }
    .form-subtitle {
      font-size: 14px;
      color: #888;
      margin-bottom: 50px;
    }
    .alert-success {
      background: rgba(40, 167, 69, 0.2);
      border: 1px solid #28a745;
      color: #5dff7f;
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      margin-bottom: 1.5rem;
    }
    .alert-danger {
      background: rgba(220, 53, 69, 0.2);
      border: 1px solid #dc3545;
      color: #ff6b6b;
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      margin-bottom: 1.5rem;
    }
    .form-group {
      margin-bottom: 25px;
    }
    .form-label {
      display: block;
      font-size: 14px;
      color: #ccc;
      margin-bottom: 8px;
    }
    .form-input {
      width: 100%;
      padding: 15px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #444;
      outline: none;
      font-size: 15px;
      color: white;
      transition: border-color 0.3s ease;
    }
    .form-input:focus {
      border-bottom-color: #9b7df5;
    }
    .form-input::placeholder {
      color: #666;
    }
    .forgot-password {
      text-align: left;
      margin-top: 10px;
    }
    .forgot-password a {
      color: #888;
      text-decoration: none;
      font-size: 13px;
      transition: color 0.3s ease;
    }
    .forgot-password a:hover {
      color: #9b7df5;
    }
    .btn-submit {
      width: 100%;
      padding: 16px;
      background: #9b7df5;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      margin-top: 30px;
    }
    .btn-submit:hover {
      background: #8a6de0;
    }
    .signup-link {
      text-align: center;
      margin-top: 30px;
      font-size: 14px;
      color: #888;
    }
    .signup-link a {
      color: #9b7df5;
      text-decoration: none;
      font-weight: 600;
      margin-left: 5px;
    }
    .signup-link a:hover {
      text-decoration: underline;
    }
    .welcome-panel {
      flex: 1;
      background: linear-gradient(135deg, #9b7df5 0%, #7d5fd8 100%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px;
    }
    .welcome-content {
      text-align: center;
      max-width: 500px;
      color: white;
    }
    .welcome-title {
      font-size: 56px;
      font-weight: 700;
      margin-bottom: 10px;
      line-height: 1.2;
    }
    .welcome-subtitle {
      font-size: 18px;
      color: rgba(255,255,255,0.9);
      margin-bottom: 40px;
    }
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
      .welcome-panel {
        order: -1;
        min-height: 40vh;
      }
      .form-panel {
        padding: 40px 30px;
      }
      .form-title {
        font-size: 36px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Panel -->
    <div class="form-panel">
      <div class="form-content">
        <h1 class="form-title">Login</h1>
        <p class="form-subtitle">Enter your account details</p>

     
  <?php getErrors(); ?>
        <?php getMessage(); ?>

        <form method="POST" action="<?= site_url('login'); ?>">
          <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-input" required>
          </div>

          <div class="form-group">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-input" required>
          </div>

          <div class="forgot-password">
            <a href="#">Forgot Password?</a>
          </div>

          <button type="submit" class="btn-submit">Login</button>
        </form>

        <div class="signup-link">
          Don’t have an account?
          <a href="<?= site_url('register'); ?>">Sign up</a>
        </div>
      </div>
    </div>

    <!-- Right Panel -->
    <div class="welcome-panel">
      <div class="welcome-content">
        <h2 class="welcome-title">Welcome to<br>Student Portal</h2>
        <p class="welcome-subtitle">Login to access your account</p>
      </div>
    </div>
  </div>
    <script src="<?= BASE_URL; ?>/public/js/alert.js"></script>

</body>
</html>
