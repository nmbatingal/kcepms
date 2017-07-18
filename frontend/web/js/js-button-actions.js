/*** REFRESH SPINNER ***/
function spinRefresh() {
    var $refresh = '<div style="text-align:center;padding-top: 25%;" class="overlay">' +
                '<h3><i class="fa fa-refresh fa-spin" style="color:#1ab394"></i></h3>' +
            '</div>';

    return $refresh;
}

function spinRefreshTop() {
    var $refresh = '<div style="text-align:center;" class="overlay">' +
                '<h3><i class="fa fa-refresh fa-spin" style="color:#1ab394"></i></h3>' +
            '</div>';

    return $refresh;
}

/*** LEFT MENU LINK ACTIONS ***/
$(document).on('click', '.btn-left-menu', function(event, jqXHR, settings) {
    event.preventDefault();
    var button = $(this);
    var link   = $('a', button).attr('href');

    $('.btn-left-menu').removeClass('active');
    $('.btn-left-menu-many').removeClass('active');
    $('.treeview-menu').removeClass('menu-open');
    $('.treeview-menu').attr('style', 'display:none');
    $('.btn-left-menu-child').removeClass('active');
    button.addClass('active');

    $('.content-wrapper').html(spinRefresh());

    $.ajax({
        url: link,
        type: 'POST',
        success: function(data) {
            $('.content-wrapper').html(data.html);
            $(document).prop('title', data.title);
            window.history.pushState(null, data.url, data.url);
        },
        error: function(xhr, textStatus, errorThrown){
            alert('request failed');
        }
    });
});

/*** LEFT MENU LINK ACTIONS ***/
$(document).on('click', '.btn-left-menu-many', function(event, jqXHR, settings) {
    event.preventDefault();
    var button = $(this);

    $('.btn-left-menu').removeClass('active');
    $('.btn-left-menu-many').removeClass('active');
    button.addClass('active');
});

/*** LEFT MENU LINK ACTIONS ***/
$(document).on('click', '.btn-left-menu-child', function(event, jqXHR, settings) {
    event.preventDefault();
    var button = $(this);
    var link   = $('a', button).attr('href');

    $('.btn-left-menu-child').removeClass('active');
    button.addClass('active');

    $('.content-wrapper').html(spinRefresh());

    $.ajax({
        url: link,
        type: 'POST',
        success: function(data) {

            $('.content-wrapper').html(data.html);
            $(document).prop('title', data.title);
            window.history.pushState(null, data.url, data.url);
        },
        error: function(xhr, textStatus, errorThrown){
            alert('request failed');
        }
    });
});

/*** PAGE CONTENT BUTTON ACTIONS ***/
$(document).on('click', '.btn-link-page', function(event, jqXHR, settings) {

    event.preventDefault();
    var button = $(this);
    var link   = button.attr('href');

    $('.content-wrapper').html(spinRefresh());

    $.ajax({
        url: link,
        type: 'GET',
        success: function(data) {

            $('.content-wrapper').html(data.html);
            $(document).prop('title', data.title);
            window.history.pushState(null, data.url, data.url);
        },
        error: function(xhr, textStatus, errorThrown){
            alert('request failed');
            console.log(errorThrown);
        }
    });
});

