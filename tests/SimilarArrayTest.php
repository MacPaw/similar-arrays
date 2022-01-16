<?php

declare(strict_types=1);

namespace SimilarArrays\Tests;

use PHPUnit\Framework\TestCase;
use SimilarArrays\SimilarArray;

class SimilarArrayTest extends TestCase
{
    public function testVariableFields(): void
    {
        $similarArray = new SimilarArray();

        $result = $similarArray->isArraysSimilar(['test'], ['test']);

        self::assertTrue($result);

        $result = $similarArray->isArraysSimilar([], []);

        self::assertTrue($result);

        $result = $similarArray->isArraysSimilar([], ['test']);

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(['a' => 1], ['a' => 2], []);

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(['a' => 2], ['a' => 2], []);

        self::assertTrue($result);

        $result = $similarArray->isArraysSimilar(['a' => '~\d+'], ['a' => 1111], []);

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(['a' => '~\d+'], ['a' => 1111], ['a']);

        self::assertTrue($result);

        $result = $similarArray->isArraysSimilar(['a' => '~\s'], ['a' => 1111], ['a']);

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(
            ['a' => ['b' => 1, ['c' => 2]]],
            ['a' => ['b' => 1, ['c' => 2]]]
        );

        self::assertTrue($result);

        $result = $similarArray->isArraysSimilar(['a' => ['b' => 1, ['c' => 3]]], ['a' => ['b' => 1, ['c' => 2]]]);

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(['a' => ['b' => 1, ['c' => 3]]], ['a' => ['b' => 1, ['c' => '3']]]);

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(
            ['a' => ['b' => 1, ['c' => 3]]],
            ['a' => ['b' => 1, ['c' => 3, []]]]
        );

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(
            ['a' => ['b' => 1, ['c' => 3, []]]],
            ['a' => ['b' => 1, ['c' => 3]]]
        );

        self::assertFalse($result);

        $result = $similarArray->isArraysSimilar(
            ['a' => null],
            ['a' => null]
        );

        self::assertTrue($result);

        $result = $similarArray->isArraysSimilar(
            ['a' => null],
            ['a' => null]
        );

        self::assertTrue($result);

        $validValues = ['this', 'test'];
        $actualValue = $validValues[\array_rand($validValues)];

        $result = $similarArray->isArraysSimilar(
            ['a' => '~^t[a-z]', 'b' => 1],
            ['a' => $actualValue, 'b' => 1],
            ['a']
        );

        self::assertTrue($result);
    }
}
