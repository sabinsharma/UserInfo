<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception{
    public function render()
    {
        //return redirect()->to('/create')->with('exceptions',$this);
        back()->withInput()->with('exceptions',$this);
    }
}