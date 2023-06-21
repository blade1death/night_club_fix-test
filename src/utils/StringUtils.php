<?php

namespace Utils;

class StringUtils
{
    public static function getDanceConfigFileName(string $className): string
    {
        $className = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $className));
        return substr($className, strpos($className, '_') + 1) . '.json';
    }
}