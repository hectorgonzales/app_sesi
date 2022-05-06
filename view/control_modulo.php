<?php
require_once("model/General.php");
$general=new General();

$pk=$p;
$ds=$general->modificarRegistro("menu","pk_menu",$pk);
$fila=$ds->fetch_assoc();

$prefijo_menu="arpl";
$tit_form=mb_strtoupper($fila['menu_nombre']);
?>
<div class="uk-section-small height-100 uk-padding-remove" uk-height-viewport="offset-top: true">
    <div class="uk-container uk-container-large uk-height-1-1 uk-width-1-1 uk-padding-remove" >
        
      <div uk-grid class="uk-height-1-1" >
        <div class="uk-width-1-1">
              <div class="uk-card uk-card-default uk-height-1-1">
               <div class="uk-card-header uk-background-default uk-padding-small">
                	
                    <div uk-grid class="uk-grid-small uk-text-center">
                        <div class="uk-width-1-3@s uk-text-left@s">
                            <div class="uk-badge bg-title">
                                <span class="txt-white p210 uk-text-middle uk-text-small"><?=$tit_form;?></span>
                            </div>
                        </div>
                        <div class="uk-width-2-3@s uk-text-right@s">
                            <input type="hidden" id="txt_fk_carrera" value="<?=$p?>">
                        </div>
                        
                    </div>
				
                </div>
                <div id="ct_form" class="uk-card-body height-100 uk-overflow-auto uk-padding-remove" uk-height-viewport="offset-top: true">
                	<!--content form-->
                </div>
              </div>
        </div>
      </div>
      
    </div>
</div>

<script>
	listar_modu();
</script>
