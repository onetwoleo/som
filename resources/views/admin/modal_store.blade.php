<div class="modal fade" id="modal_add_product" tabindex="-1" role="dialog" aria-labelledby="store_ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="store_ModalLabel">Добавление нового продукта</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ route('store_product', ['id' => $basket_id ?? '']) }}" enctype="multipart/form-data">
                    @csrf

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
                        <label for="photo" class="col-md-4 col-form-label text-md-right">Фотография</label>

                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autocomplete="photo">

                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                <div class="modal-footer">
                    <button class="btn btn-md btn-outline-success" type="submit">Сохранить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
