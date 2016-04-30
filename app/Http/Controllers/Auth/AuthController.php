<?php

namespace CodeCommerce\Http\Controllers\Auth;

use CodeCommerce\User;
use Validator;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'cep'      => 'max:8',
            'cpf'      => 'required|size:11',
            'endereco' => 'required',
            'complemento' => 'max:50',
            'numero_endereco' => 'integer',
            'bairro'          => 'required|max:30',
            'uf'              => 'required|size:2',
            'cidade'          => 'required|max:40',
            'pais'            => 'required|max:30',
            'data_nascimento'  => 'required|date_format:d/m/Y'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cep'      => $data['cep'],
            'cpf'      => $data['cpf'],
            'endereco' => $data['endereco'],
            'complemento' => $data['complemento'],
            'numero_endereco' => $data['numero_endereco'],
            'bairro'          => $data['bairro'],
            'uf'              => $data['uf'],
            'cidade'          => $data['cidade'],
            'pais'            => $data['pais'],
            'data_nascimento' => date('Y-m-d',strtotime($data['data_nascimento']))
        ]);
    }
}
