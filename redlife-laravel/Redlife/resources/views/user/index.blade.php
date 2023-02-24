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
                    <!-- CONTENIDO -->
                    <div class="container ">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <h1>Friends</h1>
                                <hr>

                                <form action="{{route('searchUser')}}" method="GET">
                                    @csrf
                                    <div class="row justify-content-end">
                                        <div class="col-lg-6">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Nick, Name or LastName" name="search" id="search">
                                                <input class="btn btn-success" type="submit" value="Search">
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                @foreach ($users as $user)
                                    <div class="profileInfo">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4 image">
                                                <img src="{{ route('user.avatar', ['filename' => $user->image]) }}"
                                                    class="avatar" name="image" />
                                            </div>
                                            <div class="col-lg-8 info">
                                                <h1 id="profileNick">{{ '@' . $user->nick }}</h1>
                                                <h2>{{ $user->name . ' ' . $user->last_name }}</h2>
                                                <span
                                                    class="nick_public">{{ 'Se unio : ' . FormatTime::LongTimeFilter($user->created_at) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div>
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
