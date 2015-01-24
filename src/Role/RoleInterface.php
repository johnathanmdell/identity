<?php namespace JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\PermissionInterface;

interface RoleInterface
{
    public function getName();

    public function setName($name);

    public function addPermission(PermissionInterface $permission, $granted);

    public function hasPermission(PermissionInterface $permission);

    public function removePermission(PermissionInterface $permission);

    public function getPermissions();
}
