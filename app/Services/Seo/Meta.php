<?php

namespace App\Services\Seo;

use Illuminate\Contracts\Support\Htmlable;

class Meta implements Htmlable
{
    /** @var string */
    protected $title = '';

    /** @var string */
    protected $defaultTitle;

    /** @var string */
    protected $titleSuffix = '';

    /** @var array */
    protected $properties = [];

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @param string $defaultTitle
     *
     * @return $this
     */
    public function defaultTitle(string $defaultTitle)
    {
        $this->defaultTitle = $defaultTitle;

        return $this;
    }

    /**
     * @param string $titleSuffix
     */
    public function suffixTitleWith(string $titleSuffix)
    {
        $this->titleSuffix = $titleSuffix;
    }

    /**
     * @param array $properties
     *
     * @return $this
     */
    public function with(array $properties)
    {
        foreach ($properties as $name => $value) {
            $this->set($name, $value);
        }

        return $this;
    }

    /**
     * @param string $name
     * @param $value
     *
     * @return $this
     */
    public function set(string $name, $value)
    {
        if ($name === 'title') {
            $this->title = $value;
        }

        $this->properties[$name] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function renderTags(): string
    {
        $properties = array_filter($this->properties);

        $tags = array_map(function ($content, $name) {
            return "<meta name=\"{$name}\" content=\"{$content}\">";
        }, $properties, array_keys($properties));

        return implode("\n", $tags);
    }

    /**
     * @return string
     */
    public function toHtml()
    {
        return $this->renderTags();
    }
}
