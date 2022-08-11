<!--ventana para Update--->
<div class="modal" id="editChildresn<?php echo $dataEmpleado['idEmpleado']; ?>">
    <div class="modal-content">
        <h5 class="center black white-text"><br>Editar Empelado<br><br></h5><br>
        <form action="editar_empleado.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dataEmpleado['idEmpleado']; ?>">
            <input type="hidden" name="empress" value="<?php echo $empre ?>">
            <div class="form-field">
                <label for="nombre">Nombre:</label>
                <p id="nombre"><?php echo $dataEmpleado['nombre']; ?></p><br>
            </div>
            <div class="input-field">
                <label for="username">Correo:</label>
                <input type="email" name="corre" id="username" class="validate" value="<?php echo $dataEmpleado['correo']; ?>" required>
            </div>
            <div class="input-field">
                <label for="telefono">Telefono:</label>
                <input type="text" name="tele" id="telefono" class="validate" value="<?php echo $dataEmpleado['telefono']; ?>" required>
            </div><br>
            <button type="submit" class="btn green darken-1" style="float: right;">Guardar</button>
        </form>
        <button class="btn modal-close blue darken-1" style="float: left;">Cancelar</button>
        <br><br>
    </div>
</div>
<!---fin ventana Update --->
