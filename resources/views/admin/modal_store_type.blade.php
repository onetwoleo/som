<div class="modal fade" id="modal_add_type" tabindex="-1" role="dialog" aria-labelledby="store_ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="store_ModalLabel">Добавление новой категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ route('store_type') }}">
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
                <div class="modal-footer">
                    <button class="btn btn-md btn-outline-success" type="submit">Сохранить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
