require('./bootstrap');
$('#Modal').on('show.bs.modal', event => {
    var order = $(event.relatedTarget).data('order');
    modalBody = $(this).find('.modal-body');
    // show loading spinner while waiting for ajax to be done
    modalBody.html(`
    <div class="text-center">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  `);

    $.ajax({
        url: `/doctor_who/${order}`, // the url for your show method
        method: 'get'
    })
        .done(view => modalBody.html(view))
        .fail(error => console.error(error));
});
