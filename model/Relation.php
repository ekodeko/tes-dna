<?php

class Relation {
    public array $influencedBy;
    public array $influences;

    public function __construct($influencedBy, $influences) {
        $this->influencedBy = $influencedBy;
        $this->influences = $influences;
    }
}