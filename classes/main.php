<?php
class main extends ACore{
    public function get_content(){
        
        $query="SELECT id,title,description,date,img_src FROM articles ORDER BY date DESC";
        $result=mysql_query($query);
        if(!$result){
            exit(mysql_error());
        }
        echo '<div id="content">';
        $row=array();
        $count=mysql_num_rows($result);
        for ($i=0;$i<$count;$i++){
            $row=mysql_fetch_array($result,MYSQL_ASSOC);
            printf("<div style ='margin:10px;border-bottom:2px solid #000'>
            <p style ='font-size:24px'>%s</p>
            <p><img style ='margin:5px' width='150px' align='left' src='%s'>%s</p>
            <p style='color:red'><a href='?option=view&id_text=%s'>Читать статью</a></p>
            </div>
            ",$row['title'],$row['img_src'],$row['description'],$row['id']);
        }
        echo '</div>
        </div>';
        echo '<div id="footer-image"></div>';
    }
    
   
}

?>