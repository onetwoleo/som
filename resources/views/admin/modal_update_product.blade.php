{{--Модальное окно редактирования мероприятия--}}
<div class="modal fade" tabindex="-1" role="dialog" id="modal_update_product">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование продукта</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" id="edit_form" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="fio" class="col-md-4 col-form-label text-md-right">Название</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="amount" class="col-md-4 col-form-label text-md-right">Стоимость</label>

                        <div class="col-md-6">
                            <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" required autocomplete="amount">

                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="discount" class="col-md-4 col-form-label text-md-right">Скидка</label>

                        <div class="col-md-6">
                            <input id="discount" type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" autocomplete="discount">

                            @error('discount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="weight" class="col-md-4 col-form-label text-md-right">Тип</label>

                        <div class="col-md-6">
                            <select id="type_id" class="form-control" name="type_id" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="weight" class="col-md-4 col-form-label text-md-right">Вес (грамм)</label>

                        <div class="col-md-6">
                            <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" autocomplete="weight">

                            @error('weight')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Дополнительная информация</label>

                        <div class="col-md-6">
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo" class="col-md-4 col-form-label text-md-right" id="photo-label">Фото</label>

                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autocomplete="photo">

                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

{{--                    <div class="form-group row">--}}
{{--                        <label for="new" class="col-md-4 col-form-label text-md-right">Новый</label>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <input type="hidden" name="new" value="0" />--}}
{{--                            <input type="checkbox" class="form-control checkbox" id="new" value="1" name="new">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group row">
                        <label for="new" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <label class="checkbox style-g">
                                <input type="hidden" name="new" value="0" />
                                <input type="checkbox" class="" id="new" value="1" name="new">
                                <div class="checkbox__checkmark"></div>
                                <div class="checkbox__body">Новый</div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hit" class="col-md-4 col-form-label text-md-right"></label>
                        <div class="col-md-6">
                            <label class="checkbox style-g">
                                <input type="hidden" name="hit" value="0" />
                                <input type="checkbox" class="" id="hit" value="1" name="hit">
                                <div class="checkbox__checkmark"></div>
                                <div class="checkbox__body">Хит продаж</div>
                            </label>
                        </div>
                    </div>
{{--                    <div class="form-group row">--}}
{{--                        <label for="hit" class="col-md-4 col-form-label text-md-right">Хит продаж</label>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <input type="hidden" name="hit" value="0" />--}}
{{--                            <input type="checkbox" class="" id="hit" value="1" name="hit">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                        <input type="checkbox" class="checkbox col-md-6 text-md-right" id="new" required/>--}}
{{--                        <label for="checkbox" class="col-md-6"--}}
{{--                               style="line-height: 18px; font-size: 18px; font-weight: 100; top:0;">Даю согласие на обработку персональных данных--}}
{{--                        </label>--}}


{{--                    <div class="form-group row">--}}
{{--                        <label for="new" class="col-md-4 col-form-label text-md-right">Новый</label>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <input id="new" type="checkbox" class="checkbox @error('photo') is-invalid @enderror" name="new" autocomplete="new">--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="modal-footer">
                        <button class="btn btn-outline-success btn-md">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

