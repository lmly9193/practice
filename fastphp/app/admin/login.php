<?php

if(!empty(request('username')) && !empty(request('password'))){
    header('Location: /admin/home');
};

?>

<form action="/admin/login" method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" value="登入">
</form>
