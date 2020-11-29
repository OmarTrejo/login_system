<?php

    class model {
        public static function many($query,$aclass){
            $cnt = 0;
            $array = array();
            $row_datos = sql($query);
            $row_count = mysqli_num_rows($row_datos);
            if($row_count > 0)
            {
                $row_data = mysqli_fetch_assoc($row_datos);
                do {
                    $array[$cnt] = new $aclass;
                    $cnt2=1;
                    foreach ($row_data as $key => $v) {
                        $array[$cnt]->$key = $v;
                        $cnt2++;
                    }
                    $cnt++;
                } while ($row_data = mysqli_fetch_assoc($row_datos));
            }
        
            return $array;
        }
    
        public static function one($query,$aclass){
            $cnt = 0;
            $found = null;
            $data = new $aclass;
            $row_datos = sql($query);
            if(!empty($row_datos) || !is_null($row_datos))
            {
                $conta = mysqli_num_rows($row_datos);
                if ($conta > 0) {
                    $row_count = mysqli_fetch_assoc($row_datos);
                    do{
                        $cnt=1;
                        foreach ($row_count as $key => $v) {
                            $data->$key = $v;
                            $cnt++;
                        }
                        $found = $data;
                        break;
                    } while ($row_count = mysqli_fetch_assoc($row_datos));
                }
            }
            return $found;
        }
    }

?>