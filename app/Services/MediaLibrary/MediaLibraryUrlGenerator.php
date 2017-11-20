<?php

namespace App\Services\Medialibrary;

use Spatie\MediaLibrary\UrlGenerator\LocalUrlGenerator;

class MediaLibraryUrlGenerator extends LocalUrlGenerator
{
    /**
     * @return string
     */
    public function getUrl():  string
    {
        return '/media/'.$this->getPathRelativeToRoot();
    }
}
