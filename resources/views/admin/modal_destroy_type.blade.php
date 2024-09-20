<div class="modal fade" id="modal_destroy_type" tabindex="-1" role="dialog" aria-labelledby="destroy_ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy_ModalLabel">Подтверждение удаления</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <p>Вы действительно хотите удалить категорию?</p>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <form action="" method="GET" class="form-horizontal" id="delete_form_type">
                            @csrf
                            <button
{{--                                onclick="{{ route('delete_record', ['record_id'=>$record->id]) }}"--}}
                                class="btn btn-md btn-outline-primary">Да
                            </button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
