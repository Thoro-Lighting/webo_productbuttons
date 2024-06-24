$(() => {
    $('.js-webo-admin-products-input').on('change', function () {
        const $updateField = $('.js-send-webo-product-buttons-update');

        if ($updateField.val() != 1) {
            $updateField.val(1);
        }

    });
});
