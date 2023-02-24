<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Redlife
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <h1>CONFIG PAGE</h1>

                   <x-guest-layout>
                    <x-auth-card>
                        <x-slot name="logo">
                    
                        </x-slot>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div>
                            @if (session('message'))
                                <div>
                                    {{ session('message')}}
                                </div>
                            @endif

                        </div>

                        <form method="POST" action="users/{{ Auth::user()->id }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus />
                            </div>

                            <!-- LastName -->
                            <div>
                                <x-label for="last_name" :value="__('LastName')" />

                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ Auth::user()->last_name }}" required autofocus />
                            </div>

                            <!-- Nick -->
                            <div>
                                <x-label for="nick" :value="__('Nick')" />

                                <x-input id="nick" class="block mt-1 w-full" type="text" name="nick" value="{{ Auth::user()->nick }}" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email }}" required />
                            </div>

                            <!-- Image  -->
                            <div class="mt-4">
                                <label for="image">Avatar</label>
                                <!-- get Image  -->
                                @include('includes.avatar')
                                <x-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" value=""  />
                            </div>
                                                            
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Actualizar') }}
                                </x-button>
                            </div>
                        </form>
                    </x-auth-card>
                </x-guest-layout>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
