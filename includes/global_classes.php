<?php

$this->router = new Router(URL_PATH);
$this->user = new User($this);
$this->settings = new settings($this->db);