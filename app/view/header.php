<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- fix Chrome device emulator -->
    <title>Arcadian</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/<?=$stylesheet?>" />

    <script src="<?= BASE_URL ?>/public/js/jquery.js"></script>
    <script src="<?= BASE_URL ?>/public/js/topnews.js"></script>

    <!-- Credit to Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- header-->
    <div id="header">
        <h1>Arc<a id="logo">a</a>dian</h1>
        <ul id="primary-nav">
            <li>
                <a href="<?= BASE_URL ?>/home" id="<?=$all_state?>" class="current_nav">All</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/discover" id="<?=$discover_state?>">Discover</a></li>
            <li>
                <a href="<?= BASE_URL ?>/profile/timeline" id="<?=$profile_state?>">Profile</a></li>
        </ul>
        <form id="search-bar">
            <input type="text" placeholder=" Search Something" />
            <button>Search</button>
        </form>
    </div>