/*** ADDING PPMP CATEGORY ITEMS  ***/
$(document).on('click', '#btn-add-cat-ppmp', function(e) {

    var rows  = $('tr.ppmp-category-row').length;
    var $ppmpCategory = function () {
        var tmp = null;
        $.ajax({
            'async': false,
            'type': "GET",
            'global': false,
            'dataType': 'html',
            'url': "/kc-epms/backend/web/index.php?r=select/ppmp-category-options",
            'success': function (data) {
                tmp = data;
            }
        });
        return tmp;
    }();

    var $prMode = function () {
        var tmp = null;
        $.ajax({
            'async': false,
            'type': "GET",
            'global': false,
            'dataType': 'html',
            'url': "/kc-epms/backend/web/index.php?r=select/pr-mode-options",
            'success': function (data) {
                tmp = data;
            }
        });
        return tmp;
    }();


    var $html = '<tr class="ppmp-category-row">' +
                    '<td class="col-1">' +
                        '<div class="form-group field-ppmp-ppmp_category_id-'+rows+' required">' +
                            '<select id="ppmp-ppmp_category_id-'+rows+'" class="form-control borderless" name="Ppmp[ppmp_category_id]['+rows+']" aria-invalid="false">' + $ppmpCategory + '</select>' +
                            '<div class="help-block"></div>' +
                        '</div>' +
                    '</td>' +
                    '<td class="col-2">' +
                        '<div class="form-group field-ppmp-size_quantity-'+rows+'">' +
                            '<input type="number" id="ppmp-size_quantity-'+rows+'" class="form-control borderless" name="Ppmp[size_quantity]['+rows+']" placeholder="0" step="0.01" min="0">' +
                            '<div class="help-block"></div>' +
                        '</div>' +
                    '</td> ' +
                    '<td class="col-3">' +
                        '<div class="form-group field-ppmp-budget-'+rows+'">' +
                            '<input type="number" id="ppmp-budget-'+rows+'" class="form-control borderless" name="Ppmp[budget]['+rows+']" placeholder="0.00" step="0.01" min="0">' +
                            '<div class="help-block"></div>' +
                        '</div>' +
                        '<div class="form-group field-ppmp-deduction-'+rows+'">' +
                            '<input type="hidden" id="ppmp-deduction-'+rows+'" class="form-control borderless" name="Ppmp[deduction]['+rows+']" value="0">' +
                            '<div class="help-block"></div>' +
                        '</div>' +
                    '</td>' +
                    '<td class="col-4">' +
                        '<div class="form-group field-ppmp-ppmp_mode_id-'+rows+'">' +
                            '<select id="ppmp-ppmp_mode_id-'+rows+'" class="form-control borderless" name="Ppmp[ppmp_mode_id]['+rows+']">'+$prMode+'</select>' +
                            '<div class="help-block"></div>' +
                        '</div>' +
                    '</td>' +
                    '<td class="col-5">' +
                        '<button type="button" class="btn btn-sm btn-flat btn-danger btn-remove-cat-ppmp">' +
                            '<i class="glyphicon glyphicon-remove"></i>' +
                        '</button>' +
                    '</td>' +
                '</tr>';

    $('#ppmp-category').append($html);
});

/*** REMOVE PPMP CATEGORY ITEMS ***/
$(document).on('click', '.btn-remove-cat-ppmp', function(event, jqXHR, settings) {
    var $target = $(this).closest('tr');

    $target.hide('slow', function(){ $target.remove(); });
});

/*** PR TRACKER LOAD MORE TRACKERS ***/
$(document).on('click','.show_more',function(){
    var ID = $(this).attr('id');
    $('.show_more').hide();
    $('.loding').show();
    $.ajax({
        type:'POST',
        url:'ajax_more.php',
        data:'id='+ID,
        success:function(html){
            $('#show_more_main'+ID).remove();
            $('.tutorial_list').append(html);
        }
    }); 
});

/*** PR ITEMS SELECT LABEL OPTIONS ***/
$(document).on('change','.select-label',function(event, jqXHR, settings) {
    var option   = this.value;
    var label    = $('input.group-label');
    var label_ct = label.length;
    var row_ct   = $('#row-count').val();

    if ( option == 1 ) {
        var $html = '<tr class="pr-labels">' +
                        '<td class="col-1"></td>' +
                        '<td class="col-2"></td>' +
                        '<td class="col-3" colspan="2">' +
                            '<input id="group-label-' + label_ct + '" type="text" name="label" class="group-label" placeholder="Label"></td>' +
                        '<td class="col-5"></td>' +
                        '<td class="col-6"></td>' +
                        '<td class="col-7"></td>' +
                        '<td class="col-8">' +
                            '<button type="button" class="btn btn-sm btn-danger btn-remove-item"><i class="fa fa-remove"></i></button>' +
                        '</td>' +
                    '</tr>';

        $($html).insertBefore('.tab-option');

    } else if ( option == 2 ) {

        $('#modal-pr-ppmp').modal('show')
            .find('#select-program').val('').end()
            .find('#select-category').val('').end()
            .find('#select-ppmp').val('').end()
            .find('#ppmp-table').html('').end();
    }

    this.value = 0;
});

