<?php
$firstName = current(explode(' ', $userInfo->name));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css" />
    <link rel="icon" href="<?=$base;?>/media/php.ico" type="image/x-icon"/>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
            </div>
            <div class="head-side">
                <div class="head-side-left">
                    <div class="search-area">
                        <form method="GET" action="<?=$base;?>/search.php">
                        <?php if(isset($searchTerm)): ?>
                            <input type="search" placeholder="<?=$searchTerm;?>" name="s" />
                        <?php else: ?>
                            <input type="search" placeholder="Search" name="s" />
                        <?php endif; ?>
                        </form>
                    </div>
                </div>
                <div class="head-side-right">
                    <a href="<?=$base;?>/profile.php" class="user-area">
                        <div class="user-area-text"><?=$firstName;?></div>
                        <div class="user-area-icon">
                            <img src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>" />
                        </div>
                    </a>
                    <a href="<?=$base;?>/logout.php" class="user-logout">
                        <img src="<?=$base;?>/assets/images/power_white.png" />
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="container main">