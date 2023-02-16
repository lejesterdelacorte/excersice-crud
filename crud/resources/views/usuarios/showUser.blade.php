@extends('index')

@section('content')
<nav class="navbar">
        <ul class="navbar-list">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('usuarios.create') }}" > Nuevo Usuario </a>
            </li>
        </ul>
</nav>
    <main class="content">
        <table id="user-table">
            <thead>
                <tr>
                    <th class='header-ele'>Nombre</th>
                    <th class='header-ele'>Edad</th>
                    <th class='header-ele'>Sexo</th>
                    <th class='header-ele'>Rol</th>
                    <th class='header-ele'>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class='tr-body'>
                    <td class='body-ele'>{{$user->NOMBRE}}</td>
                    <td class='body-ele'>{{$user->EDAD}}</td>
                    <td class='body-ele'>{{$user->SEXO}}</td>
                    <td class='body-ele'>{{$user->rol->DESCRIPCION}}</td>
                    <td class='body-ele'>
                        <a class="edit-btn" href="{{ route('usuarios.edit', ['usuario'=> $user->ID]) }}">Editar</a>
                        <form action="{{ route('usuarios.destroy', ['usuario'=> $user->ID]) }}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" onclick="deleteConfirm(event)">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id='chart' class='pie-chart'>
        </div>
    </main>
<script>
jQuery(document).ready(function () {
        $.ajaxSetup({ 
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            } 
        });
        var options =  {
            series: [],
            chart: {
            height: 350,
            type: 'pie',
        },
        labels: ['Hombres', 'Mujeres'],
        title: {
            text: 'Usuarios por Sexo',
        },
        noData: {
            text: 'Loading...'
        },
        xaxis: {
            
            type: 'category',
            tickPlacement: 'on',
            labels: {
            rotate: -45,
            rotateAlways: true
            }
        }
        };
        
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
        $.getJSON("{{route('sendData')}}", function(response) {
            let users = JSON.parse(response);
            chart.updateSeries([users[0].personas, users[1].personas])
        });
    });
</script>
@endsection