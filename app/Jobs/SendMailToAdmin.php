<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Notification;
use App\Notifications\AdminNotification;

class SendMailToAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $request;
    public $product;

    public function __construct($request,$product)
    {
        $this->request = $request;    
        $this->product = $product;    
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::route('mail', 'ketan.patel@bytestechnolab.com')            
            ->notify(new AdminNotification($this->request,$this->product));       
    }
}
