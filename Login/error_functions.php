<?php
function is_input_empty(string $name,string $last_name,string $password)
{
    if (empty($name)||empty($last_name)||empty($password)) {
        return true;
    }
    else{
        return false;
    }
}
function is_username_wrong(bool|array $result)
{
    if (!$result) {
        return true;
    }
    else{
        return false;
    }
}
function is_password_wrong(string $password, string $hashedPwd)
{
    if (!password_verify($password, $hashedPwd)) {
        return true;
    }
    else{
        return false;
    }
}