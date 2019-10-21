@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
   @forelse($article->resources as $key=> $resource )
    <div class="carousel-item {{$key==0?'active':''}}" style="height: 250px">
      <img src="{{route('get-image',$resource->name)}}" class="d-block w-100">
    </div>
   @empty
     <h3>No  hay recursos por mostrar </h3>
   @endforelse
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

		</div>
		<div class="row">
			<div class="col-md-6">
				
				<div class="jumbotron">
				  <h2 class="display-4">{{$article->name}}</h1>
				  <p class="lead">{{$article->description}}</p>
				  <hr class="my-4">
				  <p>
				  	<b>Categoria: </b>{{optional($article->category)->name}}
				  	<br/>
				  	<b>Autor: </b>{{optional($article->user)->name}}
				  	<br/>
				  	<b>Publicación: </b>{{$article->created_at->diffForHumans()}}
				  	<br/>
				  </p>
				  <a class="btn btn-danger btn-lg" href="{{route('articles.index')}}" role="button">REGRESAR</a>
				</div>
				

			</div>
			<div class="col-md-6" style="padding: 8px">
				<div id="disqus_thread"></div>
			</div>
			
		</div>
		
	</div>
@endsection
@push('jsCustom')
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://eliberiocapint.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endpush