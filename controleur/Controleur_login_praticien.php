<?php
session_start();
require("Contr_class_praticien.php");
contr_prat::login_prat();
require("vue/login_praticien.php");
