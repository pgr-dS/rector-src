<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\If_\SimplifyIfExactValueReturnValueRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(SimplifyIfExactValueReturnValueRector::class);
};
