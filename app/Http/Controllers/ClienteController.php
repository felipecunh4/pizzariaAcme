<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteLoginRequest;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function loginCliente(ClienteLoginRequest $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->back()->with('success', 'Bem vindo, ' . Auth::user()->nm_cliente);
        }
    }

    public function saveCliente(ClienteRequest $request){
        //dd($request->all());
        $clienteEmail = Cliente::where('email', '=', $request->email)->get();
        $clienteCpf = Cliente::where('cpf_cliente', '=', $request->cpf_cliente)->get();

        if(count($clienteEmail) > 0)
            return redirect()->back()->with('nosuccess', 'Email já cadastrado em outra conta.');
        elseif (count($clienteCpf) > 0)
            return redirect()->back()->with('nosuccess', 'CPF já cadastrado em outra conta.');

        DB::beginTransaction();

        try{
            $cliente = Cliente::create([
                'nm_cliente' => $request->nm_cliente,
                'sobrenome_cliente' => $request->sobrenome_cliente,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'cpf_cliente' => $request->cpf_cliente,
                'dt_nasc_cliente' => $request->dt_nasc_cliente,
                'cel_cliente' => $request->cel_cliente,
            ]);
        }
        catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('nosuccess', 'Erro ao cadastrar cliente.');
        }

        DB::commit();
        Auth::login($cliente);
        return redirect()->back()->with('success', 'Você foi cadastrado com sucesso.');
    }

    public function createCliente(){

    }
}
