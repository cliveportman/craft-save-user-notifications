<?php
/**
 * Save user notifications plugin for Craft CMS 3.x
 *
 * Sends a notification out to admin whenever a user updates their details using a front-end form.
 *
 * @link      https://clive.theportman.co
 * @copyright Copyright (c) 2019 Clive Portman
 */

namespace cliveportman\saveusernotifications\models;

use cliveportman\saveusernotifications\SaveUserNotifications;

use Craft;
use craft\base\Model;

/**
 * SaveUserNotifications Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Clive Portman
 * @package   SaveUserNotifications
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
    public $notificationEmail = 'user@domain.com';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['notificationEmail', 'string'],
            ['notificationEmail', 'default', 'value' => 'user@domain.com'],
        ];
    }
}
