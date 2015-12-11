<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\BraintreeTwo\Observer;

use Magento\Framework\Event\Observer;
use Magento\Payment\Observer\AbstractDataAssignObserver;

/**
 * Class DataAssignObserver
 */
class DataAssignObserver extends AbstractDataAssignObserver
{
    const PAYMENT_METHOD_NONCE = 'payment_method_nonce';

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $data = $this->readDataArgument($observer);

        $paymentInfo = $this->readPaymentModelArgument($observer);
        if ($data->getDataByKey(self::PAYMENT_METHOD_NONCE) !== null) {
            $paymentInfo->setAdditionalInformation(
                self::PAYMENT_METHOD_NONCE,
                $data->getDataByKey(self::PAYMENT_METHOD_NONCE)
            );
        }
    }
}
