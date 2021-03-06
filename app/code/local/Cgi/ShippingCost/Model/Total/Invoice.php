<?php

/**
 * ShippingCost Total Quote model
 *
 * @category   Cgi
 * @package    Cgi_Blog
 * @author     Nazymko Rostyslav CGI Trainee group beta
 */
class Cgi_ShippingCost_Model_Total_Invoice extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $amount = 0;
        $orders = $invoice->getOrder()->getAllItems();
        foreach($orders as $item){
            $amount += $item->getAdditionalShippingCost();
        }
        if ($amount) {
            $invoice->setGrandTotal($invoice->getGrandTotal() + $amount);
            $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $amount);
        }

        return $this;
    }
}