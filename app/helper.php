<?php

use Illuminate\Support\Facades\Auth;

const IS_TERKIRIM = 0;
const IS_DIPROSES = 1;
const IS_SELESAI_DIPROSES = 2;
const IS_TUNTAS = 3;

function role($role){
    if ($role === 'admin'){
        return auth()->guard('employee')->user()->isAdmin == true;
    } else {
        return auth()->guard('employee')->user()->isAdmin == false;
    }
    
}

function roleController($role){
    if ($role === 'admin'){
        return Auth::guard('employee')->user()->isAdmin == true;
    } else {
        return Auth::guard('employee')->user()->isAdmin == false;
    }
    
}

function isOverBudget($budget, $subtotal){
    if($budget === null || $subtotal === null){
        return false;
    }
    if($budget == '10-25 juta (max 2x revisi)'){
        if($subtotal > 25000000){
            return true;
        } else {
            return false;
        }
    } else if($budget == '25-50 juta (max 3x revisi)'){
        if($subtotal > 50000000){
            return true;
        } else {
            return false;
        }
    } else if($budget == '50-75 juta (max 4x revisi)'){
        if($subtotal > 75000000){
            return true;
        } else {
            return false;
        }
    } else if($budget == '75-100 juta (max 5x revisi)'){
        if($subtotal > 100000000){
            return true;
        } else {
            return false;
        }
    } else if($budget == '100-500 juta (unlimited revisi)'){
        if($subtotal > 500000000){
            return true;
        } else {
            return false;
        }
    } else if($budget == '500 juta - 1 Miliar (unlimited revisi)'){
        if($subtotal > 1000000000){
            return true;
        } else {
            return false;
        }
    } 
}



?>