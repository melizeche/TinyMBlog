<?php
    include("vista/header.php");
    require("controlador/controllerUser.php");
/*** begin the session ***/
session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'You must be logged in to access this page';
}
else
{
    try
    {
        /*** connect to database ***/
        $ses = checkSession($_SESSION['user_id'])->getNext();

        
        $user = $ses['user'];

        /*** if we have no something is wrong ***/
        if($user == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welcome '.$user;
        }
    }
    catch (Exception $e)
    {
        /*** if we are here, something is wrong in the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}

?>


<h2><?php echo $message;
    echo session_id();
 ?></h2>
<?php 
    include("vista/footer.php");
?>