<?php

namespace App\Service;

class YTDLPManager
{
    public function trimResults(string $output, string $separator): array {
        if($separator != "none"){
            return explode($separator, trim($output));
        } else {
            return [trim($output)];
        }

    }

}