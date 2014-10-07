<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Добавить партнера</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-users"></i> Партнеры</li>
                <li class=""> Добавить партнера</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Название партнера</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Описание партнера</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label>Загрузить изображение (лого) партнера</label>
                    <input type="file" id="img" name="img">
                    <p class="help-block">Для лучшего отображения <strong>желательно</strong>, чтобы изображение имело следующие размеры: 260px - ширина, 120px - высота.</p>
                </div>

                <button type="submit" class="btn btn-success">Готово</button>
            </form>
        </div>
    </div>
    <hr class="divider">
    <a class="btn btn-default" href="/admin/ctrl_partners">Обратно</a>
</div>