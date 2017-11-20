<?php

namespace App\Services\Medialibrary;

use ColorThief\ColorThief;
use Illuminate\Contracts\Events\Dispatcher;
use Spatie\Color\Rgb;
use Spatie\MediaLibrary\Events\MediaHasBeenAdded;

class MediaLibraryEventHandler
{
    /**
     * @param Dispatcher $events
     */
    public function subscribe(Dispatcher $events)
    {
        $events->listen(
            MediaHasBeenAdded::class,
            [$this, 'whenMediaHasBeenAdded']
        );
    }

    /**
     * @param MediaHasBeenAdded $event
     */
    public function whenMediaHasBeenAdded(MediaHasBeenAdded $event)
    {
        $media = $event->media;
        $dominantColor = ColorThief::getColor($media->getPath());
        $hexColor = (new Rgb(...$dominantColor))->toHex();
        $media->setCustomProperty('dominantColor', $hexColor);
        $media->save();
    }
}