/*** MODAL CREATE NEW PR ***/
function modalPpmp(thisInput) {

    $('#modal-pr-ppmp').modal('show');
}

/*** MODAL SELECT PROGRAM FUNCTION ***/
function selectProgram(thisInput) {
    var program    = $(thisInput).val();

    if ($.trim(program) === "")
    {
        $('select#select-category').attr('disabled', 'disabled');
        $('select#select-ppmp').attr('disabled', 'disabled');
        $('div#ppmp-table').html('');
    } else {
        $('select#select-category').removeAttr('disabled');
    }
}

/*** MODAL SELECT ITEM TYPE FUNCTION ***/
function selectItemType(thisInput) {
    var itemType    = $('select#select-category').val();
    var program     = $('select#select-program').val();
    var date        = $('input#input-date').val();
    var href        = $(thisInput).attr('data-href');

    $('div#ppmp-table').html('');
    if ($.trim(itemType) === '') {
        $('select#select-ppmp').attr('disabled', 'disabled');
    } else {
        $.ajax({
            url: href,
            type: 'POST',
            data: {
                'itemType'  : itemType,
                'program'   : program,
                'date'      : date,
            },
            success: function(data) {
                if ( data.result ) {
                    $('select#select-ppmp').removeAttr('disabled');
                    $('select#select-ppmp').html(data.ppmp);
                } else {
                    $('select#select-ppmp').attr('disabled', 'disabled');
                    $('div#ppmp-table').html('');
                }
            },
            error: function(xhr, textStatus, errorThrown){
                alert(errorThrown);
            }
        });
    }
}

/*** MODAL SELECT PPMP ITEMS FUNCTION ***/
function ppmpListItems(thisInput, url) {
    var select  = $(thisInput).val();
    var href    = url;

    $('div#ppmp-table').html(spinRefreshTop());

    $.ajax({
        url: href,
        type: 'POST',
        data: {
            'ppmp_id' : select,
        },
        success: function(data) {
            $('div#ppmp-table').html(data);
        },
        error: function(xhr, textStatus, errorThrown){
            alert(errorThrown);
        }
    });
}

