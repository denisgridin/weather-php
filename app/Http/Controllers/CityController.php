<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\CityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    public function index()
    {
        try {
            Log::info('Get all cities');
            return City::all();
        } catch (Exception $exception) {
            Log::error($exception);
            return $exception;
        }
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse {
        try {
            Log::info('Add city');
            $city = City::create($request->all());
            return response()->json($city, 201);
        } catch (Exception $exception) {
            Log::error($exception);
            return $exception;
        }
    }

    public function show(City $city): City {
        try {
            Log::info('Get city by id');
            return $city;
        } catch (Exception $exception) {
            Log::error($exception);
            return $exception;
        }
    }

    public function update(Request $request, City $city): \Illuminate\Http\JsonResponse {
        try {
            Log::info('Update city');
            $city->update($request->all());
            return response()->json($city, 200);
        } catch (Exception $error) {
            Log::error($error);
            return $error;
        }
    }

    /**
     * @throws Exception
     */
    public function delete(Request $request, City $city): \Illuminate\Http\JsonResponse
    {
        try {
            Log::info('Delete city by id');
            $city->delete();
            return response()->json(null, 204);
        } catch (Exception $exception) {
            Log::error($exception);
            return $exception;
        }
    }
}
