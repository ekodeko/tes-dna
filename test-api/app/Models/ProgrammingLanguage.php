<?php

namespace App\Models;

class ProgrammingLanguage
{
    public string $language;
    public int $appeared;
    public array $created;
    public bool $functional;
    public bool $objectOriented;
    public Relation $relation;

    public function __construct(string $language, int $appeared, array $created, bool $functional, bool $objectOriented, Relation $relation)
    {
        $this->language = $language;
        $this->appeared = $appeared;
        $this->created = $created;
        $this->functional = $functional;
        $this->objectOriented = $objectOriented;
        $this->relation = $relation;
    }

    public function toArray(): array
    {
        return [
            'language' => $this->language,
            'appeared' => $this->appeared,
            'created' => $this->created,
            'functional' => $this->functional,
            'objectOriented' => $this->objectOriented,
            'relation' => [
                'influencedBy' => $this->relation->influencedBy,
                'influences' => $this->relation->influences,
            ],
        ];
    }
}
