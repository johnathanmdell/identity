<?php namespace JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\PermissionInterface;

class Role implements RoleInterface
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var array $permissions
     */
    protected $permissions = [];

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

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
        return in_array($permission, $this->permissions);
    }

    /**
     * {@inheritdoc}
     */
    public function removePermission(PermissionInterface $permission)
    {
        if ($this->hasPermission($permission)) {
            $this->permissions = array_udiff($this->permissions, [$permission],
                function ($objectA, $objectB)
                {
                    return $objectA->id - $objectB->id;
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
        if ($this->hasPermission($permission)) {
            return $this->permissions[array_search($permission, $this->permissions)]->getGranted();
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function inheritPermissions(RoleInterface $role)
    {
        $this->permissions = array_merge($this->permissions, $role->getPermissions());
    }
}
