<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Validation in Laravel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

<h1>Select user</h1>
<h2>You will be redirected to route dependiong on role.</h2>
<table>
<th onclick="alert()">
        <td>First_name</td>
        <td>Last_name</td>
        <td>Email</td>
        <td>DOB</td>
        <td>Role</td>

    </th>
<?php

use App\Models\Application;
use App\Models\Race;
use App\Models\User;
use GuzzleHttp\Promise\Create;
/**
 * Create always new 5 users it was possible to predefine only on start...
 */
$users = User::factory()->count(5)->create();

foreach($users as $user){
    ?>

    <tr>

        <td><?php print $user->id; ?></td>
        <td><?php print $user->First_name;?></td>
        <td><?php print $user->Last_name;?></td>
        <td><?php print $user->Email;?></td>
        <td><?php print $user->DOB;?></td>
        <td><?php print $user->Role;?></td>
        <td>
            <form method="post" action="api/users/login" >
            <input type="hidden" id="name-field" name="id" value="<?php print $user->id;?>"/>
            <button id="btn-submit" type="submit">Select</button>
        </form>
        </td>
    </tr>

<?php
}
?>
</table>

</body>
</html>
