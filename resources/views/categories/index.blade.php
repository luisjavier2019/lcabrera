@extends('layouts.app')
@section('content')

<div class="container"> 
    <div class="card">
    <div class="card-header bg-primary text-white">
        Lista de Categorias
    </div>
    <div class="card-body">
        <h5 class="card-title">Categorias</h5>
        <p class="card-text">Listado con todas las categorias que tiene la empresa NPI.</p>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">AGREGAR</a>
        
        {!! Form::open(['method'=>'GET','route'=>'categories.index']) !!}
        {!! Form::text('filter',request()->get('filter'),['class'=>'form-control','placeholder'=>'Buscar nombre de categoria']) !!}
        {!! Form::close() !!}

        <hr/>
        <table class="table">
            <tr>
               <th>ID</th>
               <th>NOMBRE</th>
               <th>SLUG</th>
               <th>DESCRIPCIONES</th>   
               <th>ACCIONES</th>
            </tr>
            @forelse($categories as $category)
            <tr>
               <td>{{$category->id}}</td>
               <td>{{$category->name}}</td>
               <td>{{$category->slug}}</td>
               <td>{{$category->description}}</td>
               <td>
                {!! Form::open(['route'=>['categories.destroy',$category],'method'=>'DELETE','onsubmit'=>'return confirm("Estas seguro que quieres eliminar?")']) !!}

               <a href="{{ route('categories.edit',$category) }}" class="btn btn-primary">EDITAR</a>
               {!!Form::submit('ELIMINAR',['class'=>'btn btn-danger'])!!}

               {!! Form::close()!!}
               </td>   
            </tr>
            @empty
                <tr><td colspan="4"> NO HAY REGISTROS</td></tr>
            @endforelse
        </table>
        {!! $categories->render() !!}

    </div>
    </div>
</div>


@endsection

