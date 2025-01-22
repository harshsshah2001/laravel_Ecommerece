<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Sidebar</title>
    <link rel="stylesheet" href="styles.css">

   <style>

body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    display: flex;
    height: 100vh;
    background: linear-gradient(135deg, #f5f6fa, #e0e7ff);
}

/* Sidebar Styles */
.sidebar {
    width: 280px;
    background: linear-gradient(135deg, #4c4cff, #6a6aff);
    box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
    padding: 20px 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 20px 0 0 20px;
    color: #fff;
}

/* Logo Section */
.logo {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 40px;
}

.logo img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 2px solid #fff;
}

.logo h2 {
    font-size: 1.8rem;
    font-weight: bold;
    letter-spacing: 1px;
}

/* Navigation Styles */
.nav-list {
    list-style: none;
    padding: 0;
    width: 100%;
}

.nav-list li {
    margin: 15px 0;
}

.nav-list a {
    text-decoration: none;
    color: #e0e7ff;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
}

.nav-list a:hover,
.nav-list a.active {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
}

/* Icons */
.icon {
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .sidebar {
        width: 220px;
    }

    .logo h2 {
        font-size: 1.5rem;
    }

    .nav-list a {
        font-size: 1rem;
    }
}
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="https://via.placeholder.com/40" alt="Horizon Logo">
            <h2>HORIZON</h2>
        </div>
        <ul class="nav-list">
            <li><a href="#" class="active"><i class="icon">🏠</i><span>Dashboard</span></a></li>
            <li><a href="{{route('show_data')}}"><i class="icon">🛒</i><span>Show All Data</span></a></li>
            <li><a href="{{route('thumbbail')}}"><i class="icon">📊</i><span>Thumbail</span></a></li>
            <li><a href="#"><i class="icon">📋</i><span>HJKL</span></a></li>
            <li><a href="#"><i class="icon">👤</i><span>ASDF</span></a></li>
            <li><a href="#"><i class="icon">🔒</i><span>Sign In</span></a></li>
            <li><a href="#"><i class="icon">➕</i><span>Sign Up</span></a></li>
        </ul>
    </div>
</body>
</html>
