Similar Array Library
=================================

| Version | Build Status | Code Coverage |
|:---------:|:-------------:|:-----:|
| `main`| [![CI][main Build Status Image]][main Build Status] | [![Coverage Status][main Code Coverage Image]][main Code Coverage] |
| `develop`| [![CI][develop Build Status Image]][develop Build Status] | [![Coverage Status][develop Code Coverage Image]][develop Code Coverage] |

Installation
============

```console
$ composer require macpaw/similar-arrays
```

Example
============
Simple how check similar two arrays:
```php
$similarArray = new SimilarArray();
$result = $similarArray->isArraysSimilar(['test'], ['test']);
var_dump($result) // true

$result = $similarArray->isArraysSimilar(['test'], ['exit']);
var_dump($result) // false
```

How check signature value:
```php
$similarArray = new SimilarArray();
$result = $similarArray->isArraysSimilar(['a' => '~\d+'], ['a' => 1111], ['a']);
var_dump($result) // true
```

[main Build Status]: https://github.com/macpaw/SimilarArrays/actions?query=workflow%3ACI+branch%main
[main Build Status Image]: https://github.com/macpaw/SimilarArrays/workflows/CI/badge.svg?branch=main
[develop Build Status]: https://github.com/macpaw/SimilarArrays/actions?query=workflow%3ACI+branch%3Adevelop
[develop Build Status Image]: https://github.com/macpaw/SimilarArrays/workflows/CI/badge.svg?branch=develop
[main Code Coverage]: https://codecov.io/gh/macpaw/SimilarArrays/branch/main
[main Code Coverage Image]: https://img.shields.io/codecov/c/github/macpaw/SimilarArrays/main?logo=codecov
[develop Code Coverage]: https://codecov.io/gh/macpaw/SimilarArrays/branch/develop
[develop Code Coverage Image]: https://img.shields.io/codecov/c/github/macpaw/SimilarArrays/develop?logo=codecov
