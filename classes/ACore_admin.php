<?php
abstract class ACore_Admin{
    
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

      echo'<div id="menu">';
      
      echo "<div id='hdl'>
      <a href='?option=edit_articles'>Редактирование статьи</a>
      </div>";
      
      echo "<div id='hdl'>
      <a href='?option=edit_menu'>Редактирование меню</a>
      </div>";

      echo "</div>";
        
    }

 

public function get_body(){
        $this->get_header();
        $this->get_menu();
        $this->get_content();
       
    }
    abstract function get_content();
}


?>
