<?php 
    function getquery ($query,$con,$NotSelect=false,$by_obj_id=false) {

        //echo "</br> ++++++++++++++++++++function ++++++getQuery+++++</br>";
        //echo "</br> QUERY IS----> $query </br>";	
            //if (strpos($query,'95')!==false)
            //{
             //   $j=1;
            //}
        $check=NULL; 
        $k=1;
        $mysquery=mysqli_query($con,$query);//
        if (!$mysquery)
        { 
            $j=mysqli_error($con);
        //echo "ERROR IS ".$j;
           return false;
                       
        }
        else
        {			   
            if ($NotSelect)
            {
                return $mysquery;	
            }
                           
            if (mysqli_num_rows($mysquery))
            {
        
                mysqli_data_seek($mysquery,0);   
                //echo "</br> GOT SOMETHING </br>";        
                if ($by_obj_id)
                {
                    while ($arr=mysqli_fetch_assoc($mysquery)) 
                    {  
                      $events[$arr["obj_id"]]=$arr; 
                                                                                                                
                      $k++; 
                    }//while ($arr=mysql_fetch_array($mysquery))
        
                }
                else
                {
                    while ($arr=mysqli_fetch_assoc($mysquery)) 
                    {  
                      $events[$k]=$arr; 
                                                                                                                
                      $k++; 
                    }//while ($arr=mysql_fetch_array($mysquery))
                }
            }//if (mysql_num_rows($mysquery))
            else {return false;}
        }
                    
                                                     
        return $events;
    }
    function makeArray($array,$idindex,$nameindex){
        $data= array();
        
        foreach ($array as $key => $value) {
            
            // foreach ($value as $key => $val) {
                
                $data[$value[$idindex]] = $value[$nameindex];
            // }
        }
        
        return $data;
    }
?>