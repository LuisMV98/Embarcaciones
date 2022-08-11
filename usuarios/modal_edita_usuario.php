<!--ventana para Update--->
<div class="modal" id="editChildresn<?php echo $dataUsuario['idUsuario']; ?>">
    <div class="modal-content">
        <h5 class="center black white-text"><br>Editar Usuario<br><br></h5><br>
        <form action="editar_usuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dataUsuario['idUsuario']; ?>">
            <div class="input-field">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nom" id="nombre" class="validate" value="<?php echo $dataUsuario['nombre']; ?>" required>
            </div>
            <div class="input-field">
                <label for="username">Correo:</label>
                <input type="email" name="corre" id="username" class="validate" value="<?php echo $dataUsuario['correo']; ?>" required>
            </div>
            <div class="input-field">
                <label for="telefono">Telefono:</label>
                <input type="text" name="tele" id="telefono" class="validate" value="<?php echo $dataUsuario['telefono']; ?>" required>
            </div><br>
            <div class="input-field row">
                <label for="password"><i class="tiny material-icons">vpn_key</i>&#32;Contraseña:</label>
                <input type="password" name="contra" id="password<?php echo $dataUsuario['idUsuario'];?>" value="<?php echo $dataUsuario['contrasena']; ?>" class="validate col l11 m11 s11" required><br>
                <a href="#" class="ver col l1 m1 s1 grey-text" id="<?php echo $dataUsuario['idUsuario']; ?>" onclick="mostrar()"><i class="material-icons">visibility</i></a>
                <a href="#" style="display:none;" class="verA2 col l1 m1 s1 grey-text" id="eye2<?php echo $dataUsuario['idUsuario']; ?>" onclick="mostrar()"><i class="material-icons">visibility_off</i></a>
            </div><br>
            <button type="submit" class="btn green darken-1" style="float: right;">Guardar</button>
        </form>
        <button class="btn modal-close blue darken-1" style="float: left;">Cancelar</button>
        <br><br>
    </div>
</div>
<!---fin ventana Update --->
