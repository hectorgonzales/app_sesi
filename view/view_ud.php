
<?php
if(!isset($_SESSION['pk_usuario'])){ 
	session_start(); 
}
$op=$_POST['op'];
$prefijo_op="ud";
require_once("../model/General.php");
include_once('../parametros.php');
$general=new General();
switch($op){
?>
<?php
case "new":
?>
 <form class="uk-grid-small uk-form uk-grid-match" uk-grid>
    <div class="uk-width-1-1@s">
        <div class="uk-card uk-card-default uk-card-body">
          <div class="uk-grid-small" uk-grid>
                    <!--CAMPOS-->
                        <div class="uk-width-1-1">
                            <label>Unidad Didactica:</label>
                            <textarea rows="4" class="uk-textarea uk-form-small" id="txt_ud_nombre"></textarea>
                         </div>
                         
                        <div class="uk-width-1-2">
							<label>Semestre:</label>
                            <select class="uk-select uk-form-small" id="txt_ud_semestre">
                                <option>I</option>
                                <option>II</option>
                                <option>III</option>
                                <option>IV</option>
                                <option>V</option>
                                <option>VI</option>
							</select>
                        </div>
                        						
						<div class="uk-width-1-2">
							<label>Horas:</label>
							<input type="number" class="uk-input uk-form-small" id="txt_ud_horas" />
						</div>
                    <!--CAMPOS-->
        </div>
       </div>
    </div>
 </form>
<?php
break; //FIN DE NEW
?>
<?php
} /*FIN SWITCH*/
?>
<script type="text/javascript">
campos_enter();
</script>