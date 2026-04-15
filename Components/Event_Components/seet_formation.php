<?php
    $chairs = [
        [1 => "occupied", 2 => "occupied", 3 => "occupied", 4 => "occupied"],
        [5 => "occupied", 6 => "occupied", 7 => "occupied", 8 => "occupied"],
        [9 => "occupied", 10 => "occupied", 11 => "free", 12 => "free"],
        [13 => "free", 14 => "occupied", 15 => "free", 16 => "occupied"],
        [17 => "occupied", 18 => "free", 19 => "occupied", 20 => "free"]
    ];
    function seet_type($type,$event_id){
        global $chairs;
        switch($type){
            case 'Koncert':
            case 'Stand Up':
                seet_1($chairs, $event_id);
                break;
            case 'Festival':
                seet_2($chairs, $event_id);
                break;
            case 'Teater':
                seet_3($chairs, $event_id);
                break;
        }

    }
    function seet_1($chairs, $event_id)
    {
        echo '<div class="d-flex flex-row">';
        foreach ($chairs as $row) {
            echo '<div class="d-flex flex-column">';

            $i = 1;
            $max_r = 30;
            $rot_amount = ($max_r * 2) / count($chairs);
            
            foreach ($row as $num => $status) {
                $rotation = -($max_r - $i * $rot_amount);
                $margin_left = round(($max_r - abs($rotation)) * 0.2);
                $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
                
                echo '<button 
                        id="' . $event_id . '"
                        value="'. $num .'"
                        class="chair btn my-1 ' . $isfree . '"
                        data-bs-toggle="button"
                        autocomplete="off"
                        style="
                            transform: rotate(' . $rotation . 'deg);
                            margin-left: ' . $margin_left . 'px;
                        ">'. $num .'
                        </button>';
                $i++;
            }
            echo '</div>';
            }
        echo '</div>';
    };

    function seet_2($chairs, $event_id)
    {
        $i = 0;
        $max_r = 20;
        $rot_amount = ($max_r * 2) / count($chairs);
        
        foreach ($chairs as $row) 
            {
            $rotation = -($max_r - $i * $rot_amount);
            $margin_left = round(($max_r - abs($rotation)));
            echo '<div class="d-flex" 
                    style="
                        transform-origin: left center;
                        transform: rotate(' . $rotation . 'deg);
                        margin-left: ' . $margin_left . 'px;
                        width: fit-content;
                        height: fit-content;
                    ">';      
            foreach ($row as $num => $status) 
                {
                $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
                echo '<button id="' . $event_id . '" value="'. $num .'" class="chair btn my-1 ' . $isfree . '" data-bs-toggle="button" autocomplete="off">'. $num .'</button>';
                }
            $i++;
            echo '</div>';
            }
    }


    function seet_3($chairs,$event_id)
    {
        echo '<div class="d-flex flex-row">';
        $j = 1;
        foreach ($chairs as $row) {
            $m_right = 0;
            if ($j % 2 == 0){$m_right = 20;}
            echo '<div class="d-flex flex-column" style=" margin-right: ' . $m_right . 'px;">';
            foreach ($row as $num => $status) {
                $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
                echo '<button id="' . $event_id . '" value="'. $num .'" class="chair btn m-1 ' . $isfree . '" data-bs-toggle="button"autocomplete="off">'. $num .'</button>';
            }
            echo '</div>';
            $j ++;
            }
        echo '</div>';
    }
?>