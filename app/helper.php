<?php
const IS_TERKIRIM = 0;
const IS_DITERIMA = 1;
const IS_DITOLAK = 2;
const IS_DIPROSES = 3;
const IS_SELESAI_DIPROSES = 4;
const IS_TUNTAS = 5;


function status($status){
    switch ($status) {
        case 0:
            return "Terkirim";
            break;
        case 1:
            return "Diterima";
            break;
        case 2:
            return "Ditolak";
            break;
        case 3:
            return "Diproses";
            break;
        case 4:
            return "Selesai Diproses";
            break;
        case 5:
            return "Tuntas";
            break;
        default:
            return "Terkirim";
    }
}

function badge($status){
    switch ($status) {
        case 0:
            return "bg-secondary";
            break;
        case 1:
            return "bg-primary";
            break;
        case 2:
            return "bg-danger";
            break;
        case 3:
            return "bg-warning text-dark";
            break;
        case 4:
            return "bg-dark";
            break;
        case 5:
            return "bg-success";
            break;
        default:
            return "bg-secondary";
    }
}



?>