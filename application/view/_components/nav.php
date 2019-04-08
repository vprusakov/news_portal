<?php

class Nav
{
    private function urlSwitcher($url) {
        switch($url) {
            case '/':
                return $this->createManagerLink();
            case '/manager':
                return $this->createFeedLink();
            case '/read':
                return $this->createFeedLink() . $this->createManagerLink();

        }
    }

    public function createNav($url) {
        return '<nav class="nav">' . $this->urlSwitcher($url) . '</nav>';
    }

    private function createFeedLink() {
        return '<a href="/" class="link">К ленте новостей</a>';
    }

    private function createManagerLink() {
        return '<a href="/manager" class="nav-link-to-manager link">Админка</a>';
    }
}