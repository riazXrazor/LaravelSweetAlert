<?php

namespace Riazxrazor\LaravelSweetAlert;

class LaravelSweetAlert
{

    public static function setMessage($msg,$task = '')
    {
        session()->flash('LaravelSweetAlertMessage',json_encode($msg));
        if($task)
            session()->flash('task',$task);
    }

    public static function getMessage()
    {
        $data = session('LaravelSweetAlertMessage');
        return $data;
    }

    public static function getTask()
    {
        $data = session('LaravelSweetAlerttask');
        return $data;
    }

    public static function setMessageSuccess($text)
    {
        self::setMessage([
            'title' => 'Successful',
            'text' => $text,
            'timer' => 2000,
            'type' => 'success',
            'showConfirmButton' =>false
        ]);
    }

    public static function setMessageSuccessConfirm($text)
    {
        self::setMessage([
            'title' => 'Successful',
            'text' => $text,
            'type' => 'success',
            'showConfirmButton' =>true,
            'allowOutsideClick' => false
        ]);
    }

    public static function setMessageError($text)
    {
        self::setMessage([
            'title' => 'Opps !!',
            'text' => $text,
            'timer' => 2000,
            'type' => 'error',
            'showConfirmButton' =>false
        ]);
    }

    public static function setMessageErrorConfirm($text)
    {
        self::setMessage([
            'title' => 'Opps !!',
            'text' => $text,
            'type' => 'error',
            'showConfirmButton' =>true,
            'allowOutsideClick' => false
        ]);
    }

}