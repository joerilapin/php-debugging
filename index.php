<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);



// Below are several code blocks, read them, understand them and try to find whats wrong.
// Once this exercise is finished, we'll go over the code all together and we can share how we debugged the following problems.
// Try to fix the code every time and good luck ! (write down how you found out the answer and how you debugged the problem)
// =============================================================================================================================

// === Exercise 1 ===
// Below we're defining a function, but it doesn't work when we run it.
// Look at the error you get, read it and it should tell you the issue...,
// sometimes, even your IDE can tell you what's wrong
echo new_exercise(1);

function new_exercise($x) {
    $block = "<br/><hr/><br/><br/>Exercise $x starts here:<br/>";
    echo $block;

}

new_exercise(2);
// === Exercise 2 ===<?php

// Below we create a week array with all days of the week.
// We then try to print the first day which is monday, execute the code and see what happens.
$week = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
//array is zero-based
$monday = $week[0];

echo $monday;

new_exercise(3);
// === Exercise 3 ===
// This should echo ` "Debugged !" `, fix it so that that is the literal text echo'ed

$str = 'Debugged ! Also very fun”';
//after the 10th position everything is deleted
echo substr($str, 0, 10);

new_exercise(4);
// === Exercise 4 ===
// Sometimes debugging code is just like looking up code and syntax...
// The print_r($week) should give:  Array ( [0] => mon [1] => tues [2] => wednes [3] => thurs [4] => fri [5] => satur [6] => sun )
// Look up whats going wrong with this code, and then fix it, with ONE CHARACTER!

//needing the & according to 'In order to be able to directly modify array elements within the loop precede $value
// with &. In that case the value will be assigned by reference. '
foreach($week as &$day) {
    $day = substr($day, 0, strlen($day)-3);
}

print_r($week);

new_exercise(5);
// === Exercise 5 ===
// The array should be printing every letter of the alfabet (a-z) but instead it does that + aa-yz
// Fix the code so the for loop only pushes a-z in the array

$arr = [];
for ($letter = 'a'; $letter <= 'z'; $letter++) {
    array_push($arr, $letter);
    if ($letter == 'z') {
        //a break is needed to stop at 'z'
        break;
    }
}

print_r($arr); // Array ([0] => a, [1] => b, [2] => c, ...) a-z alfabetical array

new_exercise(6);
// === Final exercise ===
// The fixed code should echo the following at the bottom:
// Here is the name: $name - $name2
// $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!
$arr = [];


function combineNames() : string {
    $name = randomHeroName();
    return implode("-",$name );
}
function randomHeroName()
{
    $hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black", "Carol"];
    $hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil", "marvel"];
    $heroes = [$hero_firstnames, $hero_lastnames];
    //&heroes is an aarray with 2 arrays inside
    //
    $randname = [$heroes[0][rand(0,count($hero_firstnames))],$heroes[1][rand(0,count($hero_lastnames))]];
    return $randname;
}

echo "Here is the name: " . combineNames();

new_exercise(7);
function copyright(string $year) {
    return "&copy; $year BeCode";
}
//print the copyright
//date function returns a string on success, so &year needs to be stringed instead of being int
//in the function declaration
echo copyright(date('Y'));


new_exercise(8);
function login(string $email, string $password) {
    if($email == 'john@example.be' || $password == 'pocahontas') {
        //only 1 return, and I need an echo
        echo 'Welcome John Smith<br>';
    }
    return 'No access<br>';
}
//should great the user with his full name (John Smith)
$login = login('john@example.be', 'pocahontas');
//no access
$login = login('john@example', 'dfgidfgdfg');
//no access
$login = login('wrong@example', 'wrong');

new_exercise(9);
function isLinkValid(string $link) {
    $unacceptables = array('https:','.doc','.pdf', '.jpg', '.jpeg', '.gif', '.bmp', '.png');

    foreach ($unacceptables as $unacceptable) {
        if (strpos($link, $unacceptable) !== false) {
            //echo instead of return
            echo 'Unacceptable Found<br />';
            return;
        }
    }
    //echo instead of return
    echo 'Acceptable<br />';
}
//invalid link
isLinkValid('http://www.google.com/hack.pdf');
//invalid link
isLinkValid('https://google.com');
//VALID link
isLinkValid('http://google.com');
//VALID link
isLinkValid('http://google.com/test.txt');


