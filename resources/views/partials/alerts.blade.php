<div class="container">
    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{session('success')}}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-primary" role="alert">
            {{session('error')}}
        </div>
    @endif

    @if($errors->any())
        <div class="alertFooter alertFooter-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>