<?php
class category extends ACore{
    public function get_content(){
           echo '<div id="content">';
        if(!$_GET['id_cat']){
            echo 'не играйся со строкой';
            }
        else{
            $id_cat=(int)$_GET['id_cat'];
             if (!$id_cat){
                echo "НЕ ИГРАЙСЯ СО СТРОКОЙ";
                }
                else{
                       $query="SELECT id,title,description,date,img_src 
                       FROM articles 
                       WHERE  cat='id_cat' 
                       ORDER BY date DESC";
        $result=mysql_query($query);
        if(!$result){
            exit(mysql_error());
        }
       if(mysql_num_rows($result)>0){
        $row=array();
        for ($i=0;$i< mysql_num_rows($result);$i++){
            $row=mysql_fetch_array($result,MYSQL_ASSOC);
            printf("<div style ='margin;10px;border-bottom:2 px solid #000'>
            <p style='font-size:22px'>%s</p>
            <p>%s</p>
            <p>img style ='margin-right:5px' width='250px' align='left' src='%s'>%s</p>
            <p style='color:red'><a href='&option=view&id_text=%s'>Читать статью</a></p>
            </div>
            ",$row['title'],$row['date'],$row['img_src'],$row['description'],$row['id']);
        }
        }
        
else{
           echo "В данной категории нет статей увы )))))))) ";
        }
    }
}
    
        echo '</div>
        </div>';
}
}

?>