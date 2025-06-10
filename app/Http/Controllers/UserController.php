<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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

    public function saveLocalization(Request $request): JsonResponse
    {
        $latitude = $request->get("lat");
        $longitude = $request->get("long");

        $userService = new UserService();
        $userService->saveLocal($latitude, $longitude);

        return response()->json(["success" => true]);
    }

    public function getAllOnlineLocalization(Request $request): JsonResponse
    {
        $userService = new UserService();
        $allOnlineLocalizations = $userService->getAllOnlineLocalization();

        return response()->json(["success" => true, "data" => $allOnlineLocalizations]);
    }

    public function saveAdminWithCompany(Request $request)
    {
        $userService = new UserService();
        $userSuccessfulSaved = $userService->saveUserInformationRelatingWithCompany($request->all());

        if (!$userSuccessfulSaved) {
            return redirect("/register/admin")->with("error", "Cadastro não realizado");
        }

        $userService = (new UserService())->makeLogin($request->get("email"), $request->get("password"));
        if ($userService) {
            return redirect("index");
        }

        return redirect("/register/admin")->with("error", "Problemas no login");
    }

    public function shareLocation(Request $request)
    {
        $userService = new UserService();
        $userService->shareLocationByUnitId($request->get("userUnitId"));

        return redirect("index");
    }
}
