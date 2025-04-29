<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteAdm extends Controller
{
    public function vistaReporteAdm(){
        return view('reportesAdmin');
    }
    
    public function addDestinoRepo(request $newDest){
        $VnewDest=$newDest->validate([
            'destino'=>'required',
        ]);
        
        session()->flash('exitodesadd');
        
        return to_route('rutaadminReporte');
    }

    public function addAeroRepo(request $newDest){
        $VnewDest=$newDest->validate([
            'aerolinea'=>'required',
        ]);
        
        session()->flash('exitoaeroadd');
        
        return to_route('rutaadminReporte');
    }

    public function addClienRepo(request $newDest){
        $VnewDest=$newDest->validate([
            'cliente'=>'required',
        ]);
        
        session()->flash('exitoClienadd');
        
        return to_route('rutaadminReporte');
    }




    public function delDestinoRepo(request $newDest){
        session()->flash('exitoDestdel');
        return to_route('rutaadminReporte');
    }


    public function delAeroRepo(request $newDest){
        session()->flash('exitoAerodel');
        return to_route('rutaadminReporte');
    }

    public function delClienRepo(request $newDest){
        session()->flash('exitocliedel');
        return to_route('rutaadminReporte');
    }

}
