<?php namespace spec\JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\Permission;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RoleSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('JohnathanMDell\Identity\Role\Role');
    }

    function it_implements_role_interface()
    {
        $this->shouldImplement('JohnathanMDell\Identity\Role\RoleInterface');
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function its_name_should_be_mutable()
    {
        $this->setName('User');
        $this->getName()->shouldReturn('User');
    }

    function it_has_no_permissions_by_default()
    {
        $this->getPermissions()->shouldReturn([]);
    }

    function its_permissions_should_be_mutable()
    {
        $permission = new Permission(1);

        $this->addPermission($permission, true);
        $this->hasPermission($permission)->shouldReturn(true);
    }
}
