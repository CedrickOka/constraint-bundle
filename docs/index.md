OkaConstraintBundle
===================

## Constraints list
### EntityExist constraint

A small validator that verifies that an Entity actually exists.


```php
namespace App\Entity;

use Oka\ConstraintBundle\Validator\EntityExist;
use Symfony\Component\Validator\Constraints as Assert;

class User
{
    /**
     * @Assert\NotBlank
     * @EntityExist(class="App\Entity\Group")
     *
     * @var int Group's id property
     */
    private $groupId;

    /**
     * @Assert\NotBlank
     * @EntityExist(class="App\Entity\Other", property="name")
     *
     * @var string The name of "Other". We use its "name" property. 
     */
    private $other;

    // ...
```

In case you are using other constraints to validate the property before entity should be checked in the database (like `@Assert\Uuid`) you should use [Group sequence](https://symfony.com/doc/current/validation/sequence_provider.html) in order to avoid 500 errors from Doctrine mapping.

```php
namespace App\Message\Command;

use Happyr\Validator\Constraint\EntityExist;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Assert\GroupSequence({"Create", "DatabaseCall"})
 */
final class User
{
    /**
     * @Assert\NotBlank(groups={"Create"})
     * @Assert\Uuid(groups={"Create"})
     * @EntityExist(class="App\Entity\Group", groups={"DatabaseCall"}, property="uuid")
     *
     * @var string Uuid
     */
    private $groupId;

    // ...
```
### EntityExist constraint

A small validator that verifies that an Entity actually exists.


```php
namespace App\Document;

use Oka\ConstraintBundle\Validator\DocumentExist;
use Symfony\Component\Validator\Constraints as Assert;

class User
{
    /**
     * @Assert\NotBlank
     * @DocumentExist(class="App\Entity\Group")
     *
     * @var int Group's id property
     */
    private $groupId;

    /**
     * @Assert\NotBlank
     * @DocumentExist(class="App\Entity\Other", property="name")
     *
     * @var string The name of "Other". We use its "name" property. 
     */
    private $other;

    // ...
```

## Note

The Validator will not produce a violation when value is empty. This means that you should most likely use it in
combination with `NotBlank`. 
