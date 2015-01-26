<?php namespace spec\JohnathanMDell\Identity\Role;

use JohnathanMDell\Identity\Permission\Permission;
use JohnathanMDell\Identity\Role\Role;
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
        $this->setName('Default');
        $this->getName()->shouldReturn('Default');
    }

    function it_has_no_permissions_by_default()
    {
        $this->getPermissions()->shouldReturn([]);
    }

    function it_should_return_false_if_permission_is_not_found()
    {
        $permission = new Permission(1);
        $this->hasPermission($permission)->shouldReturn(false);
    }

    function it_should_be_able_to_add_to_permissions()
    {
        $permission = new Permission(1);

        $this->addPermission($permission, true);
        $this->hasPermission($permission)->shouldReturn(true);
    }

    function it_should_be_able_to_remove_from_permissions()
    {
        $permission = new Permission(1);

        $this->addPermission($permission, true);
        $this->removePermission($permission);
        $this->hasPermission($permission)->shouldReturn(false);
    }

    function it_should_return_true_if_permission_is_granted()
    {
        $permission = new Permission(1);

        $this->addPermission($permission, true);
        $this->isGranted($permission)->shouldReturn(true);
    }

    function it_should_return_false_if_permission_is_not_granted()
    {
        $permission = new Permission(1);

        $this->addPermission($permission, false);
        $this->isGranted($permission)->shouldReturn(false);
    }

    function it_should_be_able_to_inherit_permissions_from_other_roles()
    {
        $permission = new Permission(1);

        $role = new Role(2);
        $role->addPermission($permission, true);

        $this->inheritPermissions($role);
        $this->hasPermission($permission)->shouldReturn(true);
    }
}
