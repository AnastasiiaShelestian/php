<?php

function loadRecipes(string $filename = __DIR__ . '/../../storage/recipes.txt'): array
{
    if (!file_exists($filename)) {
        return [];
    }

    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('json_decode', $lines);
}
