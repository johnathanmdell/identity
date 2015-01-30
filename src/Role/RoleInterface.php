<?php namespace JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\PermissionInterface;

interface RoleInterface
{
    /**
     * @param PermissionInterface $permission
     * @param boolean $granted
     * @return Role
     */
    public function addPermission(PermissionInterface $permission, $granted);

    /**
     * @param PermissionInterface $permission
     * @return boolean
     */
    public function hasPermission(PermissionInterface $permission);

    /**
     * @param PermissionInterface $permission
     * @return Role
     */
    public function removePermission(PermissionInterface $permission);

    /**
     * @return array
     */
    public function getPermissions();

    /**
     * @param PermissionInterface $permission
     * @return boolean
     */
    public function isGranted(PermissionInterface $permission);
}