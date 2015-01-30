<?php namespace JohnathanMDell\Identity;

use JohnathanMDell\Identity\Permission\Permission;
use JohnathanMDell\Identity\Role\Role;

class Identity
{
    private $role;

    public function __construct(array $permissions)
    {
        $this->role = new Role();

        foreach ($permissions as $name => $granted) {
            $this->addPermission($name, $granted);
        }
    }

    public function isGranted($name)
    {
        $permission = new Permission();
        $permission->setHash($name);

        return $this->role->isGranted($permission);
    }

    private function addPermission($hash, $granted)
    {
        $permission = new Permission();
        $permission = $permission->setHash($hash)->setGranted($granted);

        $this->role->addPermission($permission, $granted);
    }
}