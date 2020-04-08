<?php
session_start();
session_destroy();

header('Location: index');
echo "Logged Out Successfully...";
?>