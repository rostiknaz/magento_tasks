<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_CatalogSearch
 * @copyright  Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Validator helper
 *
 * @author
 */
class Cgi_UpdatePrice_Helper_Validator extends Mage_Core_Helper_Abstract
{
    public $error;

    public function validate($option, $number)
    {
        switch ($option){
            case Cgi_UpdatePrice_Model_Price::ADD_OPTION:
                $result = $this->_validateAddSubstrOption($number);
                break;
            case Cgi_UpdatePrice_Model_Price::SUBSTR_OPTION:
                $result = $this->_validateAddSubstrOption($number);
                break;
            case Cgi_UpdatePrice_Model_Price::MULTILPE_OPTION:
                $result = $this->_validateMultipleOption($number);
                break;
            case Cgi_UpdatePrice_Model_Price::ADD_PERCENT_OPTION:
                $result = $this->_validatePercentOption($number);
                break;
            case Cgi_UpdatePrice_Model_Price::SUBSTR_PERCENT_OPTION:
                $result = $this->_validatePercentOption($number);
                break;
        }
        return $result;
    }

    private function _isNumeric($number)
    {
        if(is_numeric($number)){
            return true;
        } else {
            $this->error = 'Number not valid!';
            return false;
        }
    }

    protected function _validateMultipleOption($number){
        if($this->_isNumeric($number)) {
            if ($number > 0.1 && $number <= 10) {
                return true;
            } else {
                $this->error = 'For add and substract percent option number, should not be higher then 10';
                return false;
            }
        } else {
            return false;
        }
    }

    protected function _validatePercentOption($number){
        if($this->_isNumeric($number)) {
            if ($number > 0.1 && $number <= 100) {
                return true;
            } else {
                $this->error = 'For add and substract percent option, number should not be higher then 100';
                return false;
            }
        } else {
            return false;
        }
    }



    protected function _validateAddSubstrOption($number)
    {
        if($this->_isNumeric($number)) {
            if ($number > 0.1 && $number <= 10000) {
                return true;
            } else {
                $this->error = 'For add and substract option number, should not be higher then 10000';
                return false;
            }
        } else {
            return false;
        }
    }

    public function validateNewPrice($price)
    {
        if($this->_isNumeric($price)) {
            if ($price > 0.1) {
                return true;
            } else {
                $this->error = 'New price does not valid';
                return false;
            }
        } else {
            return false;
        }
    }

}