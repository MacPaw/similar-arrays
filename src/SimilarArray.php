<?php

declare(strict_types=1);

namespace SimilarArrays;

class SimilarArray
{
    /**
     * @param array<mixed>  $expected
     * @param array<mixed>  $actual
     * @param array<string> $regexVariableKeys
     */
    public function isArraysSimilar(array $expected, array $actual, array $regexVariableKeys = []): bool
    {
        if (array_keys($expected) !== array_keys($actual)) {
            return false;
        }

        foreach ($expected as $key => $value) {
            if (!isset($actual[$key]) && $value !== null) {
                return false;
            }

            if (!in_array($key, $regexVariableKeys, true) && gettype($value) !== gettype($actual[$key])) {
                return false;
            }

            if (!is_array($value)) {
                if ($value !== $actual[$key] && !in_array($key, $regexVariableKeys, true)) {
                    return false;
                }

                if (!in_array($key, $regexVariableKeys, true)) {
                    continue;
                }

                if (!is_string($value) || strpos($value, '~') !== 0) {
                    return false;
                }

                $pregMatchValue = preg_match(
                    sprintf('|%s|', substr($value, 1)),
                    sprintf('%s', $actual[$key])
                );
                if ($pregMatchValue === 0 || $pregMatchValue === false) {
                    return false;
                }
            }

            if (
                is_array($value)
                && is_array($actual[$key])
                && !$this->isArraysSimilar($value, $actual[$key], $regexVariableKeys)
            ) {
                return false;
            }
        }

        return true;
    }
}
