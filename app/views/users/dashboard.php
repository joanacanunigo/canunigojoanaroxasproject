<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --primary-purple: #8b5cf6;
      --dark-bg: #121212;
      --card-bg: #1e1e1e;
      --light-text: #f1f1f1;
      --muted-text: #bbb;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      background: var(--dark-bg);
      overflow-x: hidden;
      color: var(--light-text);
    }

    .dashboard-wrapper {
      display: flex;
      height: 100vh;
    }

    /* LEFT PANEL */
    .left-panel {
      flex: 1.1;
      background-color: var(--dark-bg);
      padding: 3rem 4rem;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
    }

    .left-panel h1 {
      font-weight: 700;
      margin-bottom: 0.5rem;
      font-size: 2rem;
      color: #fff;
    }

    .left-panel p {
      color: var(--muted-text);
      margin-bottom: 2rem;
    }

    .profile-box {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
    }

    .profile-picture {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 1rem;
      border: 3px solid var(--primary-purple);
    }

    .profile-picture img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .username {
      font-size: 1.2rem;
      font-weight: 600;
    }

    /* STAT CARDS */
    .stats-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .stats-card {
      background: var(--card-bg);
      border-radius: 15px;
      padding: 1.5rem;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .stats-card:hover {
      transform: translateY(-4px);
      background: #2a2a2a;
    }

    .stats-icon {
      font-size: 1.8rem;
      color: var(--primary-purple);
      margin-bottom: 0.5rem;
    }

    .stats-value {
      font-size: 1.3rem;
      font-weight: 600;
    }

    .stats-label {
      color: var(--muted-text);
      font-size: 0.9rem;
    }

    /* DETAILS */
    .detail-card {
      background: var(--card-bg);
      border-left: 4px solid var(--primary-purple);
      border-radius: 10px;
      padding: 1rem;
      margin-bottom: 1rem;
    }

    .detail-label {
      text-transform: uppercase;
      font-size: 0.75rem;
      color: var(--muted-text);
      margin-bottom: 0.3rem;
    }

    .detail-value {
      font-size: 1.1rem;
      font-weight: 600;
    }

    .logout-btn {
      background: var(--primary-purple);
      border: none;
      border-radius: 25px;
      padding: 0.7rem 1.5rem;
      color: white;
      font-weight: 600;
      align-self: flex-start;
      margin-top: 2rem;
      transition: all 0.3s ease;
    }

    .logout-btn:hover {
      background: #7c3aed;
      transform: translateY(-2px);
    }

    /* RIGHT PANEL */
    .right-panel {
      flex: 0.9;
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 2rem;
      background-image: url('https://images.unsplash.com/photo-1601597111255-3c7d9a9f77c3?auto=format&fit=crop&w=900&q=60');
      background-size: cover;
      background-position: center;
      position: relative;
    }

    .right-panel::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(139, 92, 246, 0.8);
    }

    .right-panel .content {
      position: relative;
      z-index: 2;
    }

    .right-panel h2 {
      font-size: 2.3rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .right-panel p {
      font-size: 1rem;
      opacity: 0.9;
      max-width: 400px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="dashboard-wrapper">
    <!-- LEFT PANEL -->
    <div class="left-panel">
      <h1>Welcome back, <?= ($user['first_name']) ?>!</h1>
      <p>Manage your profile and view your account insights.</p>

      <div class="profile-box">
        <div class="profile-picture">
          <?php if(!empty($user['profile_picture']) && file_exists($user['profile_picture'])): ?>
            <img src="<?= base_url() . $user['profile_picture']; ?>" alt="Profile Picture">
          <?php else: ?>
            <img src="https://via.placeholder.com/80x80.png?text=<?= strtoupper(substr($user['first_name'],0,1)) ?>" alt="Profile">
          <?php endif; ?>
        </div>
        <div>
          <div class="username"><?= ($user['first_name'].' '.$user['last_name']) ?></div>
          <small class="text-muted">@<?= ($user['username']) ?></small>
        </div>
      </div>

      <div class="stats-section">
        <div class="stats-card">
          <i class="bi bi-person-check stats-icon"></i>
          <div class="stats-value"><?= ($user['account_status'] ?? 'Active') ?></div>
          <div class="stats-label">Account Status</div>
        </div>
        <div class="stats-card">
          <i class="bi bi-calendar-check stats-icon"></i>
          <div class="stats-value"><?= date('F Y', strtotime($user['created_at'])) ?></div>
          <div class="stats-label">Member Since</div>
        </div>
        <div class="stats-card">
          <i class="bi bi-star-fill stats-icon"></i>
          <div class="stats-value"><?= ($user['account_type'] ?? 'Standard') ?></div>
          <div class="stats-label">Account Type</div>
        </div>
      </div>

      <div class="detail-card">
        <div class="detail-label">Email Address</div>
        <div class="detail-value"><?= ($user['email']) ?></div>
      </div>
      <div class="detail-card">
        <div class="detail-label">Username</div>
        <div class="detail-value"><?= ($user['username']) ?></div>
      </div>

      <button class="logout-btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
      </button>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
      <div class="content">
        <h2>Welcome to Student Portal</h2>
        <p>Track your progress, view updates, and manage your student profile from your personalized dashboard.</p>
      </div>
    </div>
  </div>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to logout?
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="<?= site_url('logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
