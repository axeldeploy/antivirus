<?php

namespace Axel\Antivirus\Rules;

use Axel\Antivirus\Services\ClamAvService;
use Illuminate\Contracts\Validation\Rule;

class Antivirus implements Rule
{
    public function passes($attribute, $value): bool
    {
        $clamAvService = new ClamAvService();
        return $clamAvService->infected($value);
    }

    public function message(): string
    {
        return "Malware detected.";
    }
}