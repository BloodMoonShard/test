    <div class="info-block">
        <p><span class="secondary-head red-text"><?= $category_name;?></span></p>
        <table>
            <tbody>
            <?php $i=0; foreach($subcategory as $k=>$s){
                if($i % 2){
                    $colored = "";
                }else{
                    $colored = "class='colored'";
                }?>
                <tr <?=$colored;?>>
                    <td class="cat-name"><?=$k;?></td>
                    <td class="description"><?=$s;?></td>
                </tr>
            <?php $i++; }?>

            </tbody>
        </table>
    </div>

