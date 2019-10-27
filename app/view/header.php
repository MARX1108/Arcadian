<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <!-- fix Chrome device emulator -->
    <title>Arcadian</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
    <script src="<?= BASE_URL ?>/public/js/jquery.js"></script>
    <script src="<?= BASE_URL ?>/public/js/topnews.js"></script>
</head>
<body>
    <!-- header-->
    <div id="header">
        <h1>Arc<a style="color: rgb(143, 158, 255);">a</a>dian</h1>
        <ul id="primary-nav">
            <li>
                <a href="./all.html" style="color: rgb(86, 106, 236); font-family: JosefinSans-Bold">All</a>
            </li>
            <li><a href="./discover.html">Discover</a></li>
            <li><a href="./profile_following.html">Profile</a></li>
        </ul>
        <form id="search-bar">
            <input type="text" placeholder=" Search Something" />
            <button>Search</button>
        </form>
    </div>