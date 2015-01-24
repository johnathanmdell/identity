<?php namespace JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\PermissionInterface;

class Role implements RoleInterface
{
    protected $id;

    protected $name;

    protected $permissions = [];

    public function __construct($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function addPermission(PermissionInterface $permission, $granted)
    {
        if (!$this->hasPermission($permission)) {
            $permission->granted = $granted;
            $this->permissions[] = $permission;
        }
    }

    public function hasPermission(PermissionInterface $permission)
    {
        return in_array($permission, $this->permissions);
    }

    public function removePermission(PermissionInterface $permission)
    {
        if ($this->hasPermission($permission)) {
            $this->permissions = array_udiff($this->permissions, [$permission],
                function ($obj_a, $obj_b) {
                    return $obj_a->id - $obj_b->id;
                }
            );
        }
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function isGranted(PermissionInterface $permission)
    {
        if ($this->hasPermission($permission)) {
            return $this->permissions[array_search($permission, $this->permissions)]->granted;
        }

        return false;
    }
}
