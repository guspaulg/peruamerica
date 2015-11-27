<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"         => "The :attribute must be accepted.",
	"active_url"       => "The :attribute is not a valid URL.",
	"after"            => "The :attribute must be a date after :date.",
	"alpha"            => "The :attribute may only contain letters.",
	"alpha_dash"       => "The :attribute may only contain letters, numbers, and dashes.",
	"alpha_num"        => "The :attribute may only contain letters and numbers.",
	"array"            => "The :attribute must be an array.",
	"before"           => "The :attribute must be a date before :date.",
	"between"          => array(
		"numeric" => "The :attribute must be between :min and :max.",
		"file"    => "The :attribute must be between :min and :max kilobytes.",
		"string"  => "The :attribute must be between :min and :max characters.",
		"array"   => "The :attribute must have between :min and :max items.",
	),
	"confirmed"        => "The :attribute confirmation does not match.",
	"date"             => "The :attribute is not a valid date.",
	"date_format"      => "The :attribute does not match the format :format.",
	"different"        => "The :attribute and :other must be different.",
	"digits"           => "The :attribute must be :digits digits.",
	"digits_between"   => "The :attribute must be between :min and :max digits.",
	"email"            => "The :attribute format is invalid.",
	"exists"           => "The selected :attribute is invalid.",
	"image"            => "The :attribute must be an image.",
	"in"               => "The selected :attribute is invalid.",
	"integer"          => "The :attribute must be an integer.",
	"ip"               => "The :attribute must be a valid IP address.",
	"max"              => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
		"array"   => "The :attribute may not have more than :max items.",
	),
	"mimes"            => "The :attribute must be a file of type: :values.",
	"min"              => array(
		"numeric" => "The :attribute must be at least :min.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
		"array"   => "The :attribute must have at least :min items.",
	),
	"not_in"           => "The selected :attribute is invalid.",
	"numeric"          => "The :attribute must be a number.",
	"regex"            => "The :attribute format is invalid.",
	"required"         => "The :attribute field is required.",
	"required_if"      => "The :attribute field is required when :other is :value.",
	"required_with"    => "The :attribute field is required when :values is present.",
	"required_without" => "The :attribute field is required when :values is not present.",
	"same"             => "The :attribute and :other must match.",
	"size"             => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
		"array"   => "The :attribute must contain :size items.",
	),
	"unique"           => "The :attribute has already been taken.",
	"url"              => "The :attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

	'custom' => 
	array(
    'email' => array('required' => 'Ingresa tu correo electrónico.','unique' => 'El email ingresado ya se registro antes')
    ,'password' => array('required' => 'Ingresa tu contraseña.','confirmed' => 'La contraseña y la verificación de contraseña deben coincidir.')
    ,'apellidosp' => array('required' => 'Ingresa tu apellido paterno.')
    ,'apellidosm' => array('required' => 'Ingresa tu apellido materno.')
    ,'nombrecompleto' => array('required' => 'Ingresa tus nombres completos.')
    ,'dni' => array('required' => 'Ingresa tus D.N.I.')
    ,'ruc' => array('required' => 'Ingresa tus R.U.C.')
    ,'razon' => array('required' => 'Ingresa la razon social.')
    ,'direccionfiscal'=> array('required' => 'Ingresa la Dirección fiscal.')
    ,'telefono'=> array('required' => 'Ingresa tu teléfono celular.')
    ,'direccion' => array('required' => 'Ingresa tu Dirección que es donde enviaremos tus pedidos.')

    ,'passwordant' => array('required' => 'Debes ingresar tu Contraseña actual.','exists' => 'Tu contraseña actual no es correcta .')
    ,'passwordnue' => array('required' => 'Debes ingresar tu nueva Contraseña.','confirmed' => 'Tus nuevas contraseñas no coinciden.')
   
    ,'email2'=> array('required' => 'Ingresa el correo electrónico registrado.')
    ,'contrasena2' => array('required' => 'Ingresa tu contraseña.')

    ,'email3'=> array('required' => 'Ingresa el correo electrónico.','unique' => 'El email ingresado ya se registro antes')
    ),

);
