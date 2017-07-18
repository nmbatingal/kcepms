/*** MODAL CREATE NEW PR TRACKER ***/
$(document).on('click', '#btn-create-tracker', function(e) {
    e.preventDefault();
    console.log($(this));
    $('#modal-create-tracker').modal('show');
});

/*** MODAL CREATE NEW PR ***/
$(document).on('click', '#btn-create-pr', function(e) {
    e.preventDefault();
    console.log($(this));
    $('#modal-create-tracker').modal('show');
});