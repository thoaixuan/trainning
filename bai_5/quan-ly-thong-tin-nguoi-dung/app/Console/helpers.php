<?php
use App\Models\User;

function checkLogin(){
    return $user=User::get();
     
    }