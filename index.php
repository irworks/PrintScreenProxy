<?php
/**
 * Created by irworks on 26/03/2017.
 * © Copyright irworks, 2017
 * All rights reserved. Do not destribute.
 */

/**
 * Module: Main entry point
 * File: prntscreenproxy/index.php
 * Depends: [NONE]
 */
require_once __DIR__ . '/src/PrintScreenParser.php';

new PrintScreenParser( empty($_GET['url']) ? '' : $_GET['url'] );
?>