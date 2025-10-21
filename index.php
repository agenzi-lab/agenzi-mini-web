<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'beranda';

include 'includes/header.php';

switch ($page) {
    case 'tentang':
        include 'pages/tentang.php';
        break;
    case 'user':
        include 'pages/list-user.php';
        break;
    default:
        include 'pages/beranda.php';
        break;
}

include 'includes/footer.php';
