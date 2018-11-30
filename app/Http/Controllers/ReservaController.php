<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservasRequest;
use App\Reservas;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function painelReserva(){
        $reservas = Reservas::all();

        return view('pages.admin.reservas', compact('reservas'));
    }

    public function saveReserva(ReservasRequest $request){
        //dd($request->all());

        try{
            $telFormatado = str_replace('(', '', $request->tel_contato);
            $telFormatado = str_replace(')', '', $telFormatado);
            $telFormatado = str_replace('-', '', $telFormatado);
            $telFormatado = str_replace(' ', '', $telFormatado);

            $data = substr($request->dia_reserva, 6,4) .
                "-" . substr($request->dia_reserva, 3,2) .
                "-" . substr($request->dia_reserva, 0,2);

            Reservas::create([
                'nm_cliente' => $request->nm_cliente,
                //'dia_reserva' => date_create($data)->format('Y-m-d'),
                'dia_reserva' => $data,
                'email' => $request->email,
                'qtd_pessoas' => $request->qtd_pessoas,
                'tel_contato' => $telFormatado,
                'hora_reserva' => $request->hora_reserva.':00',
            ]);
        }
        catch (\Exception $e){
            //throw $e;
            return redirect()->back()->with('success', 'Erro ao realizar reserva.');
        }

        return redirect()->back()->with('success', 'Reserva feita com sucesso, agora aguarde resposta do restaunte.');
    }
}
