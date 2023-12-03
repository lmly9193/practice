<?php

if ($_SESSION['login'] != 1) {
    header('Location: /admin/login');
}else{
    header('Location: /admin/home');
}
