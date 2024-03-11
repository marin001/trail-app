Registration Page
<br/>


<?php

use App\Models\Race;
use GuzzleHttp\Promise\Create;

//$test = Race::factory()->create();
//$test = new Race(['fillable' => ['Name1','5k']]);
$test = Race::create(['Name' => 'Race','Distance' => '5k']);
$race = Race::factory()->create();

print_r($test);
//die();

?>
<br/>
{{ Form::open(array('url' => 'register')) }}
{{ Form::label('name', 'Name'); }}
{{ Form::text('name'); }}
<br/>
<br/>
{{ Form::label('email', 'Email'); }}
{{ Form::email('email', $value = null, $attributes =
array()); }}
<br/>
<br/>
{{ Form::label('password', 'Password'); }}
{{ Form::password('password'); }}
<br/>
<br/>
{{ Form::submit('Register'); }}
{{ Form::close() }}
