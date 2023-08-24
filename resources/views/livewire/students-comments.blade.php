<section class="mt-4">
    <!-- Encabezado de la sección de comentarios -->
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Comentarios de la lección</h1>

    <!-- Verificar si el usuario está inscrito en el curso -->
    @can('enrolled', $course)
        <div class="article mb-4">
            <div class="article mb-4">
                <!-- Área para ingresar un nuevo comentario -->
                <textarea wire:model="newComment" class="form-input rounded-md w-full" rows="3" placeholder="Ingrese un comentario"></textarea>
                @error('newComment')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <!-- Agregar campo para subir la imagen -->
                <div class="mt-2 ml-2 mr-2"> Agregar imagen
                    <input type="file" wire:model="image" class="form-input mt-2">
                </div>
                @if ($image)
                    <!-- Mostrar imagen previamente cargada y botón para eliminarla -->
                    <div class="mt-4 flex justify-between items-center ">
                        <div>
                            <img src="{{ $image->temporaryUrl() }}" alt="Imagen del comentario"
                                class="w-full max-w-xs h-auto">
                        </div>
                        <div class="flex items-center">
                            <button class="btn-danger_rojo rounded-lg px-4 py-2 text-sm mr-2"
                                wire:click="clearImage">Eliminar Imagen</button>
                            <div class="flex justify-end">
                                <button class="btn-primary_azul rounded-lg px-4 py-2 text-sm ml-2"
                                    wire:click="saveComment">Guardar </button>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Botón para guardar el comentario -->
                    <div class="flex justify-end mt-2">
                        <button class="btn-primary_azul rounded-lg px-4 py-2 text-sm mr-4" wire:click="saveComment">Guardar
                        </button>
                    </div>
                @endif
            </div>
        </div>
    @endcan

    <!-- Sección para mostrar los comentarios -->
    <div class="card">
        <div class="card-body">
            <!-- Contar y mostrar el número de comentarios -->
            <p class="text-gray-800 text-xl mt-2">{{ $comments->count() }} comentarios</p>

            <!-- Iterar a través de cada comentario -->




            @foreach ($comments as $comment)
                @if ($comment['parent_comment_id'] === null)
                    <!-- Mostrar comentario principal -->

                    @php
                        $currentUser = auth()->user();
                        $commentUser = \App\Models\User::find($comment->user_id);
                        $isCommentCreator = $currentUser && $commentUser && $currentUser->id === $commentUser->id;
                        $isAdminOrInstructor = $currentUser && ($currentUser->hasRole('instructor') || $currentUser->hasRole('admin'));
                        $isResponse = $comment->parent_comment_id !== null;
                    @endphp




                    <article class="flex mb-4 text-gray-800 mt-2">
                        <figure class="mr-8">
                            <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                                src="{{ $commentUser->profile_photo_url }}" alt="">
                        </figure>
                        <div class="card flex-1">
                            <div class="card-body bg-slate-300">
                                <!-- Nombre del usuario que realizó el comentario -->
                                <p><b>{{ $commentUser->name }}</b></p>
                                <!-- Contenido del comentario -->
                                <p>{{ $comment->comment }}</p>
                                @if ($comment->image_path)
                                    <div class="mt-4">
                                        <!-- Establecer un ancho máximo para la imagen -->
                                        <img src="{{ Storage::url($comment->image_path) }}" alt="Imagen del comentario"
                                            class="w-500  h-500">
                                    </div>
                                @endif

                                <!-- Mostrar la opción de responder si no es una respuesta -->
                                @if (!$isResponse)
                                    <p class="text-sm text-blue-600 cursor-pointer mt-5"
                                        wire:click="startReply({{ $comment->id }})">Responder a este comentario</p>
                                @endif

                                <div class="mt-2">
                                    <!-- Mostrar botones de Editar y Borrar para comentarios propios o de instructores/admins -->
                                    @if ($isCommentCreator || $isAdminOrInstructor)
                                        <!-- Mostrar formulario de edición o botones de Editar y Borrar -->
                                        @if ($editCommentId === $comment->id && !$isResponse)
                                            <!-- Formulario de edición -->
                                            <form wire:submit.prevent="saveEditedComment">
                                                <textarea wire:model="editedComment" class="form-input rounded-md w-full" rows="3"></textarea>
                                                <div class="flex justify-end mt-4">
                                                    <button class="btn-danger_rojo rounded-lg px-4 py-2 mr-4 text-sm"
                                                        wire:click="cancelEditComment">Cancelar</button>
                                                    <button
                                                        class="btn-primary_azul rounded-lg px-4 py-2 text-sm">Guardar
                                                        cambios</button>
                                                </div>
                                            </form>
                                        @else
                                            <!-- Botones de Editar y Borrar del comentario y la respuesta -->
                                            <div class="flex justify-end mt-4">
                                                <button class="btn-primary_azul rounded-lg px-4 py-2 mr-4 text-sm"
                                                    wire:click="editComment({{ $comment->id }})"><i
                                                        class="fas fa-edit text-white-400 mr-2"></i>
                                                    Editar</button>
                                                <button class="btn-danger_rojo rounded-lg px-4 py-2 text-sm "
                                                    wire:click="deleteComment({{ $comment->id }})"><i
                                                        class="fas fa-trash"></i>
                                                    Borrar</button>
                                            </div>
                                        @endif
                                    @endif
                                    {{-- CODIGO PARA PONER LA RESPUESTA DEL COMENTARIO --}}


                                    {{-- CODIGO PARA PONER LA RESPUESTA DEL COMENTARIO --}}
                                    <!-- Mostrar botones para agregar una respuesta al comentario -->
                                    @if (!$isResponse && $replyToCommentId === $comment->id)
                                        <div class="ml-8 mt-2">
                                            <textarea wire:model="replyComment" class="form-input rounded-md w-full" rows="2"
                                                placeholder="Responder al comentario"></textarea>
                                            <div class="flex justify-end mt-2">
                                                <button class="btn-primary_azul rounded-lg px-4 py-2 text-sm"
                                                    wire:click="saveReply">Guardar</button>
                                                <button class="btn-danger_rojo rounded-lg px-4 py-2 text-sm ml-2"
                                                    wire:click="cancelReply">Cancelar</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>

                    <!-- Mostrar respuestas para el comentario principal actual -->
                    @foreach ($comments as $reply)
                        @if ($reply['parent_comment_id'] === $comment['id'])
                            @php
                                $currentUserR = auth()->user();
                                $commentUserR = \App\Models\User::find($reply->user_id);
                                $isCommentCreatorR = $currentUserR && $commentUserR && $currentUserR->id === $commentUserR->id;
                                $isAdminOrInstructorR = $currentUserR && ($currentUserR->hasRole('instructor') || $currentUserR->hasRole('admin'));
                                $isResponseR = $comment->parent_comment_id !== null;
                            @endphp



                            <h1 class="font-bold text-XLS text-gray-800 mb-2"></h1>
                            <article class="flex mb-4 text-gray-800 mt-2 ml-8 ">
                                <figure class="mr-8">
                                    <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                                        src="{{ $commentUserR->profile_photo_url }}" alt="">
                                </figure>
                                <div class="card flex-1">
                                    <div class="card-body bg-slate-300">
                                        <!-- Nombre del usuario que realizó el comentario -->
                                        <p><b>{{ $commentUserR->name }}</b></p>
                                        <!-- Contenido del comentario -->
                                        <p>{{ $reply->comment }}</p>
                                        @if ($reply->image_path)
                                            <div class="mt-4">
                                                <!-- Establecer un ancho máximo para la imagen -->
                                                <img src="{{ Storage::url($reply->comment->image_path) }}"
                                                    alt="Imagen del comentario" class="w-500  h-500">
                                            </div>
                                        @endif

                                        <!-- Mostrar la opción de responder si no es una respuesta -->


                                        <div class="mt-2">
                                            <!-- Mostrar botones de Editar y Borrar para comentarios propios o de instructores/admins -->
                                            @if ($isCommentCreatorR || $isAdminOrInstructorR)
                                                <!-- Mostrar formulario de edición o botones de Editar y Borrar -->
                                                @if ($editCommentId === $reply->id && !$isResponseR)
                                                    <!-- Formulario de edición -->
                                                    <form wire:submit.prevent="saveEditedComment">
                                                        <textarea wire:model="editedComment" class="form-input rounded-md w-full" rows="3"></textarea>
                                                        <div class="flex justify-end mt-4">
                                                            <button
                                                                class="btn-danger_rojo rounded-lg px-4 py-2 mr-4 text-sm"
                                                                wire:click="cancelEditComment">Cancelar</button>
                                                            <button
                                                                class="btn-primary_azul rounded-lg px-4 py-2 text-sm">Guardar
                                                                cambios</button>
                                                        </div>
                                                    </form>
                                                @else
                                                    <!-- Botones de Editar y Borrar del comentario y la respuesta -->
                                                    <div class="flex justify-end mt-4">
                                                        <button
                                                            class="btn-primary_azul rounded-lg px-4 py-2 mr-4 text-sm"
                                                            wire:click="editComment({{ $reply->id }})"><i
                                                                class="fas fa-edit text-white-400 mr-2"></i>
                                                            Editar</button>
                                                        <button class="btn-danger_rojo rounded-lg px-4 py-2 text-sm "
                                                            wire:click="deleteComment({{ $reply->id }})"><i
                                                                class="fas fa-trash"></i>
                                                            Borrar</button>
                                                    </div>
                                                @endif
                                            @endif
                                            {{-- CODIGO PARA PONER LA RESPUESTA DEL COMENTARIO --}}


                                            {{-- CODIGO PARA PONER LA RESPUESTA DEL COMENTARIO --}}
                                            <!-- Mostrar botones para agregar una respuesta al comentario -->
                                            @if (!$isResponse && $replyToCommentId === $comment->id)
                                                <div class="ml-8 mt-2">
                                                    <textarea wire:model="replyComment" class="form-input rounded-md w-full" rows="2"
                                                        placeholder="Responder al comentario"></textarea>
                                                    <div class="flex justify-end mt-2">
                                                        <button class="btn-primary_azul rounded-lg px-4 py-2 text-sm"
                                                            wire:click="saveReply">Guardar</button>
                                                        <button
                                                            class="btn-danger_rojo rounded-lg px-4 py-2 text-sm ml-2"
                                                            wire:click="cancelReply">Cancelar</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</section>
















































