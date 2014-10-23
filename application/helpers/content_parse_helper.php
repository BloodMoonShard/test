<?php

function parse_format($value)
{
    $array_format = array('input' => 'Текстовое поле', 'select' => 'Выпадающий список',
        'checkbox' => 'ЧекБокс', 'radio' => 'Радио список', 'textarea' => 'Текстовая область');
    return $array_format[$value];
}

function generate_input($data, $selected = false)
{
    if ($data) {
        $content = "";
        foreach ($data as $dt) {
            if (strlen($content) == 0) {
                $content = '<div class="form-group">';
            }
            $selected_str = "";
            if($selected){
                    if(isset($selected[$dt['id_subcategory']]['value'])){
                        $content .= "<input class='form-control' type='input' value='" . $selected[$dt['id_subcategory']]['value'] . "' name='gdata_input_". $dt['id_subcategory'] ."_".$dt['id_subcategory_value']."'>";
                    }else{
                        $content .= "<input class='form-control' type='input' value='' name='gdata_input_". $dt['id_subcategory'] ."_".$dt['id_subcategory_value']."'>";
                    }
            }else{
                $content .= "<input class='form-control' type='input' value='" . $selected_str . "' name='gdata_input_". $dt['id_subcategory'] ."_".$dt['id_subcategory_value']."'>";
            }
        }
        $content .= "</div>";
        return $content;
    }
    return '';
}

function generate_select($data, $selected = false)
{
    if ($data) {
        $content = "";
        foreach ($data as $dt) {
            if (strlen($content) == 0) {
                $content = '<div class="form-group"><select class="form-control" name="gdata_' . $dt['id_subcategory'] . '">';
                $content.='<option value="">Выбрать</option>';
            }
            $selected_str = "";
            if($selected){
                    if(@$selected[$dt['id_subcategory']][$dt['id_subcategory_value']] == $dt['id_subcategory_value']){
                        $selected_str = "selected=selected";
                        $content .= "<option ".$selected_str." value='" . $dt['id_subcategory_value'] . "'>" . $dt['value'] . "</option>";
                    }else{
                        $content .= "<option ".$selected_str." value='" . $dt['id_subcategory_value'] . "'>" . $dt['value'] . "</option>";
                    }
            }else{
                $content .= "<option ".$selected_str." value='" . $dt['id_subcategory_value'] . "'>" . $dt['value'] . "</option>";
            }
        }
        $content .= "</select></div>";
        return $content;
    }
    return '';
}

function generate_textarea($data, $selected = false)
{
    if ($data) {
        $content = "";
        foreach ($data as $dt) {
            if (strlen($content) == 0) {
                $content = '<div class="form-group">';
            }
            if($selected){
                    if(isset($selected[$dt['id_subcategory']]['value'])){
                        $content .= "<textarea rows='3' class='form-control' name='gdata_input_". $dt['id_subcategory'] ."_".$dt['id_subcategory_value']."'>".$selected[$dt['id_subcategory']]['value']."</textarea>";
                    }else{
                        $content .= "<textarea rows='3' class='form-control' name='gdata_input_". $dt['id_subcategory'] ."_".$dt['id_subcategory_value']."'></textarea>";
                    }
            }else{
                $content .= "<textarea rows='3' class='form-control' name='gdata_input_". $dt['id_subcategory'] ."_".$dt['id_subcategory_value']."'></textarea>";
            }
        }
        $content .= "</div>";
        return $content;
    }
    return '';
}

function generate_radio($data, $selected = false)
{
    if ($data) {
        $content = "";
        foreach ($data as $dt) {
            if (strlen($content) == 0) {
                $content = '<div class="form-group">';
            }
            $selected_str = "";
            if($selected){
                    if(@$selected[$dt['id_subcategory']][$dt['id_subcategory_value']] == $dt['id_subcategory_value']){
                        $selected_str = "checked";
                        $content .= "<div class='radio'><input type='radio' ".$selected_str." value='" . $dt['id_subcategory_value'] . "' name='gdata_". $dt['id_subcategory'] ."'>" . $dt['value']."</div>";
                    }else{
                        $content .= "<div class='radio'><input type='radio' value='" . $dt['id_subcategory_value'] . "' name='gdata_". $dt['id_subcategory'] ."'>" . $dt['value']."</div>";
                    }
            }else{
                $content .= "<div class='radio'><input type='radio' value='" . $dt['id_subcategory_value'] . "' name='gdata_". $dt['id_subcategory'] ."'>" . $dt['value']."</div>";
            }
        }
        $content .= "</div>";
        return $content;
    }
    return '';
}

function generate_checkbox($data, $selected = false)
{
    if ($data) {
        $content = "";
        foreach ($data as $dt) {
            if (strlen($content) == 0) {
                $content = '<div class="form-group">';
            }
            $selected_str = "";
            if($selected){
                    if(@$selected[$dt['id_subcategory']][$dt['id_subcategory_value']] == $dt['id_subcategory_value']){
                        $selected_str = "checked=checked";
                        $content .= "<div class='checkbox'><input type='checkbox' ".$selected_str." value='" . $dt['id_subcategory_value'] . "' name='gdata_". $dt['id_subcategory'] ."[]'>" . $dt['value']."</div>";
                    }else{
                        $content .= "<div class='checkbox'><input type='checkbox' value='" . $dt['id_subcategory_value'] . "' name='gdata_". $dt['id_subcategory'] ."[]'>" . $dt['value']."</div>";
                    }
            }else{
                $content .= "<div class='checkbox'><input type='checkbox' value='" . $dt['id_subcategory_value'] . "' name='gdata_". $dt['id_subcategory'] ."[]'>" . $dt['value']."</div>";
            }
        }
        $content .= "</div>";
        return $content;
    }
    return '';
}

function comparison_links($id_object)
{
   $CI = get_instance();
    $session_comparison = $CI->session->userdata('comparison');
    $size_comp = sizeof($session_comparison);
    $content = '';
    $content .= '<div class="more-info">';
    $content .= '<a href="/details/' . $id_object . '">Подробнее</a>';


    $in_comparison = false;
    foreach ($session_comparison as $s) {
        if ($s == $id_object) {
            $in_comparison = true;
            break;
        }
    }
    $content .= '<div class="in-comp">';
    $content .= '<input name="to-list" class="to-list"';
    $content .= 'id="to-list-' . $id_object . '" type="checkbox" ';
    $content .= 'value="' . $id_object . '"';
    if ($in_comparison) {$content .= ' checked >';} else {$content .= ' >';}
    $style1 = "";
    $style = "";
    if ($in_comparison) {
        $style = "display: inline-block";
    } else {
        $style1 = "display: inline-block";
    }


    $content .= '<label style="' . $style1 . '"
                   for="to-list-' . $id_object . '"
                   id="label-' . $id_object . '" >';
    if ($in_comparison) {
        $content .= 'Список сравнения <span style="color: #EE4942;">(' . $size_comp . ')</span>';
    } else {
        $content .= 'Сравнить';
    }

    $content .= '</label>';

    $content .= '<a style="' . $style . '" href="/comparison" class="link_comp" id="not_label-' . $id_object . '">';

    if ($in_comparison) {
        $content .= 'Список сравнения <span style="color: #EE4942;">(' . $size_comp . ')</span>';
    } else {
        $content .= 'Сравнить';
    }
    $content .= '</a>
        </div>
    </div>';
    return $content;
}

