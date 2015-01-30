<?php namespace JohnathanMDell\Identity\Permission;

interface PermissionInterface
{
    /**
     * @return string
     */
    public function getHash();

    /**
     * @param string $hash
     * @return Permission
     */
    public function setHash($hash);

    /**
     * @return boolean
     */
    public function getGranted();

    /**
     * @param boolean $granted
     * @return Permission
     */
    public function setGranted($granted);
}