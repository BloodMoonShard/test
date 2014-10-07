$(document).ready(function(){
    if($('#id_city').val() > 0){
        ajax_get_list_region_city($('#id_city').val());
        ajax_get_list_highway($('#id_city').val());
    }
    $('#btn_create_region_city').on('click', function(){
        if($('#id_city_hidden').val()){
            $.ajax({
                url: '/admin/ajax/add_region_city',
                data: 'id_city='+$('#id_city_hidden').val()+'&name='+$('#name_add_region').val(),
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    if(response.content){
                        ajax_get_list_region_city($('#id_city_hidden').val());
                        $('#myModal').modal('hide');
                    }
                }
            })
        }else{
            alert('Выберите город!');
        }
    })

    $('#btn_create_highway').on('click', function(){
        if($('#id_city_hidden').val()){
            $.ajax({
                url: '/admin/ajax/add_highway',
                data: 'id_city='+$('#id_city_hidden').val()+'&name='+$('#name_add_highway').val()+'&id_highway_direction='+$('#list_highway_direction').val(),
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    if(response.content){
                        ajax_get_list_highway($('#id_city_hidden').val());
                        $('#myModal2').modal('hide');
                    }
                }
            })
        }else{
            alert('Выберите город!');
        }
    })
    $('#btn_create_highway_direction').on('click', function(){
        if($('#id_city_hidden').val()){
            $.ajax({
                url: '/admin/ajax/add_highway_direction',
                data: 'id_city='+$('#id_city_hidden').val()+'&name='+$('#name_add_highway_direction').val(),
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    if(response.content){
                        ajax_get_list_highway_direction($('#id_city_hidden').val());
                        $('#myModal3').modal('hide');
                    }
                }
            })
        }else{
            alert('Выберите город!');
        }
    })
})

function ajax_get_list_region_city(id_city){
    $.ajax({
        url: '/admin/ajax/get_list_region_city',
        data: 'id_city='+id_city,
        type: 'POST',
        dataType: 'json',
        success: function(response){
            $('#region_list').html('<option>Выберите округ</option>');
            if(response.content){
                for(var i = 0; i < response.content.length; i++){
                    $('#region_list').append('<option value="'+response.content[i].id_region_city+'">'+response.content[i].name+'</option>');
                    console.log(response.content[i]);
                }
            }
        }
    })
}

function ajax_get_list_highway(id_city){
    $.ajax({
        url: '/admin/ajax/get_list_highway',
        data: 'id_city='+id_city,
        type: 'POST',
        dataType: 'json',
        success: function(response){
            $('#highway_list').html('<option>Выберите шоссе</option>');
            if(response.content){
                for(var i = 0; i < response.content.length; i++){
                    $('#highway_list').append('<option value="'+response.content[i].id_highway+'">'+response.content[i].name+'</option>');
                    console.log(response.content[i]);
                }
            }
        }
    })
}

function ajax_get_list_highway_direction(id_city){
    $.ajax({
        url: '/admin/ajax/get_list_highway_direction',
        data: 'id_city='+id_city,
        type: 'POST',
        dataType: 'json',
        success: function(response){
            console.log(response);
            $('#list_highway_direction').html('<option>Выберите направление</option>');
            if(response.content){
                for(var i = 0; i < response.content.length; i++){
                    $('#list_highway_direction').append('<option value="'+response.content[i].id_highway_direction+'">'+response.content[i].name+'</option>');
                    console.log(response.content[i]);
                }
            }
        }
    })
}