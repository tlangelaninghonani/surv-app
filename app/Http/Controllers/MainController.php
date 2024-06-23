<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;

class MainController extends Controller
{
    public function main(Request $req){

        if(! Addresses::where("public_ip", $req->ipaddress)->exists()){

            return back();
        }

        $data = Addresses::where("public_ip", $req->ipaddress)->first();

        return view("home", [
            "data" => $data
        ]);
    }

    public function fetchData($IPaddress){

        $data = Addresses::where("public_ip", $IPaddress)->first();

        return Array(
            "port" => $data->port,
            "last_active" => $data->last_active
        );
    }

    public function connect(){

        $data = Addresses::all();

        return view("connect", [
            "data" => $data
        ]);
    }

    public function devices(){

        $data = Addresses::all();

        return view("devices", [
            "data" => $data
        ]);
    }

    public function editDevice($deviceID){

        $data = Addresses::find($deviceID);

        return view("edit_device", [
            "data" => $data
        ]);
    }

    public function updateDeviceInfo($deviceID, Request $req){

        $data = Addresses::find($deviceID);

        $data->logged_user = $req->loggeduser;
        $data->public_ip = $req->ipaddress;
        $data->port = $req->port;

        $data->save();

        return redirect("/devices");
    }
}
