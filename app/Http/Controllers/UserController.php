<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function makeLogin(Request $request)
    {
        $userService = (new UserService())->makeLogin($request->get("email"), $request->get("password"));

        if ($userService) {
            return redirect("index");
        }

        return redirect("login")->with("error", "Login não encontrado");
    }

    public function saveLocalization(Request $request): \Illuminate\Http\JsonResponse
    {
        $latitude = $request->get("lat");
        $longitude = $request->get("long");

        $userService = new UserService();
        $userService->saveLocal($latitude, $longitude);

        return response()->json(["success" => true]);
    }

    public function getAllOnlineLocalization(Request $request): \Illuminate\Http\JsonResponse
    {
        $userService = new UserService();
        $allOnlineLocalizations = $userService->getAllOnlineLocalization();

        return response()->json(["success" => true, "data" => $allOnlineLocalizations]);
    }
}
