jQuery(document).ready(function($) {
    $('#add-coupon').on('click', function() {
        var rowCount = $('#coupons-repeater tbody tr').length;
        var newRow = '<tr>' +
            '<td><input type="text" name="sp_coupons[' + rowCount + '][name]" value="" /></td>' +
            '<td><input type="text" name="sp_coupons[' + rowCount + '][basic_price]" value="" /></td>' +
            '<td><input type="text" name="sp_coupons[' + rowCount + '][total_price]" value="" /></td>' +
            '<td><button type="button" class="button remove-coupon">Remove</button></td>' +
            '</tr>';
        $('#coupons-repeater tbody').append(newRow);
    });

    $('#coupons-repeater').on('click', '.remove-coupon', function() {
        $(this).closest('tr').remove();
    });
});