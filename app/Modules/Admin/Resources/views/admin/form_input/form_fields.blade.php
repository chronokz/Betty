<label for="input-text" class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">

    <div class="well cloner">
        <div class="items js_items">
            <div class="row">
                <div class="col-sm-1">Языковое</div>
                <div class="col-sm-2">Как показать в списке</div>
                <div class="col-sm-2">Тип поля в форме</div>
                <div class="col-sm-2">Системное имя</div>
                <div class="col-sm-2">Лейбл для поля</div>
                <div class="col-sm-2">Тип в базе</div>
            </div>
            <div class="row item" style="display:none">
                <div class="col-sm-1">
                    <select name="{{ $name }}[lang][]" class="form-control">
                        <option value="0">Нет</option>
                        <option value="1">Да</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="{{ $name }}[list][]" class="form-control">
                        <option value="">- Не показывать -</option>
                        <?php
                            $files = scandir('../app/Modules/Admin/Resources/views/admin/list_column/');
                        ?>
                        @foreach ($files as $file)
                            @if (!in_array($file, ['.', '..', 'buttons.blade.php']))
                                <option>{{ substr($file, 0, -10) }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <select name="{{ $name }}[input][]" class="form-control">
                    <?php
                        $files = scandir('../app/Modules/Admin/Resources/views/admin/form_input/');
                    ?>
                    @foreach ($files as $file)
                        @if (!in_array($file, ['.', '..', 'list_fields.blade.php', 'form_fields.blade.php', 'submit.blade.php']))
                            <option value="{{ substr($file, 0, -10) }}">{{ substr($file, 0, -10) }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="text" name="{{ $name }}[name][]" class="form-control" placeholder="Имя поля">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="{{ $name }}[label][]" class="form-control" placeholder="Лейбл поля">
                </div>
                <div class="col-sm-2">
                    <select name="{{ $name }}[type][]" class="form-control">
                        <option value="string">string</option>
                        <option value="integer">integer</option>
                        <option value="text">text</option>
                        <option value="boolean">boolean</option>
                        <option value="date">date</option>
                        <option value="dateTime">dateTime</option>
                        <option value="timestamp">timestamp</option>
                    </select>
                </div>
                <div class="col-sm-1">
                    <a class="js_rem_item"><i class="fa fa-times input-icon"></i></a>
                </div>
            </div>
        </div>
        <a class="btn btn-info js_add_item"><i class="fa fa-plus"></i> &nbsp; Добавить поле</a>
    </div>
</div>