<?php
declare(strict_types=1);
function is_input_empty(string $position,string $category,string $employment_type,string $entreprise,string $location,string $description)
{
    if (empty($position)||empty($category)||empty($employment_type)||empty($entreprise)||empty($location)||empty($description)) {
        return true;
    }
    else{
        return false;
    }
}