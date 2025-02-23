<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestController extends Controller
{
    public function index()
    {
        return response("Hello Go developers", Response::HTTP_OK);
    }

    public function language()
    {
        $data = [
            "language" => "C",
            "appeared" => 1972,
            "created" => ["Dennis Ritchie"],
            "functional" => true,
            "object-oriented" => false,
            "relation" => [
                "influenced-by" => ["B", "ALGOL 68", "Assembly", "FORTRAN"],
                "influences" => ["C++", "Objective-C", "C#", "Java", "JavaScript", "PHP", "Go"],
            ]
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    public function palindrome($text)
    {
        $cleanedStr = strtolower($text);

        $reversedStr = strrev($cleanedStr);

        if($cleanedStr === $reversedStr){
            return response()->json('Palindrome', Response::HTTP_OK);
        }else{
            return response()->json('Not Palindrome', Response::HTTP_BAD_REQUEST);
        }
    }
}
