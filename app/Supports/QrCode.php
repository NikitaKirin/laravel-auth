<?php

namespace App\Supports;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

final class QrCode
{
    private int $size = 400;

    public function __construct(
        private readonly string $content
    ) {
    }

    public function size(int $size): QrCode
    {
        $this->size = $size;
        return $this;
    }

    public function generate(): string
    {
        $renderer = new ImageRenderer(
            new RendererStyle($this->size),
            new SvgImageBackEnd()
        );
        $writer = new Writer($renderer);
        return $writer->writeString($this->content);
    }
}
