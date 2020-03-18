$('#delete-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('product');

    var modal = $(this);
    modal.find('.modal-title').text('Delete Product #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})