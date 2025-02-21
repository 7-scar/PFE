
<?php 

function validateData($data)
{

    return trim(stripcslashes(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'))); 
    
}

function validateEmail($email)
{

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        return false;  
    }

    list($localPart, $domain) = explode('@', $email);

    if (strtolower($domain) !== 'edu.esss.dz') 
    {
        return false;  
    }

    return true;  

}


function validateUsername($username)
{

    if (strlen($username) < 8 || strlen($username) > 32) 
    {
        return false; 
    }

    if (!preg_match('/^[a-zA-Z0-9-]+$/', $username)) 
    {
        return false; 
    }

    if ($username[0] === '-') 
    {
        return false;  
    }

    return true;  

}

function validatePassword($password)
{
    if (strlen($password) < 8 || strlen($password) > 64) 
    {
        return false;  
    }

    if (!preg_match('/[A-Z]/', $password)) 
    { 
        return false;
    }

    if (!preg_match('/[a-z]/', $password)) 
    {  
        return false;
    }

    if (!preg_match('/[0-9]/', $password)) 
    {  
        return false;
    }

    if (!preg_match('/[!@#$%^&*()_\-+=<>?;:,.]/', $password)) 
    {  
        return false;
    }

    return true; 

}


function tokenRest($length = 32)
{

    return  bin2hex(random_bytes($length / 2)); 

}


function validatePhone($phone)
{

    if (preg_match('/^(06|05|07)[0-9]{8}$/', $phone)) 
    {
        return true; 
    }

    return false;  

}


function validateName($name)
{
    if (strlen($name) > 64 || strlen($name) === 0) 
    {
        return false; 
    }

    if (!preg_match('/^[a-zA-Z ]+$/', $name)) 
    {
        return false; 
    }

    return true; 

}


function validateDOB($date)
{
    $dateRegex = '/^\d{4}-\d{2}-\d{2}$/';
    if (!preg_match($dateRegex, $date)) 
    {
        return false;  
    }

    $dateArray = explode('-', $date);
    if (!checkdate($dateArray[1], $dateArray[2], $dateArray[0])) 
    {
        return false;  
    }

    $dob = new DateTime($date);
    $now = new DateTime();
    $age = $now->diff($dob)->y;  

    if ($age < 20) 
    {
        return false;  
    }

    return true; 

}


function validatePOB($place)
{

    if (strlen($place) < 3 || strlen($place) > 32) 
    {
        return false;  
    }

    if (!preg_match('/^[a-zA-Z ]+$/', $place)) 
    {
        return false;  
    }

    return true;  

}


function validateSex($sex)
{
    if ($sex === 1 || $sex === 0) 
    {
        return true;  
    }
    
    return false; 

}


function validateBio($biography)
{

    if (empty($biography) || strlen($biography) > 500) 
    {
        return false;  
    }

    return true;  

}


function validateSigning($signing)
{

}

function vlidateWords($words)
{

    if (empty($words) || strlen($words) > 5000) 
    {
        return false;  
    }

    return true;  

}

function validateUrl($url)
{

    if (empty($url) || strlen($url) > 32) 
    {
        return false;  
    }

    if (!filter_var($url, FILTER_VALIDATE_URL)) 
    {
        return false;  
    }

    return true;  

}


?>