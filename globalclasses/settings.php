<?php

class settings {

    private $data = [];

    public function __construct($db) {

        $result = $db->query("SELECT item, value FROM setting");

        while ($row = $result->fetch_assoc()) {
            
            $this->data[$row['item']] = $row['value'];
        }
    }

    public function __get($name) {

        return $this->data[$name] ?? null;
    }
}