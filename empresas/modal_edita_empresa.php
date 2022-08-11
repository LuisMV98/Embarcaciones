<!--ventana para Update--->
<div class="modal" id="editChildresn<?php echo $dataEmpresa['idEmpresa']; ?>">
    <div class="modal-content">
        <h5 class="center black white-text"><br>Editar Empresa<br><br></h5><br>
        <form action="editar_empresa.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $dataEmpresa['idEmpresa']; ?>">
            <div class="input-field">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nom" id="nombre" class="validate" value="<?php echo $dataEmpresa['nombre']; ?>" required>
            </div>
            <div class="input-field">
                <label for="direcion">Dorección:</label>
                <input type="text" name="direc" id="direccion" class="validate" value="<?php echo $dataEmpresa['direccion']; ?>" required>
            </div>
            <div class="input-field">
                <label for="username">Correo de contacto:</label>
                <input type="email" name="corre" id="username" class="validate" value="<?php echo $dataEmpresa['correo']; ?>" required>
            </div>
            <div class="input-field">
                <label for="telefono">Telefono de contacto:</label>
                <input type="text" name="tele" id="telefono" class="validate" value="<?php echo $dataEmpresa['telefono']; ?>" required>
            </div>
            <div class="input-field">
                <label for="imagen"><i class="tiny material-icons">collections</i>&#32;Logotipo</label><br><br>
                <!-- div class="center"><img src="<?php //echo $dataEmpresa['logo']; ?>" class="responsive-img logo" ></div -->
                <div class="center"><input type="file" name="imag" id="imagen"></div>
            </div><br><br>
            <button type="submit" class="btn green darken-1" style="float: right;">Guardar</button>
        </form>
        <button class="btn modal-close blue darken-1" style="float: left;">Cancelar</button>
        <br><br>
    </div>
</div>
<!---fin ventana Update --->
