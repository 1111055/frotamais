<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\SendAlertMail;
use Auth;

class emailAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este cron job servirá para enviar o email das tarefas a realizar';

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
          Mail::to('marco.mendes@frotamais.com')->send(new SendAlertMail());
          //  return redirect('/home');
    }
}
