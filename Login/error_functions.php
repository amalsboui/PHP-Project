<?php

function is_email_wrong(bool|array $result)
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