<?php

namespace Waqas\FslPayment\Model;

use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Model\Order\Payment;

class FslPayment extends \Magento\Payment\Model\Method\AbstractMethod
{
    const PAYMENT_METHOD_FSL_PAYMENT = 'fslpayment';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::PAYMENT_METHOD_FSL_PAYMENT;

    protected $_isOffline = true;


    /**
     * Validate payment method information object
     *
     * @return $this
     * @throws LocalizedException
     * @api
     * @since 100.2.3
     */
    public function validate()
    {
        parent::validate();

        $paymentInfo = $this->getInfoInstance();
        if ($paymentInfo instanceof Payment) {
            $subTotal = $paymentInfo->getOrder()->getSubtotal();
        } else {
            $subTotal = $paymentInfo->getQuote()->getTotals()['subtotal']->getValue();
        }

        if ($subTotal % 2 != 0) {
            throw new LocalizedException(__('Product Price is not even number.'));
        }

        return $this;
    }
}
