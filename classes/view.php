<?php

class view extends ACore{
    
public function get_content(){
    echo '<div id="content">';
        if(!$_GET['id_text']){
            echo 'не играйся со строкой';
        }
        else{
            $id_text=(int)$_GET['id_text'];
            
            if (!$id_text){
                echo "НЕ ИГРАЙСЯ СО СТРОКОЙ";
            }
            else{
                $query="SELECT title,text,date,id,img_src FROM articles WHERE id='$id_text'";
                $result=mysql_query($query);
        if(!$result){
           exit(mysql_error());
        }
        $row=mysql_fetch_array($result,MYSQL_ASSOC);
        printf("<p style ='font-size:18px'>%s</p>
            <p>%s</p>
            <p><img style ='margin-right:5px' width='150px' align='left' src='%s'>%s</p>"
            ,$row['title'],$row['date'],$row['img_src'],$row['text']);
        }
        
        
}
        
        
       
        echo '</div>
        </div>';
        
    }

}

?>