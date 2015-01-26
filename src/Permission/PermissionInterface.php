<?php namespace JohnathanMDell\Identity\Permission;

interface PermissionInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return Permission
     */
    public function setName($name);

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
