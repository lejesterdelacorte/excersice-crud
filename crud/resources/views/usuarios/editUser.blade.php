@extends('index')

@section('content')
<main class="content">
    <div class="form-heading">Modifique el Usuario</div>
    <form class='search-form' method="POST" action="{!! route('usuarios.update', ['usuario'=>$usuario->ID]) !!}" >
        @csrf
        @method('PUT')
        <label name='name' class='label-form'>Nombre</label>
        <input type="text" class="create-input" name="name" placeholder="{{ $usuario->NOMBRE }}"/>
        <label name='age' class='label-form'>Edad</label>
        <input type="number" class="create-input" name="age" placeholder="{{ $usuario->EDAD }}"/>
        <label name='gender' class='label-form'>Genero</label>
        <select name="gender" class="create-input">
            <option id=1 value='H'>Masculino</option>
            <option id=2 value='M'>Femenino</option>
        </select>
        <label name='Rol' class='label-form'>Rol</label>
        <select name="role" class="create-input">
            @foreach($roles as $rol)
                <option id='{{ $rol->ROLID }}' value='{{ $rol->ROLID }}'
                @if( $rol->ROLID == $usuario->ROLID) {{'selected'}} @endif>
                    {{ $rol->DESCRIPCION }}
                </option>
            @endforeach
        </select>
        <input type="submit" class="submit-search" value="Guardar"/>
    </form>
</main>
@endsection