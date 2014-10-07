<div id="page-wrapper" style="min-height: 704px;">
    <script type="text/javascript">
        $(function () {
            $('#idc').on('change', function(){
                $.ajax(
                    {
                        url: '/admin/ajax/get_list_subcategory',
                        data: 'idc=' + $(this).val(),
                        type: 'POST',
                        dataType: 'json',
                        success: function (resp) {
                            $('ol.category').html(resp.content);
                            $("ol.category").sortable({
                                onDrop: function ($item, container, _super, event) {
                                    $item.removeClass("dragged").removeAttr("style")
                                    $("body").removeClass("dragging")
                                    var listId = [];
                                    $.each($("ol.category li"), function (e, v) {
                                        listId.push($(v).attr('data-id'));
                                    })
                                    $.ajax(
                                        {
                                            url: '/admin/ajax/save_sub_category_sort',
                                            data: 'ids=' + listId,
                                            type: 'POST',
                                            dataType: 'json',
                                            success: function (resp) {
                                            }
                                        }
                                    )
                                }
                            })
                        }
                    }
                )
            })
        })
    </script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Подкатегории объекта</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Сортировка подкатегорий
                </div>
                <div class="form-group">
                        <select class="form-control" name="idc" id="idc">
                            <option>Укажите родительскую категорию</option>
                        <?php foreach($list_category as $lc){?>
                            <option value="<?= $lc['id_category']?>"><?= $lc['name']?></option>
                        <?php }?>
                        </select>
                    </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ol class="category">


                    </ol>

                </div>
                <!-- /.table-responsive -->
                <a href="/admin/sub_category" class="btn btn-primary">Готово</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>