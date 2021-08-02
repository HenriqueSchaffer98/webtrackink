function showModal() {
    alert('asdas');
    $(document).ready(function () {
        $('a[data-confirm]').click(function (ev) {
            var href = $(this).attr('href');
            if (!$('#confirm-delete').length) {
                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Excluir Registro</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">em Certeza que deseja excluir o Registro?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><a class="btn btn-primary" id="dataConfirmOk">Save changes</a></div></div></div>/div>');
            }
            $('#dataConfirmOk').attr('href', href);
            $('#confirm-delete').modal({ shown: true });
            return false;
        });
    });
}