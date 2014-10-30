<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <?php if ($obj['order_flag']!=0) {
//                $obj['order_date'] = human_to_unix($obj['order_date']);
//                var_dump($obj['order_date']);
                $obj['order_date'] = date("d-m-Y", $obj['order_date']);
                echo '<h1>Заказ '.$obj['id_objects'].' от '.$obj['order_date'].'</h1>';
            }else {
                echo '<h1>Создать заказ к объекту "'. $obj['name_object'] .'"</h1>';
            } ?>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                <?php if ($obj['order_flag']!=0) {?>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Номер заказа:</label>
                    <div class="col-lg-1">
                        <p class="control-label"><?php echo $obj['id_objects']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-lg-2 control-label">Дата:</label>
                        <div class="col-lg-1">
                            <p class="control-label"><?php echo $obj['order_date']; ?></p>
                        </div>
                </div>
                <?php }?>

                <hr>
                <p class="lead">Информация о покупателе</p>
                <div class="form-group">
                    <label for="buyer" class="col-lg-2 control-label">ФИО покупателя:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" id="buyer" name="buyer"
                            value="<?php if (isset($obj['buyer'])) {echo $obj['buyer']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="buyer_email" class="col-lg-2 control-label">E-mail:</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" id="buyer_email" name="buyer_email"
                            value="<?php if (isset($obj['buyer_email'])) {echo $obj['buyer_email']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="buyer_phone" class="col-lg-2 control-label">Телефон:</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control" id="buyer_phone" name="buyer_phone"
                            value="<?php if (isset($obj['buyer_phone'])) {echo $obj['buyer_phone']; }?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="additional_info" class="col-lg-2 control-label">Дополнительная информация:</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" rows="3"  id="additional_info" name="additional_info"><?php if (isset($obj['additional_info'])) {echo $obj['additional_info']; }?></textarea>
                    </div>
                </div>
                <hr>
                <p class="lead">Информация о заказе</p>
                <div class="form-group">
                    <label for="status_obj" class="col-lg-2 control-label">Статус:</label>
                    <div class="col-lg-2">
                        <select class="form-control" id="status_obj" name="status_obj">
                            <option value="">Выбрать</option>
                            <?php foreach ($status_options as $so) {
                                $check = '';
                                if (isset($obj['status_obj'])) {
                                    if ($obj['status_obj'] == $so['id'])
                                    $check = 'selected';
                                }
                                echo '<option value="'.$so['id'].'" '.$check.' >'.$so['status'].'</option>';
                            } ?>
                        </select>
                    </div>
                </div>
                <hr>
                <p class="lead">Комментарии</p>
                <div class="form-group">
                    <label for="comment" class="col-lg-2 control-label">Комментарий:</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" rows="3"  id="comment" name="comment"><?php if (isset($obj['comment'])) {echo $obj['comment']; }?></textarea>
                    </div>
                </div>

                <?php if ($obj['order_flag']==0) {?>
                <input name="order_date" hidden="hidden" value="<?php echo time(); ?>">
                <input name="order_flag" hidden="hidden" value="1">
                <?php } ?>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-4">
                        <button type="submit" class="btn btn-success">Готово</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <a class="btn btn-default" href="/admin/objects">Обратно</a>
</div>