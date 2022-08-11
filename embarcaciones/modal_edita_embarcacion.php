<!--ventana para Update--->
<div class="modal" id="editChildresn<?php echo $dataEmbarcacion['idEmbarcacion']; ?>">
    <div class="modal-content">
        <h5 class="center black white-text"><br>Editar Embarcación<br><br></h5><br>
        <form action="editar_embarcacion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dataEmbarcacion['idEmbarcacion']; ?>">
            <input type="hidden" name="empress" value="<?php echo $empre ?>">
            <div class="input-field">
                <label for="nombre">Nombre de la embarcación</label>
                <input type="text" name="nom" id="nombre" class="validate" value="<?php echo $dataEmbarcacion['nombre']; ?>" required>
            </div><br>
            <div class="input-field">
                <label for="tipo">Tipo de carga</label>
                <input type="text" name="tip" id="tipo" class="validate" value="<?php echo $dataEmbarcacion['tipo']; ?>" required>
            </div><br>
            <div class="form-field">
                <label for="salida">Fecha de salida</label>
                <input type="date" name="sali" id="salida" class="validate" min="<?php echo $dataEmbarcacion['salida']; ?>" value="<?php echo $dataEmbarcacion['salida']; ?>" required>
            </div><br>
            <div class="form-field">
                <label for="entrega">Fecha de entrega</label>
                <input type="date" name="entre" id="entrega" class="validate" min="<?php echo $dataEmbarcacion['entrega']; ?>" value="<?php echo $dataEmbarcacion['entrega']; ?>" required>
            </div><br><br>
            <button type="submit" class="btn green darken-1" style="float: right;">Guardar</button>
        </form>
        <button class="btn modal-close blue darken-1" style="float: left;">Cancelar</button>
        <br><br>
    </div>
</div>
<!---fin ventana Update --->
