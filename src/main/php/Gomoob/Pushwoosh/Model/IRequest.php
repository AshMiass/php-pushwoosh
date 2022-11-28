<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model;

/**
 * Interface common to all Pushwoosh requests.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
interface IRequest extends \JsonSerializable
{
    /**
     * Gets the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @return string the API access token from the Pushwoosh control panel (create this token at
     *         https://cp.pushwoosh.com/api_access).
     *
     * @throws \Gomoob\Pushwoosh\Exception\PushwooshException If the `auth` property is not supported by the request.
     */
    public function getAuth();

    /**
     * Function used to indicate if the concrete implementation of the request supports the `auth` property.
     *
     * @return boolean `true` if the concrete implementation of the request supports the `auth` property, `false`
     *         otherwise.
     */
    public function isAuthSupported();

    /**
     * Sets the API access token from the Pushwoosh control panel (create this token at
     * https://cp.pushwoosh.com/api_access).
     *
     * @param string $auth the API access token from the Pushwoosh control panel (create this token at
     *        https://cp.pushwoosh.com/api_access).
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     *
     * @throws \Gomoob\Pushwoosh\Exception\PushwooshException If the `auth` property is not supported by the request.
     */
    public function setAuth($auth);


    /**
     * Sets the Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup")
     * .
     *
     * @param string $application the Pushwoosh application ID where to send the message to (cannot be used together
     *        with "applicationsGroup").
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setApplication($application);

    /**
     * Sets the Pushwoosh Application group code (cannot be used together with "application").
     *
     * @param string $applicationsGroup the Pushwoosh Application group code (cannot be used together with
     *        "application").
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setApplicationsGroup($applicationsGroup);

    /**
     * Gets the Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup")
     * .
     *
     * @return string the Pushwoosh application ID where to send the message to (cannot be used together with
     *         "applicationsGroup").
     */
    public function getApplication();

    /**
     * Gets the Pushwoosh Application group code (cannot be used together with "application").
     *
     * @return string the Pushwoosh Application group code (cannot be used together with "application").
     */
    public function getApplicationsGroup();
}