{{-- <section class="mt-4">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Comentarios de la lección</h1>

    @can('enrolled', $course)
        <article class="mb-4">
            <textarea wire:model="newComment" class="form-input rounded-md w-full" rows="3" placeholder="Ingrese un comentario"></textarea>
            <div class="flex items-center">
                <button class="btn btn-danger mr-2" wire:click="saveComment">Guardar</button>
            </div>
        </article>
    @endcan

    <div class="card">
        <div class="card-body">
            <p class="text-gray-800 text-xl mt-2">{{ $comments->count() }} comentarios</p>

            @foreach ($comments as $comment)
                @php
                    $currentUser = auth()->user();
                    $commentUser = DB::table('users')
                        ->where('id', $comment->user_id)
                        ->first();
                    $isCommentCreator = $currentUser && $commentUser && $currentUser->id === $commentUser->id;
                    $isAdminOrInstructor = $currentUser && ($currentUser->hasRole('instructor') || $currentUser->hasRole('admin'));
                @endphp
                <article class="flex mb-4 text-gray-800 mt-2">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                            src="http://cursos.test/storage/{{ $commentUser->profile_photo_path }}" alt="">
                    </figure>
                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{ $commentUser->name }}</b></p>

                            @if ($editCommentId === $comment->id)
                                <!-- Mostrar formulario de edición -->
                                <form wire:submit.prevent="saveEditedComment">
                                    <textarea wire:model="editedComment" class="form-input rounded-md w-full" rows="3"></textarea>
                                    <div class="flex justify-end mt-4">
                                        <!-- Div para alinear los botones a la derecha -->
                                        <button class="btn-danger_rojo rounded-lg px-4 py-2 mr-4 text-sm"
                                            wire:click="cancelEditComment">Cancelar</button>
                                        <button class="btn-primary_azul rounded-lg px-4 py-2 text-sm">Guardar
                                            cambios</button>
                                    </div>
                                </form>
                            @else
                                <p>{{ $comment->comment }}</p>
                                @if ($isCommentCreator || $isAdminOrInstructor)
                                    <div class="flex justify-end mt-4">
                                        <!-- Div para alinear los botones a la derecha -->
                                        <button class="btn-primary_azul rounded-lg px-4 py-2 mr-4 text-sm"
                                            wire:click="editComment({{ $comment->id }})"><i class="fas fa-edit text-white-400 mr-2"></i>
                                            Editar</button>
                                        <button class="btn-danger_rojo rounded-lg px-4 py-2 text-sm "
                                            wire:click="deleteComment({{ $comment->id }})"><i class="fas fa-trash"></i>
                                            Borrar</button>
                                    </div>
                                @endif
                            @endif

                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
 --}}
