@extends('index')

@section('content')
    <main class="content">
        <div class="form-heading">Ingrese Nuevo Usuario</div>
        <form class='search-form' method="POST" action="{!! route('usuarios.store') !!}" >
            @csrf
            <label name='name' class='label-form'>Nombre</label>
            <input type="text" class="create-input" name="name" placeholder="Nombre"/>
            <label name='age' class='label-form'>Edad</label>
            <input type="number" class="create-input" name="age" placeholder="Edad"/>
            <label name='gender' class='label-form'>Genero</label>
            <select name="gender" class="create-input">
                <option id=1 value='H'>Masculino</option>
                <option id=2 value='M'>Femenino</option>
            </select>
            <label name='Rol' class='label-form'>Rol</label>
            <select name="role" class="create-input">
                @foreach($roles as $rol)
                    <option id='{{ $rol->ROLID }}' value='{{ $rol->ROLID }}'>{{ $rol->DESCRIPCION }}</option>
                @endforeach
            </select>
            <input type="submit" class="submit-search" value="Guardar"/>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </main>
@endsection