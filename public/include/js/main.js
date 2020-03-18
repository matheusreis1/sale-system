$('#delete-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('item');
    var title = button.data('title');

    var modal = $(this);
    modal.find('.modal-title').text('Delete '+title+' #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})