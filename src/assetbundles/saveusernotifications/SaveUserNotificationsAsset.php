<?php
/**
 * Save user notifications plugin for Craft CMS 3.x
 *
 * Sends a notification out to admin whenever a user updates their details using a front-end form.
 *
 * @link      https://clive.theportman.co
 * @copyright Copyright (c) 2019 Clive Portman
 */

namespace cliveportman\saveusernotifications\assetbundles\SaveUserNotifications;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * SaveUserNotificationsAsset AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * http://www.yiiframework.com/doc-2.0/guide-structure-assets.html
 *
 * @author    Clive Portman
 * @package   SaveUserNotifications
 * @since     1.0.0
 */
class SaveUserNotificationsAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@cliveportman/saveusernotifications/assetbundles/saveusernotifications/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/SaveUserNotifications.js',
        ];

        $this->css = [
            'css/SaveUserNotifications.css',
        ];

        parent::init();
    }
}
