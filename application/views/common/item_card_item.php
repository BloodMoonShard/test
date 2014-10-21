<?php $i=0; $string = ""; foreach($subcategory as $k=>$s){
    if (strlen($s)<1) { continue; }
    if($i % 2){
        $colored = "";
    }else{
        $colored = "class='colored'";
    }
    $string.= '<tr '.$colored.'>
        <td class="cat-name">'.$k.'</td>
        <td class="description">'.$s.'</td>
    </tr>';
    $i++; }
    if (strlen($string)>0) {
    ?>


    <div class="info-block">
        <p><span class="secondary-head red-text"><?= $category_name;?></span></p>
        <table>
            <tbody>
                <?php echo $string; ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
