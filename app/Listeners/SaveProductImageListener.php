<?php

namespace App\Listeners;

use App\Actions\ImageModelSave;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\traits\upload_image;

class SaveProductImageListener
{
    use upload_image;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
       foreach ($event->images as $image) {
           $name = $this->upload($image,'products');
           ImageModelSave::make($event->product->id,'products',$name);

       }
    }
}
