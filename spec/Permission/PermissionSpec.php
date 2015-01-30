<?php namespace spec\JohnathanMDell\Identity\Permission;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PermissionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('JohnathanMDell\Identity\Permission\Permission');
    }

    function it_implements_permission_interface()
    {
        $this->shouldImplement('JohnathanMDell\Identity\Permission\PermissionInterface');
    }

    function it_has_no_hash_by_default()
    {
        $this->getHash()->shouldReturn(null);
    }

    function its_hash_should_be_mutable()
    {
        $this->setHash('SomeRandomHash');
        $this->getHash()->shouldReturn('5492f8fbbb8b72d4ac3c5eb5c37f5b65555dd012');
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
