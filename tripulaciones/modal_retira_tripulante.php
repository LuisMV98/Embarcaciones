<!-- Ventana modal para eliminar -->
<div class="modal" id="deleteChildresn<?php echo $dataEmpleado['idEmpleado']; ?>">
    <div class="modal-content red lighten-4">
        <h4><i class="material-icons medium left red-text text-darken-2">warning</i>¿Retirar a <?php echo $dataEmpleado['nombre']; ?> de la tripulación?</h4>
        <h6>Si retira este registro el empleado saldrá de la tripulación.</h6>
    </div>
    <div class="modal-footer red lighten-4">
        <button type="button" class="btn modal-close blue">Cancelar</button>
        <button type="submit" class="btn btnBorrar red" data-dismiss="modal" id="<?php echo $dataEmpleado['idEmpleado']; ?>">Retirar</button>
    </div>
</div>
<!---fin ventana eliminar--->