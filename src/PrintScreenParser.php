<?php
/**
 * Created by irworks on 26/03/2017.
 * © Copyright irworks, 2017
 * All rights reserved. Do not destribute.
 */

/**
 * Module: Print screen parser
 * File: prntscreenproxy/PrintScreenParser.php
 * Depends: [NONE]
 */
class PrintScreenParser
{
    private $url;

    /**
     * PrintScreenParser constructor.
     * @param $url
     */
    public function __construct($url) {
        if(empty($url)) {
            echo file_get_contents(__DIR__ . '/../resources/html/homepage.html');
            return;
        }
        $this->url = $url;
        $this->parse($this->fetchContent());
    }

    /**
     * Parse the real image URl from a prntscr.com link
     * @param string $content
     */
    private function parse($content = '') {
        preg_match('/http:\/\/image.prntscr\.com\/image\/[a-zA-Z0-9]+\.png/', $content, $matches);
        if(count($matches) >= 0) {
            echo '<img src=\'' . $matches[0] . '\'>';
        }else{
            echo 'url not found.';
        }
    }

    /**
     * Since CloudFlare is not really happy about requests with certain headers, file_get_contents() is not the best idea.
     * @return string
     */
    private function fetchContent() {
        return shell_exec('wget -qO- ' . $this->url);
    }
}