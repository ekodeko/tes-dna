<?php

class ProgrammingLanguage {
    public string $language;
    public int $appeared;
    public array $created;
    public bool $functional;
    public bool $objectOriented;
    public Relation $relation;

    public function __construct($language, $appeared, $created, $functional, $objectOriented, $relation) {
        $this->language = $language;
        $this->appeared = $appeared;
        $this->created = $created;
        $this->functional = $functional;
        $this->objectOriented = $objectOriented;
        $this->relation = $relation;
    }

    public function toJSON() {
        return json_encode($this, JSON_PRETTY_PRINT);
    }
}
