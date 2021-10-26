<?
$imgpath = './img/slider/';
$imgList = scandir($imgpath);
$result = '<div class="slider">';
    $result .= '<div class="slider__line">';
    foreach ($imgList as $index => $imgName) {
        $ext = pathinfo($imgName, PATHINFO_EXTENSION);
        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'jfif') {
            $result .= "<img src=\"$imgpath$imgName\" alt=\"\" class=\"slider__img\">";
        }
    }
    
$result .= '</div>';
$result .= '<div class="slider__controls">
    <button class="slider__prev slider__btn"><i class="far fa-chevron-left"></i></button>
    <button class="slider__next slider__btn"><i class="far fa-chevron-right"></i></button>
    </div>';
$result .= '</div>';
echo $result;
?>

<!-- <div class="slider">
        <div class="slider__line">
            <img src="../img/1.jpg" alt="" class="slider__img">
            <img src="../img/2.jpg" alt="" class="slider__img">
            <img src="../img/3.jpg" alt="" class="slider__img">
        </div>
        <div class="slider__controls">
            <button class="slider__prev slider__btn"><i class="far fa-chevron-left"></i></button>
            <button class="slider__next slider__btn"><i class="far fa-chevron-right"></i></button>
        </div>
</div> -->