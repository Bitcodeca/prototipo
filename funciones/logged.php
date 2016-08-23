<?php
$current_user = wp_get_current_user(); 
$usuariologged = $current_user->user_login;
$nombrelogged = $current_user->user_firstname;
$apellidologged = $current_user->user_lastname;
$emaillogged = $current_user->user_email;
$idlogged = $current_user->id;
$avatarlogged = get_avatar( $idlogged, 50 );
?>