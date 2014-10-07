<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Редактирование партнера</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-users"></i> Партнеры</li>
                <li class=""> Редактирование партнера</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Название слайда</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="description">Описание партнера</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $data['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Загрузить новое изображение</label>
                    <input type="file" id="img" name="img">
                    <p class="help-block">Для лучшего отображения <strong>желательно</strong>, чтобы изображение имело следующие размеры: 260px - ширина, 120px - высота.</p>
                </div>

                <button type="submit" class="btn btn-success">Сохранить изменения</button>
            </form>
        </div>
    </div>

    <hr class="divider">
    <a class="btn btn-default" href="/admin/ctrl_partners">Обратно</a>
</div>