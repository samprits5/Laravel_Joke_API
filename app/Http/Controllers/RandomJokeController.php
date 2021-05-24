<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\RandomJoke;


class RandomJokeController extends Controller
{

    public function random() {

        try {

            $joke = RandomJoke::inRandomOrder()->first();

            return response()->json($joke);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }


    public function show($joke) {

        try {

            if (isset($joke['error'])) {
                return response()->json($joke, 404);
            }

            return response()->json($joke);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    public function store(Request $request) {

        try {

            $validator = Validator::make(request()->all(), [
                'joke' => 'required|string|min:1|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            $joke = RandomJoke::create(['joke' => $request->joke]);

            return response()->json($joke);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    public function update($joke, Request $request) {

        try {

            $validator = Validator::make(request()->all(), [
                'joke' => 'required|string|min:1|max:255'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            $joke->joke = $request->joke;
            $joke->update();

            return response()->json($joke);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    public function destroy($joke) {

        try {

            $joke->delete();

            return response()->json($joke);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }

    }
}
