<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Notification;
use App\Notifications\OrderPlaced;

class SendOrderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $request;
    public $product;
    public $quantity;

    public function __construct($request,$product,$quantity)
    {
        $this->request = $request;    
        $this->product = $product;            
        $this->quantity = $quantity;            
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::route('mail', $this->request['email'])            
            ->notify(new OrderPlaced($this->request,$this->product,$this->quantity));            
    }
}
