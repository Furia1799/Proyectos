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
                        @if (session('images'))
                            {{ session('images') }}
                        @endif

                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div>
                                    @include('includes.message')
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        @if ($image->user->image)
                                            <div class="avatar_public">
                                                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}"
                                                    class="avatar" name="image" />
                                            </div>
                                        @endif
                                        <div class="name_public">
                                            {{ $image->user->name . ' ' . $image->user->last_name }}
                                            <span class="nick_public">
                                                {{ ' | @' . $image->user->nick }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="image_public">
                                            <img id="image_public"
                                                src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
                                        </div>

                                        <?php $user_like = false; ?>
                                        @foreach ($image->likes as $like )
                                            @if ($like->user->id == Auth::user()->id)
                                                <?php $user_like = true; ?>
                                            @endif
                                        @endforeach
                                                
                                        <div class="likes_public">
                                            @if ($user_like)
                                                <i id="star" class="bi bi-star-fill btn-like" data-id="{{$image->id}}"></i>   
                                            @else
                                                <i id="star-2" class="bi bi-star-fill btn-dislike" data-id="{{$image->id}}"></i>
                                            @endif
                                            <span class="number-like">{{ count($image->likes) }}</span>
                                            <!--<p id="hola">Hola</p> -->
                                            <a href=""><i id="comment" class="bi bi-chat-left-text"></i>
                                                ({{ count($image->comments) }})</a>
                                        </div>
                                        
                                        <!--
                                        <div class="likes_public">
                                                <i id="star" class="bi bi-star" ></i>
                                            <a href=""><i id="comment" class="bi bi-chat-left-text"></i>
                                                
                                        </div>
                                        -->
                                        <div class="description_public">
                                            <span class="nick_public">{{ '@' . $image->user->nick }}</span>
                                            <p>{{ $image->description }}</p>
                                            @if ($image->user_id == Auth::user()->id)
                                                <div class="buttons">
                                                    <!--
                                                    <form action="{{ route('image.destroy', ['image' => $image->id])}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-sm btn-primary" value="Editar">
                                                    </form>-->
                                                    <a href="{{ route('image.edit', ['image' => $image->id])}}" class="btn btn-sm btn-primary">Editar</a>
                                                    <!--Modal Eliminar-->
                                                    <!-- Button to Open the Modal -->
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#myModalEliminar">
                                                        Eliminar
                                                    </button>

                                                    <!-- The Modal -->
                                                    <div class="modal" id="myModalEliminar">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">¿Estas Seguro?</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    Si eliminas esta imagen nunca podras recuperarla, ¿Estas seguro de quererla borrar?
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                                                    <form action="{{ route('image.destroy', ['image' => $image->id])}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="submit" class="btn btn-danger" value="Eliminar">
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                
                                                </div>
                                            @endif
                                            <!--<span class="nick_public">{{ ' | ' . $image->created_at }}</span>-->
                                            <span
                                                class="nick_public">{{ ' | ' . FormatTime::LongTimeFilter($image->created_at) }}</span>
                                            <form action="{{ route('comment.store') }}" method="POST">
                                                @csrf
                                                <div class="text_coment">
                                                    <input type="hidden" name="image_id" value="{{ $image->id }}" />
                                                     @if ($errors->has('content'))
                                                        <span style="color: red"><strong>{{ $errors->first('content') }}</strong></span>
                                                        <br>
                                                    @endif
                                                    <textarea class="form-control" name="content"  id="text_comment"  placeholder="Añadir Comentario..." rows="1"></textarea>
                                                    <input  class="btn btn-primary" type="submit" value="Enviar" id="btn_submit"/>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="comments">
                                            @foreach ($image->comments as $comment)
                                                <span>{{ '@' . $comment->user->nick . ' | ' .  FormatTime::LongTimeFilter($comment->created_at)}} </span>
                                                <p>{{ $comment->content}}</p>
                                                <form action="{{ route('comment.destroy',['comment' => $comment->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if (Auth::check() && ( $comment->user_id ==Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                                    <input type="submit" value="Deleted..." class=""/>
                                                    <br>
                                                @endif    
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
