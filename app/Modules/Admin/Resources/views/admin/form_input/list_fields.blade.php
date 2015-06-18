<label for="input-text" class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
    <?php
    $files = scandir('../app/Modules/Admin/Resources/views/admin/list_column/');
    ?>
    <div class="well cloner">
        <div class="items js_items">
            <div class="row item" style="display:none">
                <div class="col-sm-3">
                    <select name="{{ $name }}[input][]" class="form-control">
                        @foreach ($files as $file)
                            @if (!in_array($file, ['.', '..']))
                                <option>{{ substr($file, 0, -10) }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="{{ $name }}[name][]" class="form-control col-sm-6" placeholder="Имя колонки">
                </div>
                <div class="col-sm-3">
                    <input type="text" name="{{ $name }}[label][]" class="form-control col-sm-6" placeholder="Лейбл колонки">
                </div>
                <div class="col-sm-1">
                    <a class="js_rem_item"><i class="fa fa-times input-icon"></i></a>
                </div>
            </div>
        </div>
        <a class="btn btn-info js_add_item"><i class="fa fa-plus"></i> &nbsp; Добавить колонку</a>
    </div>
</div>