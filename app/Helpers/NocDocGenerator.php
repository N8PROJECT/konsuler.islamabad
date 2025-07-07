<?php

namespace App\Helpers;

use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Str;

class NocDocGenerator
{
    public static function generate(array $data, string $type) {
        $templatePath = storage_path("app/templates/noc_{$type}_template.docx");

        $processor = new TemplateProcessor($templatePath);

        foreach ($data as $key => $value) {
            $processor->setValue($key, $value);
        }

        $filename = 'noc_' . $type . '_' . Str::random(6) . '.docx';
        $outputPath = "generated_docs/{$filename}";

        $processor->saveAs(storage_path("app/public/{$outputPath}"));

        return $outputPath;
    }
}