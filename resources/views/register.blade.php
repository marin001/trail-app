Registration Page
<br/>
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
