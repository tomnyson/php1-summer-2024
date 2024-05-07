<?php

// redirect to login.php
session_start();
session_destroy();
header('Location:login.php');
