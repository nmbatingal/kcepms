/*** MODAL CREATE NEW PR TRACKER ***/
$(document).on('click', '#lnk-reset-password', function(e) {
    e.preventDefault();
    
    $('#modal-reset-password').modal('show')
        .find('#modal-content')
        .load($(this).attr('href'));
});

/*** MODAL CREATE NEW PR TRACKER ***/
$(document).on('click', '#btn-create-tracker', function(e) {
    e.preventDefault();

    $('#modal-create-tracker').modal('show');
});

/*** MODAL CREATE NEW PR ***/
$(document).on('click', '#btn-create-pr', function(e) {
    e.preventDefault();

    $('#modal-create-tracker').modal('show');
});