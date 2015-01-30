<?php namespace JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\PermissionInterface;

class Role implements RoleInterface
{
    /**
     * @var array $permissions
     */
    protected $permissions = [];

    /**
     * {@inheritdoc}
     */
    public function addPermission(PermissionInterface $permission, $granted)
    {
        if (!$this->hasPermission($permission)) {
            $this->permissions[] = $permission->setGranted($granted);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasPermission(PermissionInterface $permission)
    {
        $result = array_filter($this->permissions,
            function ($permissionObject) use (&$permission) {
                return $permissionObject->getHash() == $permission->getHash();
            }
        );

        return $result ? array_shift($result) : false;
    }

    /**
     * {@inheritdoc}
     */
    public function removePermission(PermissionInterface $permission)
    {
        if ($this->hasPermission($permission)) {
            $this->permissions = array_udiff($this->permissions, [$permission],
                function ($objectA, $objectB) {
                    return $objectA->getHash() - $objectB->getHash();
                }
            );
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * {@inheritdoc}
     */
    public function isGranted(PermissionInterface $permission)
    {
        if ($result = $this->hasPermission($permission)) {
            return $result->getGranted();
        }

        return false;
    }
}