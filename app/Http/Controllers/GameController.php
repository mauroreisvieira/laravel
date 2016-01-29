<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Cache;
use App\Game;
use DB;


class GameController extends Controller {

    public function createGame() {

        $arrayGame= array(
            'name' => "Novo Jogo"
        );

        $idGame = DB::table('game')->insertGetId($arrayGame);


        return json_encode($idGame);
    }
}