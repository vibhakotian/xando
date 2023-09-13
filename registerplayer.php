<?php
session_start();
error_reporting(E_ERROR|E_PARSE);//reports runtime error
function registerPlayers($playerX="",$playero="")
{//assiging and registering the player
    $_SESSION['PLAYER_X_NAME']=$playerX;
    $_SESSION['PLAYER_O-NAME']=$playero;
    resetWins();
    
}
function resetBoard()
{
    //resets the board
    for($i=1;$i<=9;$i++)
    {
        unset($_SESSION['CELL_'.$i]);//if you want to destroy single cell or variable in session

    }
}
function resetWins()
{
    //resets the count of the win
    $_SESSION['PLAYER_X_WINS']=0;
    $_SESSION['PLAYER_O_WINS']=0;
}
function playCount()
{
    //if session play exisit return session play other wise return 0;
    return $_SESSION['PLAYS']?$_SESSION['PLAYS']:0;
}
function addPlayCount()
{
    if(!$_SESSION['PLAYS'])
    {
        $_SESSION['PLAYS']=0;
    }
    $_SESSION['PLAYS']++;
}
function playerName($player='x')
{
    return $_SESSION['PLAYER_'.strtoupper($player).'_NAME'];
}
function playerRegisterd()

{
    return $_SESSION['PLAYER_X_NAME']&&$_SESSION['PLAYER_O_NAME'];
}
function getTurn()
{
    return $_SESSION['TURN']? $_SESSION['TURN']:'x';
}
function markWin($_player='x')
{
    $_SESSION['PLAYER_'.strtoupper($player).'_WINS']++;
}
function switchTurn()
{
    switch(getTurn())
    {
        case 'x':
            serTurn('o');
            break;
        default:
        setTurn('x'):
        break;

     }
}
?>
