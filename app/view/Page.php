<?php

class Page {
    
    const HEADER_FILE = "view/header.php";
    const FOOTER_FILE = "view/footer.php";
    
    static function getView($page, $data = []){
        foreach ($data as $key => $value) {
            ${$key} = $value;
        }

        $content = "view/$page.php";
        include_once Page::HEADER_FILE;
        include_once $content;
        include_once Page::FOOTER_FILE;
    }
}

