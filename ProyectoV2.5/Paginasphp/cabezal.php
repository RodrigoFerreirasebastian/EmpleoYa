<?php ?>

<header class="barra-navegacion">
        <div class="logo">
            <a href="../index.php"><img src="../imagenes/logo.png" alt="Logo"></a>
        </div>
        <div class="link-navegacion">
            <a class="link-1" href="BuscarOfertasEmpresas.php" type="target_blank">Buscar ofertas Empresas</a>
            <a class="link-2" href="EvaluacionEmpresa.php" type="target_blank">Evaluaciones de empresa</a>
            <a class="link-3" href="BuscarOfertasPersonas.php" type="target_blank">Buscar ofertas personas</a>
        </div>
        <div class="link2">
            <a class="link-4" href="EmpresaPublic.php" type="target_blank">Publicar oferta Empresa</a>
            <a class="link-5" href="PersonalPublic.php" type="target_blank">Publicar oferta personas</a>
        </div>
        <div class="botones-login">
            <?php if (!isset($_SESSION["nombre"])) { ?>
                <button class="btn-login"><a href="login.php" type="target_blank">Login</a></button>
            <?php } ?>
            <button class="btn-cv"><a href="CrearCV.php" type="target_blank">Crear CV</a></button>
        <?php if (isset($_SESSION["nombre"])) { ?>
            <?php echo "Hola " . $_SESSION["nombre"]; ?> 
            (<a href="logout.php" >logout</a>)
            <?php } ?>
        </div>

        
        </div>
    </header>