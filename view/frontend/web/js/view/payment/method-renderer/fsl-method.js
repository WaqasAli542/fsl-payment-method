/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/* @api */
define([
    'Magento_Checkout/js/view/payment/default',
    'jquery',
    'mage/validation'
], function (Component, $) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Waqas_FslPayment/payment/fslpayment-form',
        },

        getCode:function () {
            return 'fslpayment';
        },

        /**
         * @return {Object}
         */
        getData: function () {
            return {
                method: this.item.method,
                'additional_data': null
            };
        },
    });
});
