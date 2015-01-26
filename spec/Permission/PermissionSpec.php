<?php namespace spec\JohnathanMDell\Identity\Permission;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PermissionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('JohnathanMDell\Identity\Permission\Permission');
    }

    function it_implements_permission_interface()
    {
        $this->shouldImplement('JohnathanMDell\Identity\Permission\PermissionInterface');
    }

    function it_has_no_name_by_default()
    {
        $this->getName()->shouldReturn(null);
    }

    function its_name_should_be_mutable()
    {
        $this->setName('index');
        $this->getName()->shouldReturn('index');
    }

    function it_has_is_not_granted_by_default()
    {
        $this->getGranted()->shouldReturn(null);
    }

    function its_granted_status_should_be_mutable()
    {
        $this->setGranted(true);
        $this->getGranted()->shouldReturn(true);
    }
}
