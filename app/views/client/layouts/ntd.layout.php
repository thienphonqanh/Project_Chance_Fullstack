<?php
$this->render('block/ntd_header', [], 'client');
$this->render($body, $dataView);
$this->render('block/offcanvas_candidate', [], 'client');
$this->render('block/footer', [], 'client');
