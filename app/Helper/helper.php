<?php

use App\Models\User;
    function name(){
        return "Rar Zar";
    }

    function mapHelper(){
        $users = User::get()->map(function($user){
            $user->name = strtoupper($user->name);
            return $user;
        });

        dd($users->toArray());
    }
?>