<?php

namespace App\Actions;

use Barryvdh\Snappy\PdfWrapper;

class GetURLAsPDFAction
{
    /**
     * Snappy PDF wrapper
     *
     * @var PdfWrapper
     */
    protected PdfWrapper $pdf;

    /**
     * Allowed root domains
     *
     * @var array
     */
    protected array $allowed = [
        'dev.aquatic-quays.com',
        'aquatic-quays.com',
    ];

    /**
     * Gets a URL as a PDF download
     *
     * @param PdfWrapper  $pdf  Snappy PDF wrapper
     */
    public function __construct(
        PdfWrapper $pdf
    ) {
        $this->pdf = $pdf;
    }

    /**
     * Execute the action
     *
     * @param  string                     $url  URL to grab
     *
     * @return \Illuminate\Http\Response  PDF download response
     */
    public function execute(
        string $url
    ): \Illuminate\Http\Response {
        if (! in_array(parse_url($url)['host'], $this->allowed)) {
            abort(401);
        }

        return $this->pdf->loadFile($url)
            ->setOption('print-media-type', true)
            ->download('file.pdf');
    }
}