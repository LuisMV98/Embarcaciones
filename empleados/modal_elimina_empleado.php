<!-- Ventana modal para eliminar -->
<div class="modal" id="deleteChildresn<?php echo $dataEmpleado['idEmpleado']; ?>">
    <div class="modal-content red lighten-4">
        <h4><i class="material-icons medium left red-text text-darken-2">warning</i>¿Eliminar a <?php echo $dataEmpleado['nombre']; ?>?</h4>
        <h6>Si elimina este registro se perderá toda la información del empleado.</h6>
    </div>
    <div class="modal-footer red lighten-4">
        <button type="button" class="btn modal-close blue">Cancelar</button>
        <button type="submit" class="btn btnBorrar red" data-dismiss="modal" id="<?php echo $dataEmpleado['idEmpleado']; ?>">Eliminar</button>
    </div>
</div>
<!---fin ventana eliminar--->