<?php
declare(strict_types=1);
function is_input_empty(string $position,string $category,string $entreprise,string $location,string $description)
{
    if (empty($position)||empty($category)||empty($entreprise)||empty($location)||empty($description)) {
        return true;
    }
    else{
        return false;
    }
}