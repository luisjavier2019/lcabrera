@extends('layouts.app')
@section('content')
    <div class="container"> 
        <div class="card">
        <div class="card-header bg-primary text-white">
            Lista de Usuarios
        </div>
        <div class="card-body">
            <h5 class="card-title">Usuarios</h5>
            <p class="card-text">Listado con todas los usuarios que tiene la empresa Interagua.</p>
            <a href="{{ route('users.create') }}" class="btn btn-primary">AGREGAR</a>
            
            {!! Form::open(['method'=>'GET','route'=>'users.index']) !!}
            {!! Form::text('filter',request()->get('filter'),['class'=>'form-control','placeholder'=>'Buscar nombre de categoria']) !!}
            {!! Form::close() !!}
            <hr/>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>   
                    <th>ACCIONES</th>
                </tr>
                @forelse($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        {!! Form::open(['route'=>['users.destroy',$user],'method'=>'DELETE','onsubmit'=>'return confirm("Estas seguro que quieres eliminar?")']) !!}
                            <a href="{{ route('users.edit',$user) }}" class="btn btn-primary">EDITAR</a>
                            {!!Form::submit('ELIMINAR',['class'=>'btn btn-danger'])!!}
                        {!! Form::close()!!}
                    </td>   
                </tr>
                @empty
                    <tr><td colspan="4"> NO HAY REGISTROS</td></tr>
                @endforelse
            </table>
            {!! $users->render() !!}
        </div>
        </div>
    </div>
@endsection

