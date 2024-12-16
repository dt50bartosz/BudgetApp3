<?php 

$currenPath = $_SERVER['REQUEST_URI'];

$currenPath = $_SERVER['REQUEST_URI'];

if (strpos($currenPath, 'index') !== false) {
    $cssFile = 'mainPage.css';
} elseif (strpos($currenPath, 'addExpenses') !== false) {
    $cssFile = 'addExpensive.css';
} elseif (strpos($currenPath, 'addIncome') !== false) {
    $cssFile = 'addIncome.css';
} elseif (strpos($currenPath, 'balance') !== false) {
    $cssFile = 'balance.css';
} elseif (strpos($currenPath, 'settings') !== false) {
    $cssFile = 'settings.css';
} elseif (stripos($currenPath, 'login') !== false || stripos($currenPath, 'register') !== false) {
    $cssFile = 'auth.css'; 
} else {
    $cssFile = 'stylesheet.css'; 
}


$loggedIn = empty($_SESSION['user']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/<?php echo htmlspecialchars($cssFile, ENT_QUOTES, 'UTF-8'); ?>">

    <title>BudgetEase</title>
</head>
<body>
    <?php if ($loggedIn): ?>
        <header>
            <nav>
                <div class="navbar-logo">
                    <div class="navbar-logo-img">
                        <img src="/assets/img/bag.png" alt="bag full of money">
                    </div>
                    <div class="navbar-name">
                        <p>BudgetEase</p>
                    </div>
                </div>
                <button class="btn" id="navbar-login-btn">Login</button>
            </nav>
        </header>
    <?php else:?>
        <header>
            <div class="section-container">
                <nav class="top-navbar">
                    <div class="logo-img">
                        <div class="nav-img">
                            <img src="/assets/img/bag.png" alt="bag full of money">
                        </div>
                        <div class="nav-bar">
                            <p>BudgetEase</p>
                        </div>
                    </div>
                    <div class="menu-list">
                        <ul class="nav-bar-list">
                            <li class="main-menu-link"><a><span><i class="fa-solid fa-house"></i></span>Main Menu</a></li>
                            <li class="add-income-link"><a><span><i class="fa-solid fa-wallet"></i></span>Add Income</a></li>
                            <li class="settings-link"><a><span><i class="fa-solid fa-gear"></i></span>Settings</a></li>
                            <li class="balance-link"><a><span><i class="fa-solid fa-scale-balanced"></i></span>Balance</a></li>
                        </ul>
                    </div>
                    <div class="menu-compress">
                        <button id="open-navbar-menu"><i class="fa-solid fa-bars"></i></button>
                        <div class="menu-components slide-menu">
                            <button id="close-menu-drop"><i class="fa-solid fa-xmark"></i></button>
                            <ul class="drop-down">
                                <li class="main-menu-link"><a><span><i class="fa-solid fa-house"></i></span>Main Menu</a></li>
                                <li class="add-income-link"><a><span><i class="fa-solid fa-wallet"></i></span>Add Income</a></li>
                                <li class="settings-link"><a><span><i class="fa-solid fa-gear"></i></span>Settings</a></li>
                                <li class="balance-link"><a><span><i class="fa-solid fa-scale-balanced"></i></span>Balance</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="logout">
                        <form id="logout-user">
                            <button type="submit" class="btn" id="navbar-logout-btn">
                                <span id="span_logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</span>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </header>
    <?php endif; ?>
</body>
</html>