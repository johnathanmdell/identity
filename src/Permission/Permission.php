<?php namespace JohnathanMDell\Identity\Permission;

class Permission implements PermissionInterface
{
    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var boolean $granted
     */
    protected $granted;

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
