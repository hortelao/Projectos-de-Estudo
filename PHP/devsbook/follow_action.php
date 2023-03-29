<?php

require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $userRelationDao = new UserRelationDaoMysql($pdo);
    $userDao = new UserDaoMysql($pdo);

    if($userDao->findById($id)) {
            $relation = new UserRelation();
            $relation->user_from = $userInfo->id;
            $relation->user_to = $id;
        if($userRelationDao->isFollowing($userInfo->id, $id)) {
            // Unfollow
            
            $userRelationDao->delete($relation);
        } else {
            //Follow
            
            $userRelationDao->insert($relation);
        }
        header('Location: profile.php?id='.$id);
        exit;
    }
}

header('Location: '.$base);
exit;