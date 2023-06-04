<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SanitizeHtml implements ValidationRule
{

  

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        $doc = new \DOMDocument();
        $doc->loadHTML($value, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $allowedTags = [];
    
        foreach ($doc->getElementsByTagName('*') as $tag) {
            $tagName = $tag->nodeName;
    
            if (!in_array($tagName, $allowedTags)) {
                $tag->parentNode->removeChild($tag);
            }else{
                $fail('Invalid :attribute.');
            }
        };
    }
}
