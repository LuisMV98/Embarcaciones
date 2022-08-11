<!-- Ventana modal para eliminar empresa -->
<div class="modal" id="deleteChildresn<?php echo $dataEmpresa['idEmpresa']; ?>">
    <div class="modal-content red lighten-4">
        <h4><i class="material-icons medium left red-text text-darken-2">warning</i>¿Eliminar empresa <?php echo $dataEmpresa['nombre']; ?>?</h4>
        <h6>Si elimina este registro se perderá toda la información de la empresa (incluida la de sus emplados).</h6>
    </div>
    <div class="modal-footer red lighten-4">
        <button type="button" class="btn modal-close blue">Cancelar</button>
        <button type="submit" class="btn btnBorrar red" data-dismiss="modal" id="<?php echo $dataEmpresa['idEmpresa']; ?>">Eliminar empresa</button>
    </div>
</div>
<!---fin ventana eliminar empresa--->