<?php 

class myquery {
    
    public function __construct($db) {

        $this->db = $db;
    }
    
    public function findBy(string $table,string $field): ?array {
        
        $result = $this->db->myQuery("SELECT * FROM $table WHERE $field");
    
        if($result->num_rows < 1) {
            
            $result = null;
        }
    
        return $result;
    
    }
}