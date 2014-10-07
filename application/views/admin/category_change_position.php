<div id="page-wrapper" style="min-height: 704px;">
    <script type="text/javascript">
        $(function () {
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
                            url: '/admin/ajax/save_category_sort',
                            data: 'ids=' + listId,
                            type: 'POST',
                            dataType: 'json',
                            success: function (resp) {
                            }
                        }
                    )
                }
            })
        })
    </script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Главные категории объекта</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Сортировка категорий
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ol class="category">

                        <?php if (sizeof($data) > 0) {
                            foreach ($data as $d) {
                                ?>
                                <li data-id="<?= $d['id_category'] ?>"><?= $d['name'] ?></li>
                            <?php
                            }
                        }?>
                    </ol>

                </div>
                <!-- /.table-responsive -->
                <a href="/admin/category" class="btn btn-primary">Готово</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>