/*** BUTTON MODAL SELECT PPMP PR ITEM ***/
$(document).on('click','.btn-add-pr-item',function(event, jqXHR, settings) {
    var button   = $(this);
    var label    = $('input.group-label');
    var label_ct = label.length;
    var row_ct   = $('#row-count').val();
    var label_id;

    // PPMP PR ITEMS SELECTED
    var split_id = button.attr('data-id').split('-');
    var id       = split_id[2];
    var unit     = $('input#unit-'+id).val();
    var item_id  = $('input#ppmp_item_id-'+id).val();
    var category = $('select#select-category option:selected');
    var descr    = $('input#description-'+id).val();
    var quantity = $('input#quantity-'+id).val();
    var price    = $('input#price-'+id).val();
    var total    = $('input#total-'+id).val();
    var ppmp_id  = $('input#ppmp_id-'+id).val();

    if ( label.length == 0 ) {
        label_id = '';
    } else {
        label_ct = parseInt(label_ct - 1);
        label_id = $('#group-label-' + label_ct).val();
    }

    var $html    = '<tr id="row-' + row_ct + '" class="pr-items">' +
                        '<td class="col-1">' +
                            '<input id="category-' + row_ct + '" type="text" name="category" value="'+category.text()+'">' +
                            '<input id="item-type-' + row_ct + '" type="hidden" name="PrItemDetails[item_type][]" value="'+category.val()+'">' +
                            '<input id="label-' + row_ct + '" type="hidden" name="PrItemDetails[group_label][]" value="' + label_id + '">' +
                            '<input id="ppmp-id-' + row_ct + '" type="hidden" name="PrItemDetails[ppmp_id][]" value="' + ppmp_id + '">' +
                        '</td>' +
                        '<td class="col-2">' +
                            '<input id="unit-id-' + row_ct + '" type="text" name="PrItemDetails[unit_id][]" class="unit-id" placeholder="unit" value="'+unit+'">' +
                        '</td>' +
                        '<td class="col-3">' +
                            '<input id="item-id-' + row_ct + '" type="hidden" name="PrItemDetails[ppmp_item_original_id][]" value="'+item_id+'">' +
                            '<input id="item-description-' + row_ct + '" type="text" class="item-description" name="PrItemDetails[item_description][]" min="0" step="0.01" placeholder="item_description" value="'+descr+'">' +
                        '</td>' +
                        '<td class="col-4">' +
                            '<input id="add-description-' + row_ct + '" type="text" class="add-description" name="PrItemDetails[add_description][]" min="0" step="0.01" placeholder="(no. of dates)" onkeyup="changeDays(this)">' +
                        '</td>' +
                        '<td class="col-5">' +
                            '<input id="item-quantity-' + row_ct + '" type="number" class="quantity" name="PrItemDetails[quantity][]" min="0" step="1" value="'+quantity+'" onkeyup="changeQuantity(this)">' +
                        '</td>' +
                        '<td class="col-6">' +
                            '<input id="item-price-' + row_ct + '" type="number" name="PrItemDetails[item_price][]" min="0" step="0.01" value="'+price+'" onkeyup="changePrice(this)">' +
                        '</td>' +
                        '<td class="col-7">' +
                            '<input id="item-total-' + row_ct + '" type="number" class="item-total" name="PrItemDetails[total_amount][]" min="0" step="0.01" value="'+total+'" readonly="readonly">' +
                        '</td>' +
                        '<td class="col-8">' +
                            '<button type="button" class="btn btn-sm btn-danger btn-remove-item"><i class="fa fa-remove"></i></button>' +
                        '</td>' +
                   '</tr>';

    $($html).insertBefore('.tab-option');
    $('#row-count').val( parseInt(row_ct) + 1 );

    button.html('<i class="fa fa-remove"></i>');
    button.removeClass('btn-success btn-add-pr-item');
    button.addClass('btn-danger btn-remove-pr-item');
    button.attr('id', 'row-' + row_ct);

    finalTotalCost();
});

/*** BUTTON MODAL REMOVE PR ITEMS REMOVE ***/
$(document).on('click', '.btn-remove-pr-item', function(event, jqXHR, settings) {
    var button  = $(this);
    var id      = button.attr('id');

    $('tr#'+id).remove();

    button.html('<i class="fa fa-plus"></i>');
    button.removeClass('btn-danger btn-remove-pr-item');
    button.addClass('btn-success btn-add-pr-item');
    button.removeAttr('id');

    finalTotalCost();
});

/*** MODAL QUANTITY FUNCTION ***/
function modalQuantity(thisInput) {
    var input       = $(thisInput);
    var id_split    = input.attr('id').split('-');
    var id          = id_split[1];
    var price       = $('input#price-'+id).val();
    var qty         = input.val();
    var total       = 0;

    total = qty * price;
    if ( total > 0 ) {
        $('input#total-'+id).val(parseFloat(total).toFixed(2));
    } else {
        $('input#total-'+id).val('0.00');
    }

    finalTotalCost();
}

/*** MODAL PPMP ITEM OVERVIEW ***/
$(document).on('click', '.link-ppmp-item', function(e) {
    e.preventDefault();
    var href = $(this).attr('href');
    $('div#item-overview').html(spinRefreshTop());

    $.ajax({
        url: href,
        type: 'GET',
        success: function(data) {
            $('div#item-overview').html(data);
        },
        error: function(xhr, textStatus, errorThrown){
            alert(errorThrown);
        }
    });
});

/*** BUTTON REMOVE PR ITEMS REMOVE ***/
$(document).on('click', '.btn-remove-item', function(event, jqXHR, settings) {
    var $target = $(this).closest('tr');

    $target.hide('slow', function() { 
        $target.remove();
        finalTotalCost();
    });
});

/*** FUNCTION FOR SUM TOTAL ***/
function finalTotalCost() {
    var total = 0;

    $("input.item-total").each(function(i)
    {
        if ( $(this).val() != "") {
            total += parseFloat($(this).val());
        }
    });

    if ( total > 0 ) {
        $('input.final-total').val(total.toFixed(2));
    } else {
        $('input.final-total').val('0.00');
    }
}

