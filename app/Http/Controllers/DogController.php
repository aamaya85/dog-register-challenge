<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use App\Models\Dog;

class DogController extends Controller
{

    public function index(Request $request): View
    {
        return view('create_dog');
    }

    public function create(Request $request): View
    {
        return view('create_dog');
    }

    public function store(Request $request): JsonResponse
    {

        $unknownDateOfBirth = $request->input('unknown_date_of_birth');

        $validator = Validator::make($request->all(), [
            'name'          => 'bail|required|string|min:2',
            'date_of_birth' => $unknownDateOfBirth ? 'nullable|date' : 'required|date',
            'estimated_age' => $unknownDateOfBirth ? 'required|integer' : 'nullable|integer',
        ]);
        
        $validatedData = $validator->validate();

        $dog = new Dog();
        $dog->name = $validatedData['name'];
        $dog->estimated_age = $validatedData['estimated_age'];
        $dog->date_of_birth = $validatedData['date_of_birth'];

        $dog->save();

        return response()->json([
            "message" => "The dog was registered succesfully!"
        ]);

    }


}
