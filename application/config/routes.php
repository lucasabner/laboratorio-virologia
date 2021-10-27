<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/






//rota definida para que a definição do idioma seja o primeiro nó da URL
// $route['(:any)'] = 'Welcome/index';
// $route['(:any)'] = 'usuario/index';

//para rotas adicionas, você pode utilizar algo como
//$route['(:any)/minha-rota'] = 'Welcome/meu_metodo';
// $route['default_controller'] = 'welcome';

// Inicio Teste
// $route['(:any)/default_controller'] = 'authentication';
// $route['(:any)/authentication/register'] = 'authentication/register';
// $route['(:any)/register'] = 'register/addUser';
// $route['(:any)/projects'] = 'project/show_projects';
// $route['(:any)/new'] = 'project/project_form';
// $route['(:any)/project/(:num)'] = 'project/initial/$1';
// $route['(:any)/edit/(:num)'] = 'project/update/$1';
// $route['(:any)/researcher/(:num)'] = 'project/add_researcher_page/$1';
// $route['(:any)/delete/(:num)'] = 'project/delete/$1';
// Fim Teste


$route['default_controller'] = 'usuario';

$route['register'] = 'usuario/adduser';
$route['amostras'] = 'amostra/list';

$route['register'] = 'usuario/adduser';
$route['login'] = 'usuario/login';
$route['logout'] = 'usuario/logout';
$route['recuperar_senha'] = 'usuario/recuperar_senha';
//$route['gerenciar_usuarios'] = 'usuario/list';

$route['usuario/editar/(:num)'] = 'usuario/edit/$1';
$route['usuario/update/(:num)'] = 'usuario/update/$1';
$route['usuario/insert'] = 'usuario/insert';
$route['usuario/criar'] = 'usuario/new';
$route['usuario/deletar/(:num)'] = 'usuario/delete/$1';
$route['usuarios'] = 'usuario/list';

$route['amostra/criar'] = 'amostra/new';
$route['amostra/editar/(:num)'] = 'amostra/edit/$1';
$route['amostra/delete/(:num)'] = 'amostra/delete/$1';
$route['amostra/update/(:num)'] = 'amostra/update/$1';
$route['amostra/insert'] = 'amostra/insert';

$route['exames/(:num)'] = 'exame/list/$1';
$route['exame/criar/(:num)'] = 'exame/new/$1';
$route['exame/editar/(:num)'] = 'exame/edit/$1';
$route['exame/delete/(:num)'] = 'exame/delete/$1';
$route['exame/update/(:num)'] = 'exame/update/$1';
$route['exame/insert/(:num)'] = 'exame/insert/$1';

$route['exames_valor'] = 'exame/list_exames_valor';
$route['exames_valor/editar/(:num)'] = 'exame/edit_exames_valor/$1';
$route['exames_valor/update/(:num)'] = 'exame/update_exames_valor/$1';

// $route['exame/resultado/(:num)'] = 'exame/result/$1';
// $route['exame/update_resultado/(:num)'] = 'exame/update_result/$1';

$route['vacina/editar/(:num)'] = 'vacina/edit/$1';

$route['meu_perfil'] = 'usuario/meu_perfil';
$route['update_meu_perfil'] = 'usuario/update_meu_perfil';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