/*** FUNCTION FOR ADDING PR ITEMS DAYS ***/
function changeDays(thisInput) {
    var id_split    = $(thisInput).attr('id').split('-');

    var id          = id_split[2];
    var day_string  = $('input#add-description-' + id).val().split(' ');
    var days        = day_string[0];
    var qty         = $('input#item-quantity-' + id ).val();
    var price       = $('input#item-price-' + id ).val();
    var amount      = $('input#item-total-' + id );
    var total       = 0;

    if ($.trim(days) === "") {
        days        = 1;
        $('input#add-description-' + id ).val('');
    } else if ( days < 2 ) {
        days        = 1;
        $('input#add-description-' + id ).val('');
    }

    if ($.trim(qty) === "") {
        qty    = 0;
        $('input#item-quantity-' + id ).val(0);
    }

    if ($.trim(price) === "") {
        price  = 0;
    }

    total = days * (qty * price);

    if ( total > 0 ) {
        amount.val(parseFloat(total).toFixed(2));
    } else {
        amount.val('0.00');
    }

    finalTotalCost();
}

/*** FUNCTION FOR ADDING PR ITEMS QUANTITY ***/
function changeQuantity(thisInput) {
    var id_split    = $(thisInput).attr('id').split('-');

    var id          = id_split[2];
    var day_string  = $('input#add-description-' + id).val().split(' ');
    var days        = day_string[0];
    var qty         = $('input#item-quantity-' + id ).val();
    var price       = $('input#item-price-' + id ).val();
    var amount      = $('input#item-total-' + id );
    var total       = 0;

    if ($.trim(days) === "") {
        days        = 1;
        $('input#add-description-' + id ).val('');
    } else if ( days < 2 ) {
        days        = 1;
        $('input#add-description-' + id ).val('');
    }

    if ($.trim(qty) === "") {
        qty    = 0;
        $('input#item-quantity-' + id ).val(0);
    }

    if ($.trim(price) === "") {
        price  = 0;
    }

    total = days * (qty * price);

    if ( total > 0 ) {
        amount.val(parseFloat(total).toFixed(2));
    } else {
        amount.val('0.00');
    }

    finalTotalCost();
}

/*** FUNCTION FOR ADDING PR ITEMS PRICE ***/
function changePrice(thisInput) {
    var id_split    = $(thisInput).attr('id').split('-');

    var id          = id_split[2];
    var day_string  = $('input#add-description-' + id).val().split(' ');
    var days        = day_string[0];
    var qty         = $('input#item-quantity-' + id ).val();
    var price       = $('input#item-price-' + id ).val();
    var amount      = $('input#item-total-' + id );
    var total       = 0;

    if ($.trim(days) === "") {
        days        = 1;
        $('input#add-description-' + id ).val('');
    } else if ( days < 2 ) {
        days        = 1;
        $('input#add-description-' + id ).val('');
    }

    if ($.trim(qty) === "") {
        qty    = 0;
    }

    if ($.trim(price) === "") {
        price  = 0;
        $('input#item-price-' + id ).val('0.00');
    }

    total = days * (qty * price);

    if ( total > 0 ) {
        amount.val(parseFloat(total).toFixed(2));
    } else {
        amount.val('0.00');
    }

    finalTotalCost();
}

