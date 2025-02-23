<?php

namespace App\Http\Controllers;

use App\Models\ProgrammingLanguage;
use App\Models\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProgrammingLanguageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->json()->all();

        $relation = new Relation($data['relation']['influencedBy'], $data['relation']['influences']);
        $language = new ProgrammingLanguage(
            $data['language'],
            $data['appeared'],
            $data['created'],
            $data['functional'],
            $data['objectOriented'],
            $relation
        );

        $languages[] = $language->toArray();
        Cache::put('languages', $languages, now()->addMinutes(60));

        return response()->json(['message' => 'Language added successfully'], 201);
    }

    public function show($id)
    {
        $languages = Cache::get('languages', []);
        if (!isset($languages[$id])) {
            return response()->json(['message' => 'Language not found'], 404);
        }
        return response()->json($languages[$id]);
    }

    public function index()
    {
        $languages = Cache::get('languages', []);
        return response()->json($languages);
    }

    public function update(Request $request, $id)
    {
        $languages = Cache::get('languages', []);

        $data = $request->json()->all();

        $relation = new Relation($data['relation']['influencedBy'], $data['relation']['influences']);
        $language = new ProgrammingLanguage(
            $data['language'],
            $data['appeared'],
            $data['created'],
            $data['functional'],
            $data['objectOriented'],
            $relation
        );

        $languages[$id] = $language->toArray();
        Cache::put('languages', $languages, now()->addDays(1));

        return response()->json(['message' => 'Language updated successfully']);
    }

    public function destroy($id)
    {
        $languages = Cache::get('languages', []);

        if (!isset($languages[$id])) {
            return response()->json(['message' => 'Language not found'], 404);
        }

        unset($languages[$id]);
        Cache::put('languages', array_values($languages), now()->addDays(1));

        return response()->json(['message' => 'Language deleted successfully']);
    }
}
