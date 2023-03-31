<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';


$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'settings';

$userDao = new UserDaoMysql($pdo);


require 'partials/header.php';
require 'partials/menu.php';
?>

<section class="feed mt-10">
    
    <h1>Settings</h1>

             <?php 
            if(!empty($_SESSION['flash'])) {
                echo $_SESSION['flash'];
                $_SESSION['flash'] = '';
            }
            ?>

    <form method="POST" class="config-form" enctype="multipart/form-data" action="settings_action.php">

        <img class="mini" src="<?=$base;?>/media/avatars/<?=$userInfo->avatar;?>" alt="avatar">
        <label>
            New avatar:<br/>
            <input type="file" name="avatar">
        </label><br/>
        
        <br/><img class="mini" src="<?=$base;?>/media/covers/<?=$userInfo->cover;?>" alt="cover">
        <label>
            New cover foto:<br/>
            <input type="file" name="cover">
        </label>

        <hr/>

        <label>
            Full Name:<br/>
            <input type="text" name="name" value="<?=$userInfo->name?>">
        </label>
        <label>
            Email:<br/>
            <input type="text" name="email" value="<?=$userInfo->email?>">
        </label>

        <label>
            Birthdate:<br/>
            <input type="date" name="birthdate" value="<?=$userInfo->birthdate?>">
        </label>

        <label>
            City:<br/>
            <input type="text" name="city" value="<?=$userInfo->city?>">
        </label>

        <label>
            Work:<br/>
            <input type="text" name="work" value="<?=$userInfo->work?>">
        </label><br/>
        <?php if($userInfo->id != 2): ?>
        <hr/>    
        <label>
            New Password:<br/>
            <input type="password" name="password">
        </label>
        <label>
            Repeat New Password:<br/>
            <input type="password" name="password_confirmation">
        </label>
        <?php endif; ?>

        <button class="button">Save</button>

    </form>


</section>

<?php
require 'partials/footer.php';
?>