<?php

function accepts(string $text = "Code with "): string{
    return $text . "Codelex";
}
echo accepts();