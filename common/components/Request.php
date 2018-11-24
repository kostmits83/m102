<?php
namespace common\components;

class Request extends \yii\web\Request 
{
    public $web;
    public $adminUrl;


    /**
     * Gets base url
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
    }

    /*
        If you don't have this function, the admin site will 404 if you leave off 
        the trailing slash.

        E.g.:

        Wouldn't work:
        site.com/admin

        Would work:
        site.com/admin/

        Using this function, both will work.
    */

    /**
     * Resolves path info
     * If you don't have this function, the admin site will 404 if you leave off the trailing slash.
     * E.g.:
     * Wouldn't work:
     *      site.com/admin
     * Would work:
     *      site.com/admin/
     * Using this function, both will work.
     *
     * @return string
     */
    public function resolvePathInfo(): string
    {
        if ($this->getUrl() === $this->adminUrl) {
            return "";
        } else {
            return parent::resolvePathInfo();
        }
    }

} 
?>