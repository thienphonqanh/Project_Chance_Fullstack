<?php
$this->render('block/header', [], 'client');
$this->render($body, $dataView);
$this->render('block/sidebar_candidate', [], 'client');
$this->render('block/footer', [], 'client');
