<script>
    $(document).ready(function() {
        $('a.remove_bimg').on('click', function() {
            var elem = $(this).parent().parent().parent();
            $.ajax({
                url: $(this).attr('href'),
                type: 'POST',
                dataType: 'json',
                success: function(r){
                    console.log(r);
                    elem.remove();
                }
            })
            return false;
        })
    })
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Редактировать строительный объект "<?php echo $data['title']; ?>"</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-users"></i> Строительство</li>
                <li class=""> Редактирование строительного объекта</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $data['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Ссылка</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $data['link']; ?>">
                </div>

                <label>Загруженные изображения</label>
                <div class="row">
                    <div class="form-group">
                        <?php foreach($data['images'] as $im) { ?>
                            <div class="col-lg-3">
                                <div class="panel panel-default">
                                    <div class="panel-body building_img_small">
                                        <img src="/upload_files/building_img/<?php echo $im['img_name']; ?>">
                                        <a class="remove_bimg text-danger" href="/admin/ajax/remove_bimg/<?php echo $im['id']; ?>"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Загрузить изображения</label>
                    <input type="file" name="file[]" min="1" max="50" multiple="true">
                </div>

                <hr>
                <p class="lead">SEO (title, description, keywords) для объекта</p>
                <p class="help-block">Не заполняйте, если не знаете что это.</p>
                <div class="form-group">
                    <label for="title_seo">Заголовок (SEO)</label>
                    <input type="text" class="form-control" id="title_seo" name="title_seo" value="<?php echo $data['title_seo']; ?>">
                </div>
                <div class="form-group">
                    <label for="description_seo">Описание (SEO)</label>
                    <textarea class="form-control" id="description_seo" name="description_seo"><?php echo $data['description_seo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="keywords_seo">Ключевые слова (SEO)</label>
                    <input type="text" class="form-control" id="keywords_seo" name="keywords_seo" value="<?php echo $data['keywords_seo']; ?>">
                </div>

                <button type="submit" class="btn btn-success">Готово</button>
            </form>
        </div>
    </div>
    <hr class="divider">
    <a class="btn btn-default" href="/admin/ctrl_building">Обратно</a>
</div>