<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'name' => '',
    'email' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered($user = User::create($validated)));

    Auth::login($user);

    $this->redirect(route('dashboard', absolute: false), navigate: true);
};

?>

<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4">
    <!-- Logo -->
    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mb-6 w-24 h-auto">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6 border-t-8 border-orange-700">
        <h2 class="text-2xl font-bold text-center text-orange-700 mb-6">Crie sua conta</h2>

        <form wire:submit="register" class="space-y-4">
            <!-- Nome -->
            <div>
                <x-input-label for="name" :value="__('Nome:')" class="text-orange-800 font-semibold" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email:')" class="text-orange-800 font-semibold" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Senha -->
            <div>
                <x-input-label for="password" :value="__('Senha:')" class="text-orange-800 font-semibold" />
                <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                              type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirmar Senha -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirme sua senha:')" class="text-orange-800 font-semibold" />
                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                              type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Ações -->
            <div class="flex items-center justify-between">
                <a class="underline text-sm text-gray-600 hover:text-orange-700" href="{{ route('login') }}" wire:navigate>
                    Já possui uma conta?
                </a>

                <x-primary-button class="bg-orange-700 hover:bg-orange-800 text-white font-bold py-2 px-4 rounded">
                    Cadastrar
                </x-primary-button>
            </div>

            <!-- Login com o Google -->
            <a href="/socialite/google"
               class="flex items-center justify-center gap-3 mt-6 py-2 px-4 bg-blue-700 hover:bg-blue-800 text-white rounded shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                    <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                </svg>
                Entrar com o Google
            </a>
        </form>
    </div>
</div>
