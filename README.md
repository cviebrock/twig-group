# twig-group

Twig filter that splits an array into a given number of groups.  This is different than the built-in `batch` filter, which splits the array based on a given number of items _per_ group..

[![Total Downloads](https://poser.pugx.org/cviebrock/twig-group/downloads.png)](https://packagist.org/packages/cviebrock/twig-group)
[![Latest Stable Version](https://poser.pugx.org/cviebrock/twig-group/v/stable.png)](https://packagist.org/packages/cviebrock/twig-group)



## Installation

The filter is registered at Packagist as [cviebrock/twig-group](https://packagist.org/packages/cviebrock/twig-group) and can be installed using [composer](http://getcomposer.org/):

```sh
composer require cviebrock/twig-group
```

Or just download the zip file and copy the file into your _src_ folder.

Enable the extension:

```php
$twig = new Twig_Environment($loader, $options);
$twig->addExtension(new Cviebrock\Twig\GroupExtension());
```

If you are using Laravel and [rcrowe/twigbridge](https://github.com/rcrowe/TwigBridge), then enable the extension by adding an entry to the `enabled` array in `app/config/packages/rcrowe/twigbridge/extensions.php`:

```php
'enabled' => [
	...
	'Cviebrock\Twig\GroupExtension',
],
```



## Usage

Assume we are starting with the following array:

```
[ 'John', 'Jane', 'Bill', 'Bob', 'Mary' ]
```

Pass the array and number of groups to the filter:

```twig
{{ array | group(2) }}          // [ ['John', 'Jane', 'Bill'], ['Bob', 'Mary'] ]

{{ array | group(3) }}          // [ ['John', 'Jane'], ['Bill', 'Bob'], ['Mary'] ]
```

Optionally pass a second parameter which will pad out all the arrays so they have the same number of elements (similar to how the built-in `batch` filter pads arrays:

```twig
{{ array | group(2, '-empty-') }}          // [ ['John', 'Jane', 'Bill'], ['Bob', 'Mary', '-empty-'] ]

{{ array | group(3, '-empty-') }}          // [ ['John', 'Jane'], ['Bill', 'Bob'], ['Mary', '-empty-'] ]
```



## Bugs, Suggestions and Contributions

Please use Github for bugs, comments, suggestions.

1. Fork the project.
2. Create your bugfix/feature branch and write your (well-commented) code.
3. Commit your changes and push to your repository.
4. Create a new pull request against this project's `master` branch.



## Copyright and License

**twig-group** was written by Colin Viebrock and released under the MIT License. See the LICENSE file for details.

Copyright 2015 Colin Viebrock
