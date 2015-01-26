<?php namespace JohnathanMDell\Identity\Permission;

class Permission implements PermissionInterface
{
    public $id;

    protected $name;

    protected $granted;

    public function __construct($id)
    {
        $this->id = $id;

        return $this;
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
    public function getGranted()
    {
        return $this->granted;
    }

    /**
     * {@inheritdoc}
     */
    public function setGranted($granted)
    {
        $this->granted = $granted;

        return $this;
    }
}
