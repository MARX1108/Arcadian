<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <!-- fix Chrome device emulator -->
    <title>Arcadian</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/<?=$stylesheet?>" />

    <script src="<?= BASE_URL ?>/public/js/jquery.js"></script>
    <script src="<?= BASE_URL ?>/public/js/topnews.js"></script>
</head>
<body>
    <!-- header-->
    <div id="header">
        <h1>Arc<a id = "logo" >a</a>dian</h1>
        <ul id="primary-nav">
            <li>
                <a href="<?= BASE_URL ?>/home" id = "<?=$all_state?>"  class = "current_nav">All</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/discover" id = "<?=$discover_state?>">Discover</a></li>
            <li>
                <a href="<?= BASE_URL ?>/profile/timeline" id = "<?=$profile_state?>">Profile</a></li>
        </ul>
        <form id="search-bar">
            <input type="text" placeholder=" Search Something" />
            <button>Search</button>
        </form>
    </div>