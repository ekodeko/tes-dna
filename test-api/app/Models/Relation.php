<?php

namespace App\Models;

class Relation
{
    public array $influencedBy;
    public array $influences;

    public function __construct(array $influencedBy, array $influences)
    {
        $this->influencedBy = $influencedBy;
        $this->influences = $influences;
    }
}