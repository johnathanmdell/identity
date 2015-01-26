<?php namespace JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\PermissionInterface;

interface RoleInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return Role
     */
    public function setName($name);

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
     * @param RoleInterface $role
     */
    public function inheritPermissions(RoleInterface $role);
}
