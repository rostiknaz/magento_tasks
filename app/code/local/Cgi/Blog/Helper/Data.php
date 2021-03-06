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
 * Blog helper
 *
 * @author
 */
class Cgi_Blog_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function uploadImage($model)
    {
        try {
            $uploader = new Varien_File_Uploader('image');
            $uploader->setAllowedExtensions(array('jpg','jpeg','gif'));
            $uploader->setAllowRenameFiles(false);
            $uploader->setFilesDispersion(false);

            $path       = Mage::getBaseDir('media') . '/uploads';
            $newName    = time() . $_FILES['image']['name'];
            if($model->getImage()){
                unlink(Mage::getBaseDir('media') . '/' . $model->getImage());
            }
            $uploader->save($path, $newName);
            return $newName;
        }catch(Exception $e) {
            echo "Exception: ".$e; exit;
        }
    }
}
