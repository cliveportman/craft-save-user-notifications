<?php
/**
 * Save user notifications plugin for Craft CMS 3.x
 *
 * Sends a notification out to admin whenever a user updates their details using a front-end form.
 *
 * @link      https://clive.theportman.co
 * @copyright Copyright (c) 2019 Clive Portman
 */

namespace cliveportman\saveusernotifications\services;

use cliveportman\saveusernotifications\SaveUserNotifications;

use Craft;
use craft\base\Component;
use craft\helpers\UrlHelper;

/**
 * Email Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Clive Portman
 * @package   SaveUserNotifications
 * @since     1.0.0
 */
class Email extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     SaveUserNotifications::$plugin->email->exampleService()
     *
     * @return mixed
     */
    public function notifyUserSaved($user)
    {

        // Check our Plugin's settings for `someAttribute`
        if (SaveUserNotifications::$plugin->getSettings()->notificationEmail) {

            $toEmail = SaveUserNotifications::$plugin->settings->notificationEmail;
            $subject = 'A user has updated their details';

            $html = $user->name . '<br>';
            $html .= $user->email . '<br>';
            $html .= 'Has just updated their details.<br><br>';
            $html .= '<a href="' . UrlHelper::siteUrl() . 'admin/users/' . $user->id . '">View their account here.</a>';

            SaveUserNotifications::$plugin->email->logMessage('User #' . $user->id . ' updated their account');

            return Craft::$app
                ->getMailer()
                ->compose()
                ->setTo($toEmail)
                ->setSubject($subject)
                ->setHtmlBody($html)
                ->send();

        }

        return true;
    }

    // Utility function for logging to our own log file
    public function logMessage($message = "")
    {
        $file = Craft::getAlias('@storage/logs/saveusernotifications.log');
        $log = date('Y-m-d H:i:s').' '.$message."\n";
        \craft\helpers\FileHelper::writeToFile($file, $log, ['append' => true]);
        return true;
    }
}
