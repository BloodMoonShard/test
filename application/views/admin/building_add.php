<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Добавить строительный объект</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-users"></i> Строительство</li>
                <li class=""> Добавить строительный объект</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Ссылка</label>
                    <input type="text" class="form-control" id="link" name="link">
                </div>
                <div class="form-group">
                    <label>Загрузить изображения</label>
                    <input type="file" name="file[]" min="1" max="50" multiple="true">
                </div>

                <button type="submit" class="btn btn-success">Готово</button>
            </form>
        </div>
    </div>
    <hr class="divider">
    <a class="btn btn-default" href="/admin/ctrl_building">Обратно</a>
</div>