/*** SPPMP PR ITEMS SELECT LABEL OPTIONS ***/
$(document).on('change','.select-label-sppmp',function(event, jqXHR, settings) {
    var option   = this.value;
    var label    = $('input.group-label');
    var label_ct = label.length;
    var row_ct   = $('#row-count').val();

    if ( option == 1 ) {
        var $html = '<tr class="pr-labels">' +
                        '<td class="col-1"></td>' +
                        '<td class="col-2" colspan="2">' +
                            '<input id="group-label-' + label_ct + '" type="text" name="label" class="group-label" placeholder="Label"></td>' +
                        '<td colspan="16"></td>' +
                        '<td class="col-8">' +
                            '<button type="button" class="btn btn-sm btn-danger btn-remove-item"><i class="fa fa-remove"></i></button>' +
                        '</td>' +
                    '</tr>';


    } else if ( option == 2 ) {

        if ( label.length == 0 ) {
            label_id = '';
        } else {
            label_ct = parseInt(label_ct - 1);
            label_id = $('#group-label-' + label_ct).val();
        }

        var $html = '<tr id="row-'+row_ct+'" class="pr-items">' +
                        '<td class="col-1">' +
                            '<select id="item-type-'+row_ct+'" name="PrItemSppmpDetails[item_type][]">' +
                                '<option value="">Item Category</option>' +
                                '<option value="0">Goods and Supplies</option>' +
                                '<option value="1">Catering Services</option>' +
                                '<option value="2">Consulting Services</option>' +
                                '<option value="3">Non-consulting Services</option>' +
                            '</select>' +
                            '<input type="hidden" id="label-'+row_ct+'" name="PrItemSppmpDetails[group_label][]" value="'+label_id+'">' +
                        '</td>' +
                        '<td class="col-2">' +
                            '<input type="text" id="item-description-'+row_ct+'" class="item-description" name="PrItemSppmpDetails[item_description][]" min="0" step="0.01" placeholder="item_description">' +
                        '</td>' +
                        '<td class="col-3">' +
                            '<input type="text" id="add-description-'+row_ct+'" class="add-description" name="PrItemSppmpDetails[add_description][]" min="0" step="0.01" placeholder="(no. of dates)" onkeyup="sppmpDays(this)">' +
                        '</td>' +
                        '<td class="col-4">' +
                            '<input type="text" id="unit-'+row_ct+'" class="unit" name="PrItemSppmpDetails[unit_id][]" placeholder="unit">' +
                        '</td>' +
                        '<td class="col-5">' +
                            '<input type="number" id="january-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[january][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-6">' +
                            '<input type="number" id="february-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[february][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-7">' +
                            '<input type="number" id="march-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[march][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-8">' +
                            '<input type="number" id="april-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[april][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-9">' +
                            '<input type="number" id="may-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[may][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-10">' +
                            '<input type="number" id="june-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[june][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-11">' +
                            '<input type="number" id="july-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[july][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-12">' +
                            '<input type="number" id="august-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[august][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-13">' +
                            '<input type="number" id="september-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[september][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-14">' +
                            '<input type="number" id="october-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[october][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-15">' +
                            '<input type="number" id="november-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[november][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-16">' +
                            '<input type="number" id="december-'+row_ct+'" class="month-input month-'+row_ct+'" name="PrItemSppmpDetails[december][]" value="0" step="1" min="0" onkeyup="sppmpMonth(this)">' +
                        '</td>' +
                        '<td class="col-17">' +
                            '<input type="number" id="quantity-'+row_ct+'" class="quantity" name="PrItemSppmpDetails[quantity][]" readonly="readonly" value="0" min="0" step="1" placeholder="0">' +
                        '</td>' +
                        '<td class="col-18">' +
                            '<input type="number" id="item-price-'+row_ct+'" name="PrItemSppmpDetails[item_price][]" min="0" step="0.01" placeholder="0.00" onkeyup="sppmpPrice(this)">' +
                        '</td>' +
                        '<td class="col-19">' +
                            '<input type="number" id="total-amount-'+row_ct+'" class="item-total" name="PrItemSppmpDetails[total_amount][]" readonly="readonly" min="0" step="0.01" placeholder="0.00">' +
                        '</td>' +
                        '<td class="col-20">' +
                            '<button type="button" class="btn btn-sm btn-danger btn-remove-item"><i class="fa fa-remove"></i></button>' +
                        '</td>' +
                    '</tr>';

        $('#row-count').val( parseInt(row_ct) + 1 );
    }

    $($html).insertBefore('.tab-option');

    this.value = 0;
});

