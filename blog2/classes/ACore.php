<?php
abstract class ACore{
    
    protected $db;
    
    public function __construct(){
        $this->db=mysql_connect(HOST,USER,PASS);
        if(!$this->db){
            exit ("ошибка с БД увы ничего не получиться ".mysql_error());
        }
        if(!mysql_select_db(DB,$this->db)){
            exit ("Нет такой Бд ".mysql_error());
        }
        mysql_query("SET NAMES 'UTF8'");
    }
    protected function get_header(){
        include "header.php";
        
    }
    
protected function get_menu(){
        $query = "SELECT id_category,name_cat FROM category";
        $result =mysql_query($query); 
        if(!$result){
            exit(mysql_error());
            }
        $row=array();
        echo'<div id="menu">';
        $count = mysql_num_rows($result);
        for($i = 0;$i<$count; $i++){
            $row=mysql_fetch_array ($result,MYSQL_ASSOC);
            echo "<p>".$row["name_cat"]."</p>";
        	
        }
        echo"</div>";
        
    }

 

public function get_body(){
        $this->get_header();
        $this->get_menu();
        $this->get_content();
       
    }
    abstract function get_content();
}


?>