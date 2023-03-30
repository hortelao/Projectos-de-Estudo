<?php

require 'config.php';
require 'models/Auth.php';
require_once 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();



$array = ['error' => ''];

$postDao = new PostDaoMysql($pdo);


if(isset($_FILES['photo']) && !empty($_FILES['photo']['tmp_name'])) {
    $photo = $_FILES['photo'];

    if(in_array($photo['type'], ['image/jpeg','image/jpg','image/png'])) {

        $photoWidth = 800;
        $photoHeight = 800;

        list($widthOrig, $heightOrig) = getimagesize($photo['tmp_name']);
        $ratio = $widthOrig / $heightOrig;

        $newWidth = $photoWidth;
        $newHeight = $photoHeight;
        $ratioMax = $photoWidth / $photoHeight;

        if($ratioMax > $ratio) {
            $newWidth = $newHeight * $ratio;
        } else {
            $newHeight = $newWidth / $ratio;
        }

        

        $finalImage = imagecreatetruecolor($newWidth, $newHeight);

        switch($photo['type']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($photo['tmp_name']);
            break;
            case 'image/png':
                $image = imagecreatefrompng($photo['tmp_name']);
            break;
        }

        imagecopyresampled(
            $finalImage, $image,
            0, 0, 0, 0,
            $newWidth, $newHeight, $widthOrig, $heightOrig
        );

        $photoName = md5(time().rand(0, 9999)).'.jpg';

        imagejpeg($finalImage, './media/uploads/'.$photoName);

        $newPost = new Post();
        $newPost->id_user = $userInfo->id;
        $newPost->type = 'photo';
        $newPost->created_at = date('Y-m-d H:i:s');
        $newPost->body = $photoName;

        $postDao->insert($newPost);
    
    } else {
        $array['error'] = 'Image type not supported (Only: JPG, JPEG, PNG)';
    }
} else {
    $array['error'] = 'Nothing sent';
}



header('Content-Type: application/json');
echo json_encode($array);
exit;