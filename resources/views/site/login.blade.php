@extends('site.layouts.padrao')
@section('titulo', 'Login')

@push('links')
    <link rel="stylesheet" href="{{asset('css/site/login.css')}}">
@endpush
@section('conteudo')
    <div class="h-screen flex items-center justify-center flex-col w-[90%] md:w-[40%] mx-auto">
        <h1 class="self-start font-poppins font-semibold text-purple-700">Faça login para usar nossas Ferramentas</h1>
        <div class="bg-gray-100 border-[3px] border-purple-700 rounded-lg w-full">
            <form action="{{route('site.logar')}}" method="POST" class="flex flex-col p-2">
                @csrf

                @error('credenciais')
                <p class="text-red-600 text-lg font-poppins mb-1 pl-1 text-center">{{ $message }}</p>
                @enderror

                <label for="email" class="font-poppins font-medium pl-1">Seu e-mail</label>
                <input type="email" placeholder="Digite seu e-mail" name="email" class="text-[15px] font-poppins rounded-md bg-gray-300 mx-1 outline-none px-1 py-2 {{ $errors->has('email') ? "mb-1" : 'mb-5' }}" value="{{old('email')}}">
                @error('email')
                    <p class="text-red-600 text-[13px] font-poppins mb-5 pl-1">{{ $message }}</p>
                @enderror

                <label for="password" class="font-poppins font-medium pl-1">Sua senha</label>
                <input type="password" placeholder="Digite sua senha" name="password" class="text-[15px] font-poppins rounded-md bg-gray-300 mx-1 outline-none px-1 py-2 {{ $errors->has('password') ? "mb-1" : 'mb-5' }}" value="{{old('password')}}">
                @error('password')
                <p class="text-red-600 text-[13px] font-poppins mb-5 pl-1">{{ $message }}</p>
                @enderror

                <button type="submit" class="py-2 px-3 mt-2 bg-purple-700 font-poppins text-white rounded-full hover:bg-purple-600 transition-all">Entrar</button>
            </form>

            <p class="font-poppins pt-1 text-center">Não tem Conta? <a href="{{route('site.cadastro')}}" class="text-purple-700 hover:underline transition-all">Crie uma conta aqui</a></p>
        </div>
    </div>
@endsection