/*** FUNCTION FOR ADDING PR ITEMS DAYS SPPMP ***/
function sppmpDays(thisInput) {
    var id_split    = $(thisInput).attr('id').split('-');
    var id          = id_split[2];
    var day_string  = $('input#add-description-' + id).val().split(' ');
    var days        = day_string[0];
    var price       = $('input#item-price-' + id ).val();
    var amount      = $('input#total-amount-' + id );
    var qty         = 0;
    var total       = 0;

    if ($.trim(days) === "") {
        days        = 1;
        $('input#add-description-' + id ).val('');
    } else if ( days < 2 ) {
        days        = 1;
        $('input#add-description-' + id ).val('');
    }

    if ($.trim(qty) === "") {
        qty    = 0;
        $('input#item-quantity-' + id ).val(0);
    }

    if ($.trim(price) === "") {
        price  = 0;
    }

    $('input.month-'+id).each(function(i)
    {
        if ( $(this).val() != "") {
            qty += parseFloat($(this).val());
        }
    });

    total = days * (qty * price);

    if ( total > 0 ) {
        amount.val(parseFloat(total).toFixed(2));
    } else {
        amount.val('0.00');
    }

    finalTotalCost();
}

/*** FUNCTION FOR ADDING MONTHS SPPMP ***/
function sppmpMonth(thisInput) {
    var month       = $(thisInput);
    var id_split    = $(thisInput).attr('id').split('-');
    var id          = id_split[1];
    var day_string  = $('input#add-description-' + id).val().split(' ');
    var days        = day_string[0];
    var price       = $('input#item-price-' + id ).val();
    var amount      = $('input#total-amount-' + id );
    var qty         = 0;
    var total       = 0;

    if ( $.trim(month.val()) === "") {
        month.val(0);
    }

    if ($.trim(days) === "") {
        days        = 1;
        $('input#add-description-' + id ).val('');
    } else if ( days < 2 ) {
        days        = 1;
        $('input#add-description-' + id ).val('');
    }

    if ($.trim(price) === "") {
        price  = 0;
    }

    $('input.month-'+id).each(function(i)
    {
        if ( $(this).val() != "") {
            qty += parseFloat($(this).val());
        }
    });

    $('input#quantity-'+id).val(qty);
    total = days * (qty * price);

    if ( total > 0 ) {
        amount.val(parseFloat(total).toFixed(2));
    } else {
        amount.val('0.00');
    }

    finalTotalCost();
}

/*** FUNCTION ITEM PRICE SPPMP ***/
function sppmpPrice(thisInput) {
    var id_split    = $(thisInput).attr('id').split('-');
    var id          = id_split[2];
    var day_string  = $('input#add-description-' + id).val().split(' ');
    var days        = day_string[0];
    var price       = $(thisInput).val();
    var amount      = $('input#total-amount-' + id );
    var qty         = 0;
    var total       = 0;

    if ($.trim(days) === "") {
        days        = 1;
        $('input#add-description-' + id ).val('');
    } else if ( days < 2 ) {
        days        = 1;
        $('input#add-description-' + id ).val('');
    }

    if ($.trim(qty) === "") {
        qty    = 0;
        $('input#item-quantity-' + id ).val(0);
    }

    if ($.trim(price) === "") {
        price  = 0;
    }

    $('input.month-'+id).each(function(i)
    {
        if ( $(this).val() != "") {
            qty += parseFloat($(this).val());
        }
    });

    total = days * (qty * price);

    if ( total > 0 ) {
        amount.val(parseFloat(total).toFixed(2));
    } else {
        amount.val('0.00');
    }

    finalTotalCost();
}

/*** BUTTON UPDATE PR ***/
$(document).on('beforeSubmit', '#frm-update-pr', function(event, jqXHR, settings) {    
    event.preventDefault();
    var form = $(this);
    
    console.log(form.serializeArray());
    /*$.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: form.serialize(),
        success: function(data) {

            if (data.result) {
                location.reload();
                window.open(data.url, '_blank');
            }
        },
        error: function(xhr, textStatus, errorThrown){
            console.log(errorThrown);
        }
    });*/

    $('#modal-update-pr').modal('toggle');
    return false;
});

/*** BUTTON PRINT PR ***/
$(document).on('click','#btn-print-pr',function(event, jqXHR, settings) {
    event.preventDefault();
    var $href  = $(this).attr('href');
    var target = window.open( $href, 'PR','directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=800,height=800');

    target.print();
});