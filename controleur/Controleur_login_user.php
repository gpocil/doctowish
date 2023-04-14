<?php
session_start();
require("Contr_class_user.php");
contr_user::login_user();
require("vue/login_user.php");
