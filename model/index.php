<?php

$relation = new Relation(["B", "ALGOL 68", "Assembly", "FORTRAN"], ["C++", "Objective-C", "C#", "Java", "JavaScript", "PHP", "Go"]);
$language = new ProgrammingLanguage("C", 1972, ["Dennis Ritchie"], true, false, $relation);

echo $language->toJSON();