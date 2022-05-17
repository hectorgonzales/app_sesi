<?php
require_once("model/General.php");
$general=new General();
?>
<?php
$privilegios=$_SESSION['usua_privilegios'];
$array_menu=preg_split('[,]', $privilegios);
  $ds=$general->listarRegistros("menu_grupo","megr_orden","asc");		        	
  while($fila=$ds->fetch_array(MYSQLI_ASSOC)){
	$pk_menu_grupo=$fila['pk_menu_grupo'];
	?>
    <ul class="uk-nav uk-nav-default uk-margin-bottom">
		<li class="uk-nav-header"><?=$fila['megr_nombre'];?></li>
        <li class="uk-nav-divider"></li>
		  <?php  
            $ds_menu=$general->listarRegistros("menu","menu_orden","asc",1,"menu_menu_grupo_fk='$pk_menu_grupo'");		        	
            $tr=$ds_menu->num_rows;
            $n=1;
            while($fila_menu=$ds_menu->fetch_array(MYSQLI_ASSOC)){
                $id="";
                $desactivar="1";
                $tamano=$fila_menu['menu_tamano'];
                
                ?>
                <?php
                    for($i=0;$i<count($array_menu);$i++){
                      if($fila_menu['pk_menu']==$array_menu[$i]){
                        $desactivar="2";
                        $menu_id=$fila_menu['menu_id'];
                        $id="id='".$menu_id."'";
                        break;
                      }
                    }                                          
                ?>
                      <?php
					  
						$boton='<a href="#" '.$id.' '.$desactivar.'>
                              <i class="uk-margin-small-right" uk-icon="'.$fila_menu['menu_icono'].'"></i>
                              <span>'.trim(nl2br($fila_menu['menu_nombre'])).'</span>
                              </a>';
                      ?>                                     
                	<?php if($desactivar=="2"){ ?>
                		<li><?=$boton;?></li>
                    <?php }?>

            <?php
            $n++;
            }//end while
            ?>    
   
    </ul>	
<?php
} //end while?>    