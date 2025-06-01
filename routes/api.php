<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get("/users", function () {
    // $user = User::create([
    //     "name" => "User1",
    //     "email" => "user1@email.com",
    //     "password" => "1"
    // ]);

    // $user2 = User::create([
    //     "name" => "User2",
    //     "email" => "user2@email.com",
    //     "password" => "2"
    // ]);
    $user3 = User::create([
        "name" => "User3",
        "email" => "user3@email.com",
        "password" => "3"
    ]);

    return response()->json(["msg" => "ok"]);
});

Route::get("/teams", function () {
    // Vamos a crear un equipo
    $team = Team::create([
        'team_name' => "Equipo de prueba",
        "descripcion" => "Alguna descripcion",
        "url_team_photo" => "alguna url"
    ]);

    // $task = Task::create([
    //     "title" => "Titulo Tarea",
    //     "description" => "Alguna descripcion",
    //     // "team_id" => $team->id,
    //     "team_id" => "01972cb3-5ad0-7383-b444-a0cace131356"
    // ]);

    return response()->json([
        // // "id team" => $team->id,
        // "task" => $task
    ]);
});

Route::get("/asignar", function(){
    // $user1 = User::find(1);
    // $user2 = User::find(2);
    
    // Asiganmos los usuarios al equipo
    $team = Team::find("01972cfb-6392-71ae-8ddd-e3b6c1f953a5");
    $team->users()->syncWithoutDetaching([3]);

    return response()->json([
        "msg" => "ok"
    ]);
});

Route::get("/", function(){

});