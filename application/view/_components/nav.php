<?php

class Nav
{
    private function urlSwitcher($url) {
        switch($url) {
            case '/':
                return $this->createManagerLink();
            case '/manager':
                return $this->createFeedLink() . $this->createAddNewsLink();
            case '/read':
                return $this->createFeedLink() . $this->createManagerLink();
            case '/manager/edit':
                return $this->cancelLink();
        }
    }

    public function createNav($url) {
        return '<nav class="nav">' . $this->urlSwitcher($url) . '</nav>';
    }

    private function createFeedLink() {
        return '<a href="/" class="link">К ленте новостей</a>';
    }

    private function createManagerLink() {
        return '<a href="/manager" class="link floated-right">Админка</a>';
    }

    private function createAddNewsLink() {
        return '<a href="/manager/edit" class="link floated-right">Добавить</a>';
    }

    private function cancelLink() {
        return '<a href="/manager" class="link link--danger floated-right">Отмена</a>';
    }
}