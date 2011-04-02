<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Usuario_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Usuario");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}

	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'activo' => '',
			'confirmado' => '',
			'login' => '',
			'clave' => '',
			'correo' => '',
			'nombre' => '',
			'apellido' => '',
			'fecha_nac' => '',
			'telefono' => '',
			'estado' => '',
			'ciudad' => '',
			'zona' => '',

		//Cambio de Contraseña
			'actual' => '',
			'nueva'  => '',
			'confirmacion' => '',

			'captcha' => '',
		);
	}

	public function index() {
		$this->template->titulo = "Administracion de Usuarios";
		$contenido = html_Core::anchor('usuario/iniciar_sesion', 'Iniciar Sesi&oacute;n');
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('usuario/cambiar_clave', 'Cambiar Clave');
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('usuario/buscar', 'Buscar Usuario');
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('usuario/suscribir', 'Suscribir Usuario');
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('usuario/mis_solicitudes', 'Mis Solicitudes');
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('calificacion/mis_calificaciones', 'Mis Calificaciones');
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('usuario/cerrar_sesion', 'Cerrar Sesion');
		$this->template->contenido = $contenido;
	}

	public function suscribir() {

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_SUSCRIBIR;

		$exito = true;
		$vista = new View('usuario/suscribir');
		if($_POST){
			if($this->_suscribir()){

				$this->template->titulo = "Confirma tu correo";

				//TODO Aqui seria mejor usar un redirect y convertir la bienvenida en un metodo
				//$vista = new View('usuario/bienvenida');
				//$vista->login = $_POST['login'];
				//$this->limpiar_formulario();
				$this->iniciar_sesion();
				return;
			}
		}
		$vista->errores = $this->errores;
		$vista->formulario = $this->formulario;
		$vista->mensaje = $this->mensaje;
		$this->template->contenido = $vista;
	}

	/**
	 * Validacion
	 */
	public function _validar($editar = NULL) {

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		//Evita que en la edicion se verifique los campos no editables requeridos
		if(!$editar){
			$post->add_rules('correo','required', 'email');
			$post->add_rules('login','required', 'alpha_dash','length[1,45]');
			$post->add_rules('clave','required', 'standard_text','length[4,20]');
			$post->add_rules('confirmacion','required');

			$post->add_callbacks('login', array($this, '_unico'));
			$post->add_callbacks('correo', array($this, '_unico'));
			$post->add_callbacks('clave', array($this, '_no_coincide'));
		}else{
			$post->add_rules('nombre','required', 'standard_text','length[1,45]');
			$post->add_rules('apellido','required', 'standard_text','length[1,45]');
			$post->add_rules('telefono','required','phone[11]');
		}
		$post->add_rules('correo','required', 'email');


		$exito = $post->validate();

		$this->mensaje = "<div class='msg_error'>Problema al Guardar</div>";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('usuario_errores'));

		return $exito;
	}

	/**
	 * Permite validar si el correo esta incluido en la
	 * base de datos, generando un error si es asi.
	 * @param Validation_Core $array
	 * @param string $campo
	 */
	public function _unico(Validation_Core  $array, $campo){

		switch ($campo) {
			case 'login':
				$condicion = array(
					'login' => $array[$campo],
				);
				$existe = (bool)ORM::factory('usuario')->where($condicion)->count_all();
				if($existe){
					$array->add_error($campo, 'existe');
				};
				break;
					
			case 'correo':
				$condicion = array(
					'correo' => $array[$campo],
				);
				$existe = (bool)ORM::factory('usuario')->where($condicion)->count_all();
				if($existe){
					$array->add_error($campo, 'existe');
				};
				break;
		}
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 * de los usuarios en la base de datos
	 *
	 */
	public function _suscribir(){
		$exito = false;
		$datos = $_POST;
		$usuario = new Usuario_Model();
		if($this->_validar()){
			$usuario->correo = $datos['correo'];
			//$usuario->nombre = $datos['nombre'];
			//$usuario->apellido = $datos['apellido'];
			$usuario->login = $datos['login'];
			$usuario->clave = $datos['clave'];
			$usuario->tipo = USUARIO_COMUN;
			$usuario->activo = TRUE;
			$usuario->confirmado = TRUE;
			$usuario->save();

			//Se envia el correo de confirmacion
			$mail = new View('mail/bienvenida');
			$mail->usuario = $usuario;
			Mail_Model::enviar($usuario->correo, MAIL_ASNT_BIENVENIDA, $mail);

			$exito = true;
		}
		return $exito;
	}

	/**
	 * Genera la vista de edicion.
	 * @param int $id
	 */
	public function editar($id){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_EDITAR;

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN,USUARIO_VENDE, USUARIO_COMUN));

		$this->template->titulo = html::specialchars("Editar Datos del Usuario");

		$this->llenar_formulario($id);

		$vista = new View("usuario/datos");
		if($_POST){
			if($this->_editar($id)){
				$this->mensaje = "<div class='msg_exito'>Los datos se guard&aacute;ron con &eacute;xito.</div>";
			}
		}

		$usuario = new Usuario_Model($id);

		$vista->script_combo = new View('js/combo_regiones');
		$vista->estado = Estado_Model::combobox($usuario->estado_id);
		$vista->ciudad = Ciudad_Model::combobox($usuario->estado_id, $usuario->ciudad_id, TRUE);
		$vista->zona = Zona_Model::combobox($usuario->ciudad_id, $usuario->zona_id, TRUE);

		$vista->quien_entra = $this->session->get('usuario');
		$vista->mensaje = $this->mensaje;
		$vista->usuario = $usuario;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;

		$this->template->contenido = $vista;
	}

	public function llenar_formulario($id){
		$usuario = ORM::factory('usuario',$id);
		$this->formulario = array(
			'activo' => $usuario->activo,
			'confirmado' => $usuario->confirmado,
			'login' => $usuario->login,
			'clave' => $usuario->clave,
			'correo' => $usuario->correo,
			'nombre' => $usuario->nombre,
			'apellido' => $usuario->apellido,
			'fecha_nac' => $usuario->fecha_nac,
			'telefono' => $usuario->telefono,
			'estado' => $usuario->estado_id,
			'ciudad' => $usuario->ciudad_id,
			'zona' => $usuario->zona_id,
		);
	}

	/**
	 * Procesa las solicitudes de edicion
	 * @param int $id
	 */
	public function _editar($id){
		$exito = false;
		$datos = $_POST;
		$usuario = new Usuario_Model($id);
		if($this->_validar(TRUE)){
			//Campos que no se editan pero los coloco para que
			//la validacion no de problemas de 'required'
			$usuario->login = $usuario->login;
			$usuario->correo = $usuario->correo;

			if(isset($datos['activo']))$usuario->activo = (boolean)$datos['activo'];
			if(isset($datos['confirmado']))$usuario->confirmado = (boolean)$datos['confirmado'];
			$usuario->nombre = $datos['nombre'];
			$usuario->apellido = $datos['apellido'];
			$usuario->fecha_nac = $datos['fecha_nac'];
			$usuario->telefono = $datos['telefono'];

			//Condicion si el usuario no ha seleccionado una fecha
			if($datos['fecha_nac'] == '') $usuario->fecha_nac = NULL;
			else $usuario->fecha_nac = $datos['fecha_nac'];

			//Condicionales si el usuario aun no ha seleccionado una region
			if($datos['estado'] == 0) $usuario->estado_id = NULL;
			else $usuario->estado_id = $datos['estado'];
			if($datos['ciudad'] == 0) $usuario->ciudad_id = NULL;
			else $usuario->ciudad_id = $datos['ciudad'];
			if($datos['zona'] == 0) $usuario->zona_id = NULL;
			else $usuario->zona_id = $datos['zona'];

			//Cambiamos el tipo de usuario para permitir publicar
			$usuario->tipo = USUARIO_VENDE;

			$usuario->save();
			$usuario->clear_cache();//Para que los datos que sean solicitados nuevamente no esten corruptos
			$exito = true;
		}
		return $exito;
	}

	public function volver_activo($id_usuario){
		$this->auto_render=FALSE;
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN));
		$usuario = new Usuario_Model($id_usuario);
		$usuario->activo = !$usuario->activo;
		$usuario->save();
		header("Location: ".url::site('usuario/editar/'.$id_usuario));

	}
	
	public function volver_confirmado($id_usuario){
		$this->auto_render=FALSE;
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN));
		$usuario = new Usuario_Model($id_usuario);
		$usuario->confirmado = !$usuario->confirmado;
		$usuario->save();
		header("Location: ".url::site('usuario/editar/'.$id_usuario));

	}

	public function buscar(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_ADMIN;
		$this->template->web_page=WEBO_P_ADMIN_USUARIO;

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN,));

		$this->template->titulo = "Lista de Usuarios";

		$vista = new View('usuario/buscar');
		if(isset($_POST['buscar'])){
			$vista->usuario = $this->_buscar($_POST['buscar']);
		}else{
			$vista->usuario = ORM::factory('usuario')->orderby('id', 'DESC')->find_all();
		}

		$this->template->contenido = $vista;
	}

	public function _buscar($string){
		$condicion = array(
			'nombre' => $string,
			'apellido' => $string,
			'login' => $string,
			'correo' => $string,
		);
		$usuario = ORM::factory('usuario')->orlike($condicion)->orderby('id', 'DESC')->find_all();
		return $usuario;
	}

	public function iniciar_sesion(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_SESION;

		$this->template->titulo = "Buscar Usuarios";

		$vista = new View('usuario/iniciar_sesion');
		$vista->mensaje='';
		$post = $_POST;
		if($post){
			if(!$this->_iniciar_sesion($post)){
				$vista->mensaje = "Datos inv&aacute;lidos.";
			}else{
				$cond = array(
					'login' => $post['login'],
					'clave' => $post['clave'],
					'activo' => TRUE,
				);
				$usuario = ORM::factory('usuario')->where($cond)->find();
				$this->session->set('usuario',$usuario);
				if($this->session->get('ir_a')==""){
					if($usuario->tipo == USUARIO_ADMIN){
						header("Location: ".url::site('admin'));
					}else{
						header("Location: ".url::site('usuario/mi_cuenta'));
					}
				}else{
					$ir_a = $this->session->get('ir_a');
					$this->session->set('ir_a', NULL);
					header("Location: $ir_a");
				}
			}
		}
		$this->template->contenido = $vista;
	}

	public function _iniciar_sesion($post){
		$valido = FALSE;
		$cond = array(
			'login' => $post['login'],
			'clave' => $post['clave'],
			'activo' => TRUE,
			'confirmado' => TRUE,
		);
		$usuario = ORM::factory('usuario')->where($cond)->find();

		if($usuario->id > 0) $valido = true;

		return $valido;
	}

	public function cerrar_sesion(){
		$this->session->destroy();
		url::redirect(url::site('usuario/iniciar_sesion'));
	}

	public function acceso_denegado($mensaje_id){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_DENEGADO;

		$this->template->titulo = "Acceso Denegado";
		$vista = new View('usuario/acceso_denegado');
		switch ($mensaje_id) {
			case MSJ_INICIAR_SESION:
				$mensaje = "<h3>Para acceder a esta secci&oacute;n debe <a href='".url::site("usuario/iniciar_sesion")."'>Iniciar Sesi&oacute;n</a> o sino <a href='".url::site("usuario/suscribir")."'>Reg&iacute;strese Gratis Aqu&iacute;</a>.</h3>";
				break;
			case MSJ_SOLO_ADMIN:
				$mensaje = "Esta secci&oacute;n es solo para administradores de este Portal Web.";
				break;
			case MSJ_COMPLETAR_REGISTRO:
				$mensaje = "Para poder disfrutar de los servicios de publicaci&oacute;n debe <a href='".url::site('usuario/mis_datos')."'>completar</a> su registro o <a href='".url::site("usuario/iniciar_sesion")."'>Iniciar Sesi&oacute;n</a>";
				break;
			default:
				$mensaje = "No tiene permisos de acceso.";
				break;
		}

		$vista->mensaje = $mensaje;
		$this->template->contenido = $vista;
	}

	public function cambiar_clave(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_CLAVE;

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN));

		$this->template->titulo = "Cambiar Clave de Acceso";

		$vista = new View('usuario/cambiar_clave');

		if($_POST){
			if($this->_cambiar_clave()){
				$this->mensaje = "<div class='msg_exito'>Los datos se guard&aacute;ron con &eacute;xito.</div>";
				$this->limpiar_formulario();
			}
		}

		$vista->mensaje = $this->mensaje;
		$vista->errores = $this->errores;
		$this->template->contenido = $vista;
	}

	public function _cambiar_clave(){
		$exito = false;
		$datos = $_POST;
		$usuario = $this->session->get('usuario');
		if($this->_validar_clave_nueva()){

			$usuario->clave = $datos['nueva'];

			$usuario->save();
			$usuario->clear_cache();//Para que los datos que sean solicitados nuevamente no esten corruptos
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Validacion
	 */
	public function _validar_clave_nueva() {

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');

		//Requeridos
		$post->add_rules('actual','required');
		$post->add_rules('nueva','required', 'standard_text','length[4,20]');
		$post->add_rules('confirmacion','required');

		//Verificar que la identidad del usuario con su clave actual
		$post->add_callbacks('actual', array($this, '_clave_actual_correcta'));
		//La clave nueva debe ser igual a la confirmacion
		$post->add_callbacks('nueva', array($this, '_no_coincide'));

		$exito = $post->validate();

		$this->mensaje = "<div class='msg_error'>Problema al Guardar</div>";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('usuario_errores'));

		return $exito;
	}

	public function _clave_actual_correcta(Validation_Core  $array, $campo){
		if($array[$campo] != $this->session->get('usuario')->clave){
			$array->add_error($campo, 'clave_incorrecta');
		}
	}

	public function _no_coincide(Validation_Core  $array, $campo){
		if($array[$campo] != $array['confirmacion']){
			$array->add_error('confirmacion', 'no_coincide');
		}
	}

	public function mis_solicitudes(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_SOLICITUD;

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN), MSJ_INICIAR_SESION);

		$this->template->titulo = "Mis Solicitudes";

		$vista = new View('usuario/mis_solicitudes');

		$usuario = $this->session->get('usuario');
		$calificaciones = ORM::factory('calificacion')->where('cliente_id', $usuario->id);

		//Comienza a prepararse la Paginacion
		$paginacion = new Pagination(
		array(
					'uri_segment' => 'pagina',
					'total_items' => $calificaciones->count_all(),
					'items_per_page' => ITEMS_POR_PAGINA,
					'style' => 'classic',
		)
		);

		$limit = ITEMS_POR_PAGINA;
		$offset = $paginacion->sql_offset;

		$calificaciones = $calificaciones
		->where('cliente_id', $usuario->id)
		->orderby('id', 'DESC')
		->limit($limit)
		->offset($offset)
		->find_all();

		$publicaciones = array();

		foreach ($calificaciones as $fila){
			$publicaciones[] = ORM::factory('publicacion', $fila->publicacion_id);
		}


		$vista->publicacion = $publicaciones;
		$vista->paginacion = $paginacion;
		$this->template->contenido = $vista;
	}

	public function mi_cuenta(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_INICIO;

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN));

		$usuario = $this->session->get('usuario');

		$this->template->titulo = "Mi Cuenta";

		$vista = new View('usuario/mi_cuenta');
		$vista->vista_notif = new View('notificacion/notificacion_lateral');
		$vista->usuario = $usuario;
		$m_notif = new Notificacion_Model($usuario);
		$vista->vista_notif->notificaciones = $m_notif->componer_notificaiones();

		$vista->mensaje = $this->mensaje;
		$vista->errores = $this->errores;
		$this->template->contenido = $vista;
	}

	public function mis_datos(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_DATOS;

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN));

		$usuario = $this->session->get('usuario');

		$this->template->panel_opciones = new View('plantillas/panel_opciones');
		$links[] = array(
		url::site('usuario/editar/'.$usuario->id),
		html_Core::image('media/img/iconos/user_edit.png', array('class'=>'icono')) . "Editar Datos",
		);
		$links[] = array(
		url::site('usuario/cambiar_clave'),
		html_Core::image('media/img/iconos/key_go.png', array('class'=>'icono')) . "Cambiar Clave",
		);
		$this->template->panel_opciones->links = $links;

		$vista = new View('usuario/mis_datos');
		$vista->usuario = $usuario;

		$this->template->contenido = $vista;
	}

	public function datos_usuario($usuario_id){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_ADMIN;
		$this->template->web_page=WEBO_P_ADMIN_DATOS;

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN));

		$usuario = new Usuario_Model($usuario_id);

		$this->template->panel_opciones = new View('plantillas/panel_opciones');
		$links[] = array(
		url::site('usuario/editar/'.$usuario->id),
		html_Core::image('media/img/iconos/user_edit.png', array('class'=>'icono')) . "Editar Datos",
		);

		$this->template->panel_opciones->links = $links;

		$vista = new View('usuario/mis_datos');
		$vista->usuario = $usuario;

		$this->template->contenido = $vista;
	}

	public function confirmar($usuario_id, $string_MD5){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_CONFIRMAR;

		$usuario = new Usuario_Model($usuario_id);
		$confirmacion = $usuario->confirmar($string_MD5);
		if($confirmacion){
			$resultado = "Exitosa";
			$mensaje = "Ya puede disfrutar de todos nuestros servicios. " . html::anchor(url::site('usuario/iniciar_sesion'), "Inicia tu Sesion") ." ya!";
		}else{
			$resultado = "FALLIDA";
			$mensaje = "Lo sentimos pero NO COINCIDEN LOS DATOS. Por favor intentelo nuevamente o " . html::anchor(url::site('nosotros/contacto'), "contactenos") . " si persiste el problema.";
		}

		$vista = new View('usuario/confirmar');
		$vista->resultado = $resultado;
		$vista->mensaje = $mensaje;

		$this->template->titulo = "Confirmacion de Correo Electronico";
		$this->template->contenido = $vista;
	}

	public function recuperar(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_USUARIO;
		$this->template->web_page=WEBO_P_USUARIO_RECUPERAR;

		if($_POST){
			if($this->_recuperar()){
				$this->mensaje = "<div class='msg_exito'>Los datos han sido enviados a tu correo.<br>Revisa tu bandeja de entrada.</div>";
				$this->limpiar_formulario();
			}
		}

		$captcha = new Captcha();

		$vista = new View('usuario/recuperar');
		$this->template->titulo = "Recuperaci&oacute;n de Datos de Acceso";
		$vista->captcha = $captcha->render();
		$vista->mensaje = $this->mensaje;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;
		$this->template->contenido = $vista;

	}

	public function _recuperar(){
		$exito = FALSE;
		$datos = $_POST;
		if($this->_registrado()){
			$mail = new View('mail/recuperar');
			$mail->usuario = ORM::factory('usuario')->where('correo',$datos['correo'])->find();
			Mail_Model::enviar($datos['correo'],MAIL_ASNT_RECUPERAR,$mail);
			$exito = TRUE;
		}
		return $exito;
	}

	public function _registrado(){
		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		$post->add_rules('correo','required', 'email');
		$post->add_rules('captcha','required', array('Captcha','valid'));
		$post->add_callbacks('correo', array($this, '_no_existe'));

		$exito = $post->validate();

		$this->mensaje = "<div class='msg_error'>No se ha enviado</div>";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('usuario_errores'));

		return $exito;
	}

	public function _no_existe(Validation_Core  $array, $campo){
		$tot = ORM::factory('usuario')->where('correo',$array[$campo])->count_all();
		if($tot==0){
			$array->add_error('correo', 'no_existe');
		}
	}
}
?>