<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;

class MainController extends Controller
{
    public function main(Request $req){

        $data = Addresses::where("public_ip", $req->ipaddress)->first();

        return view("home", [
            "data" => $data
        ]);
    }

    public function fetchData($ipaddress){

        $data = Addresses::where("public_ip", $ipaddress)->first();

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
}
