<?php namespace JohnathanMDell\Identity\Permission;

class Permission implements PermissionInterface
{
    public $id;

    protected $name;

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
    }
}
