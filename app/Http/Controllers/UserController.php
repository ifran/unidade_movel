<?php

namespace App\Http\Controllers;

use App\Services\AppointmentService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userService = new UserService();
        $users = $userService->getAllUserByCompanyId();

        return view("user.index")
            ->with("users", $users);
    }

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

    public function stopSharingLocation()
    {
        $userService = new UserService();
        $userService->stopSharingLocation();

        return redirect("index");
    }

    public function savePatient(Request $request)
    {
        $userService = new UserService();
        $userService->saveUser($request->all());

        $userService = (new UserService())->makeLogin($request->get("email"), $request->get("password"));
        if ($userService) {
            return redirect("/index");
        }

        return redirect("/index");
    }

    public function edit(Request $request)
    {
        $userService = new UserService();
        $userInformation = $userService->getUserInformationByUserId($request->route("id"));

        return view("user.form")
            ->with("userInformation", $userInformation);
    }

    public function saveChanges(Request $request)
    {
        $userService = new UserService();
        $userService->saveChanges($request->route("id"), $request->all());

        return redirect("user");
    }

    public function saveUser(Request $request)
    {
        $userService = new UserService();
        $userService->saveAdminUser($request->all());

        return redirect("user");
    }

    public function getAllAppointmentsFromLoggedUser()
    {
        $appointmentService = new AppointmentService();
        $appointments = $appointmentService->getAllFromLoggedUser();

        return view("user.appointment")
            ->with("appointments", $appointments);
    }

    public function editLoggedUser()
    {
        $userService = new UserService();
        $userInformation = $userService->getUserInformationByUserId(session()->get("userId"));

        return view("user.account")
            ->with("userInformation", $userInformation);
    }
}
