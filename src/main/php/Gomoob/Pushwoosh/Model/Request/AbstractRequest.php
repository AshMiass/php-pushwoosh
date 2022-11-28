<?php

/**
 * gomoob/php-pushwoosh
 *
 * @copyright Copyright (c) 2014, GOMOOB SARL (http://gomoob.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE.md file)
 */
namespace Gomoob\Pushwoosh\Model\Request;

use Gomoob\Pushwoosh\Exception\PushwooshException;

use Gomoob\Pushwoosh\Model\IRequest;

/**
 * Abstract class common to all Pushwoosh requests.
 *
 * @author Baptiste GAILLARD (baptiste.gaillard@gomoob.com)
 */
abstract class AbstractRequest implements IRequest
{
    /**
     * The API access token from the Pushwoosh control panel (create this token at https://cp.pushwoosh.com/api_access).
     *
     * @var string
     */
    protected $auth;

     /**
     * The Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup").
     *
     * @var string|null
     */
    protected $application = null;

    /**
     * The Pushwoosh Application group code (cannot be used together with "application").
     *
     * @var string|null
     */
    protected $applicationsGroup = null;


    /**
     * {@inheritDoc}
     */
    public function getAuth()
    {
        // If the `auth` parameter is not supported we throw an exception
        if (!$this->isAuthSupported()) {
            throw new PushwooshException('This request does not support the \'auth\' parameter !');
        }

        return $this->auth;
    }

    /**
     * {@inheritDoc}
     */
    public function setAuth($auth)
    {
        // If the `auth` parameter is not supported we throw an exception
        if (!$this->isAuthSupported()) {
            throw new PushwooshException('This request does not support the \'auth\' parameter !');
        }

        $this->auth = $auth;

        return $this;
    }

    /**
     * Sets the Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup")
     * .
     *
     * @param string $application the Pushwoosh application ID where to send the message to (cannot be used together
     *        with "applicationsGroup").
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Sets the Pushwoosh Application group code (cannot be used together with "application").
     *
     * @param string $applicationsGroup the Pushwoosh Application group code (cannot be used together with
     *        "application").
     *
     * @return \Gomoob\Pushwoosh\Model\Request\CreateMessageRequest this instance.
     */
    public function setApplicationsGroup($applicationsGroup)
    {
        $this->applicationsGroup = $applicationsGroup;

        return $this;
    }

    /**
     * Gets the Pushwoosh application ID where to send the message to (cannot be used together with "applicationsGroup")
     * .
     *
     * @return string the Pushwoosh application ID where to send the message to (cannot be used together with
     *         "applicationsGroup").
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Gets the Pushwoosh Application group code (cannot be used together with "application").
     *
     * @return string the Pushwoosh Application group code (cannot be used together with "application").
     */
    public function getApplicationsGroup()
    {
        return $this->applicationsGroup;
    }


}
