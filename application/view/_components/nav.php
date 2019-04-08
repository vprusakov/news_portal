<?php
    function createNav($url) {
        return '<nav class="nav">' .
            ($url == '/manager' ?
                '<a href="/" class="nav-link-to-feed">К ленте новостей</a>' : '<a href="manager/" class="nav-link-to-manager">Админка</a>') .
        '</nav>';
    }
