<?php
    $chairs = [
        [1 => "occupied", 2 => "occupied", 3 => "occupied", 4 => "occupied"],
        [5 => "occupied", 6 => "occupied", 7 => "occupied", 8 => "occupied"],
        [9 => "occupied", 10 => "occupied", 11 => "free", 12 => "free"],
        [13 => "free", 14 => "occupied", 15 => "free", 16 => "occupied"],
        [17 => "occupied", 18 => "free", 19 => "occupied", 20 => "free"]
    ];

    function seet_1($chairs)
    {
        foreach ($chairs as $row) {
        echo '<div class="d-flex flex-column">';

        $i = 1;
        $max_r = 30;
        $rot_amount = ($max_r * 2) / count($chairs);
        
        foreach ($row as $id => $status) {
            $rotation = -($max_r - $i * $rot_amount);
            $margin_left = round(($max_r - abs($rotation)) * 0.2);
            $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
            
            echo '<button 
                    class="chair btn my-1 ' . $isfree . '"
                    data-bs-toggle="button"
                    autocomplete="off"
                    style="
                        transform: rotate(' . $rotation . 'deg);
                        margin-left: ' . $margin_left . 'px;
                    ">'. $id .'
                    </button>';
            $i++;
        }
        echo '</div>';}
    };

    function seet_2($chairs)
    {
    echo '<div type="Teater/Koncert" class="d-flex flex-column m-3 seet_container">';
    $i = 0;
    $max_r = 20;
    $rot_amount = ($max_r * 2) / count($chairs);
    foreach ($chairs as $row) {
        $rotation = -($max_r - $i * $rot_amount);
        $margin_left = round(($max_r - abs($rotation)));
        echo '<div class="d-flex-inline flex-row" 
                style="
                    transform-origin: left center;
                    transform: rotate(' . $rotation . 'deg);
                    margin-left: ' . $margin_left . 'px;
                    width: fit-content;
                ">';      
        foreach ($row as $id => $status) {
            $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
            echo '<button class="chair btn my-1 ' . $isfree . '" data-bs-toggle="button" autocomplete="off">'. $id .'</button>';
        }
        $i++;
        echo '</div>';}
    echo '</div>';
    }


    function seet_3($chairs)
    {

    $j = 1;
    foreach ($chairs as $row) {
        $m_right = 0;
        if ($j % 2 == 0){$m_right = 20;}
        echo '<div class="d-flex flex-column" style=" margin-right: ' . $m_right . 'px;">';
        foreach ($row as $id => $status) {
            $isfree = ($status == "free") ? "btn-outline-primary" : "btn-danger";
            echo '<button class="chair btn m-1 ' . $isfree . '" data-bs-toggle="button"autocomplete="off">'. $id .'</button>';
        }
        echo '</div>';
        $j ++;
        }
    }
?>