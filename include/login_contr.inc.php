<?php

declare(strict_types=1);

function is_input_empty(string $username, string $password)
{
    if(empty($username)||empty($password))
    {
        return true;
    }else {
        return false;
    }
}

function is_username_wrong(bool|array $result)
{
    if (!$result)
    {
        return true;
    }else {
        return false;
    }
}

function is_password_wrong(string $password, string $password_hash)
{
    $hashed_password = hash('sha512', $password);
    
    
    if ($hashed_password === $password_hash) {
        return false; 
    } else {
        return true; 
    }
}