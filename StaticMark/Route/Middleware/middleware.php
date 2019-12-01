<?php
use Repository\Component\Http\Request;

/**
 * Only authenticated user can access dashboard pages
 * -------------------------------------------------------------
 * Here the example you can setup middleware as you needs
 * The following example is how to deport unauthenticated
 * user that trying to access each dashbaord page with the help
 * of setting up regular expression .* wildcard and any method
 */
$this->middleware(
	Request::$httpMethods, 
	'dashboard/:all', 
	"App\Http\Middlewares\OnlyAuthenticatedUserMiddleware"
)->expression(':all', '.*[^login]');