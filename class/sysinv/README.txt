       DOCUMETACION DEL SYSINV SISOL 
       ================================
       AUTOR: VICTOR MARQUINA CARDENAS
       FECHA: 27/09/2016

       PARA HACER LOGIN
       ================
       if(isset($_POST['btn-login']))
       {

       $usuario = $_POST['usuario'];
       $contraseña = $_POST['password'];
       $consulta ="select u.usr_login, u.usr_id, u.usr_pwd, u.usr_est, u.usr_niv, 
       (a.ape_paterno || ' '|| a.ape_materno || ', '||a.nombres) as funcionario,a.dni,a.id_cargo,
       a.id_area,a.id_personal,o.descripcion as operativo, b.descripcion as area, f.descripcion as oficina,
       d.descripcion as cargo,a.id_oficina,a.id_dep
       from usuarios u 
       inner join personal a on u.usr_idper=a.id_personal  
       left join dependencias o on a.id_dep=o.id_dep
       left join areas b on a.id_area=b.id_area and a.id_dep=b.id_dep
       left join oficinas f on a.id_dep=f.id_dep and a.id_area=f.id_area and a.id_oficina=f.id_oficina
       left join tablatipo d on a.id_cargo=d.id_tipo and d.id_tabla='10'
       where trim(upper(u.usr_login))=trim(upper('" . $usuario . "'))";

       $result = pg_query($conexion, $consulta);
       if (pg_num_rows($result) > 0) {
       $query = pg_fetch_array($result, 0);
       $usr_name = $query["funcionario"];
       $operativo = $query["operativo"];
       $usr_stat = $query["usr_est"];
       $usr_niv = $query["usr_niv"];
       $idoperativo = $query["id_dep"];
       $usr_id = $query["usr_id"];
       $pwd = $query["usr_pwd"];
       if(md5($contraseña)==$pwd)
       {
       if ($usr_stat <> '1') {
       
       echo '<script>mostrarmensaje()</script>' ;
       
       } else {
       $ale = rand();
       //variables de entorno
       $ca = "select dependencia,entidad from entorno";
       $r = pg_query($conexion, $ca);
       session_start();
       session_name($ale);
       $_SESSION['usr_name'] = $usr_name;
       $_SESSION['usr_id'] = $usr_id;
       $_SESSION['usr_niv'] = $usr_niv;
       $_SESSION['s_entidad'] = pg_fetch_result($r, 0, 'entidad');
       $_SESSION['s_dependencia'] = pg_fetch_result($r, 0, 'dependencia');
       $_SESSION['s_dni'] = $query["dni"];
       $_SESSION['usr_idper'] = $query["id_personal"];
       $_SESSION['acceso'] = "yes";
       $_SESSION['matriz'] = array();
       $_SESSION['ordgen'] = "";
       //$_SESSION['estctrl']="";
       $_SESSION['error_message'] = "";
       header("Location: p_main.php");
       
       }
       }
       else
       {
       ?>
       <script>alert('Contraseña Invalida');</script>
       <?php
       }
       
       }
       }

       PARA LLENAR SELECT: 
       ===================
       <?php for ($i=0; $i < sizeof("<<RecordSet>>") ; $i++) {  ?>
       <option value="<?php echo "<<RecordSet[i][value]>>"?>"><?php echo utf8_encode("<<RecordSet[i][desc]>>"); ?></option>
       <?php  }?>

       Previamente se debe de llenar el recordet llamando a la funcion GET_Papeletas(usuario,dependencia)

