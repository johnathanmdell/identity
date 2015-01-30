<?php namespace JohnathanMDell\Identity\Permission;

class Permission implements PermissionInterface
{
    /**
     * @var string $hash
     */
    protected $hash;

    /**
     * @var boolean $granted
     */
    protected $granted;

    /**
     * {@inheritdoc}
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * {@inheritdoc}
     */
    public function setHash($hash)
    {
        $this->hash = sha1($hash);

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