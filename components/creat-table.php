<?
      $row = $_POST['row'];
      $col = $_POST['col'];
    if ($col == '' && $row == '') {
        $result = '<div class="table">';
     for ($i=1; $i <= 5; $i++) { 
        $result .= '<div class="table__row">';
        for ($j=1; $j <= 5; $j++) { 
            $result .= '<div class="table__col">' . $i * $j . '</div>';
        }
        $result .= '</div>';
       }
    $result .= '</div>';
    echo $result;
    } else {
   
     $result = '<div class="table">';
     for ($i=1; $i <= $row; $i++) { 
        $result .= '<div class="table__row">';
        for ($j=1; $j <= $col; $j++) { 
            $result .= '<div class="table__col">' . $i * $j . '</div>';
        }
        $result .= '</div>';
       }
    $result .= '</div>';
    
    echo $result;
    }
    ?>