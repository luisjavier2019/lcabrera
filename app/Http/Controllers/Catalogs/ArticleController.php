<?php
namespace App\Http\Controllers\Catalogs;
use App\Core\Eloquent\{Article,Category,Resource};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use DB;
use Facades\App\Core\Facades\AlertCustom;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return redirect()->route('home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id')->toArray();
        return view('articles.create',compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        DB::transaction(function() use($request){
                $objArticle=Article::create($request->validated());
                $objArticle->resources()->saveMany(
                    (new Resource)->assign($request->file('resources'))
                 );
        });
        AlertCustom::success('Guardado correctamente');
        return redirect()->route('articles.index');
    
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Core\Eloquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Core\Eloquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Core\Eloquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Core\Eloquent\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}