<?php
unset($_SESSION['email']);
unset($_SESSION['pass']);
session_destroy();
Header("Location: login.php ");
?>