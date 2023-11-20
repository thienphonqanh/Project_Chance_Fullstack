<?php
$this->render('layouts/header', [], 'admin');
$this->render('layouts/sidebar', [], 'admin');
$this->render('layouts/breadcrumb', [], 'admin');
$this->render($body);
$this->render('layouts/footer', [], 'admin');
