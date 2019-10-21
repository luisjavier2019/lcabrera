<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CountArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:articlecounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para contar articulos y notificar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->info("Inicio del proceso de notificacion");

        $message=\App\Core\Eloquent\Article::count();

        $message="A la fecha :".Carbon\Carbon::now()." hay ".$message." artículos";

        $this->info($message);

        $this->info("Trasmitiendo push");
        
        event(new \App\Events\PushArticle($message));

        $this->info("Fin del proceso de notificacion");

    }
}
