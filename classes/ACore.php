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
        echo'<div class="navigation">';
        $count = mysql_num_rows($result);
        echo "<ul>";
            echo "<li><a href='index.php'>Главная</a></li>";
        for($i = 0;$i<$count; $i++){
            $row=mysql_fetch_array ($result,MYSQL_ASSOC);
            $a=$row["name_cat"];
            $b=$row["id_category"];
            printf("
            <li><a href='?option=category&id_cat=%s'>%s</a></li>
            ",$b,$a);
        }
        echo "</ul>";
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