[![Build Status](https://travis-ci.org/johnathanmdell/identity.svg?branch=master)](https://travis-ci.org/johnathanmdell/identity)

# identity
A very basic RBAC component that allows you to provide your user's role permissions and then simply check if a user has permission to a page, action or whatever else you would want to check against.

```
$identity = new \JohnathanMDell\Identity\Identity([
    'route.true' => true,
    'route.false' => false,
]);

var_dump($identity->isGranted('route.true'));
// returns true

var_dump($identity->isGranted('route.false'));
// returns false

var_dump($identity->isGranted('route.notfound'));
// returns false
```
