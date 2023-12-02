<div class="card w-25 mx-auto my-5">
    <div class="card-body text-center">
        <?php
        if (isset($error)){
            ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $error?>
            </div>
            <?php
        }?>
        <form method="post" action="<?php echo site_url("Auth/login"); ?>">
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" class="form-control" name="user">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
        </form>
    </div>
</div>