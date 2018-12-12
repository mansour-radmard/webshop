<?php
session_start();
session_destroy();
header('Location: /webshop/index.php');
