<?php
session_start();
require('Contr_class_praticien.php');
require('Contr_class_user.php');
contr_prat::cadenas_user();
contr_user::inscription_user();
require("vue/inscription_user.php");
