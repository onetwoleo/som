{{--Модальное окно редактирования мероприятия--}}
<div class="modal fade" tabindex="-1" role="dialog" id="modal_update_type">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование категории</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" id="edit_form_type">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name='name' placeholder="Название"
                                   autofocus required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-success btn-md">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

