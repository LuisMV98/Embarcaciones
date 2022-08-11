<!-- Ventana modal para eliminar -->
<div class="modal" id="deleteChildresn<?php echo $dataUsuario['idUsuario']; ?>">
<?php if($dataUsuario['idUsuario'] == $_SESSION['idus']){?>
        <div class="modal-content red lighten-4">
            <h4><i class="material-icons medium left red-text text-darken-2">report</i>¿Desea eliminar su cuenta de usuario?</h4>
            <h6>Si elimina este registro se perderá toda su información de usuario y la cuenta será cerrada.</h6>
        </div>
        <div class="modal-footer red lighten-4">
            <button type="button" class="btn modal-close blue">Cancelar</button>
            <button type="submit" class="btn btnBorrarMe red" data-dismiss="modal" id="<?php echo $dataUsuario['idUsuario']; ?>">Eliminar mi cuenta</button>
        </div>
<?php }else{?>
        <div class="modal-content red lighten-4">
            <h4><i class="material-icons medium left red-text text-darken-2">warning</i>¿Eliminar a <?php echo $dataUsuario['nombre']; ?>?</h4>
            <h6>Si elimina este registro se perderá toda la información del usuario.</h6>
        </div>
        <div class="modal-footer red lighten-4">
            <button type="button" class="btn modal-close blue">Cancelar</button>
            <button type="submit" class="btn btnBorrar red" data-dismiss="modal" id="<?php echo $dataUsuario['idUsuario']; ?>">Eliminar</button>
        </div>
<?php }?>
</div>
<!---fin ventana eliminar--->