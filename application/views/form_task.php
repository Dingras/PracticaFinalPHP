<div class="card w-50 mx-auto my-4">
    <div class="card-body">
        <?php
        if($this->session->flashdata('form_error')!=null){
            $form_error = $this->session->flashdata('form_error');
        }
        if(isset($form_error)){
            ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $form_error; ?>
            </div>
            <?php
        }
        ?>
        <form method="post" action="<?php echo !isset($task) ? site_url("Task/new") : site_url("Task/edit/".$task["id"])?>">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" name="title" value="<?= !isset($task) ? "": $task["title"]; ?>" placeholder="Ingresar un titulo para su tarea">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" class="form-control" name="description" value="<?= !isset($task) ? "": $task["description"]; ?>" placeholder="Describa su tarea">
            </div>
            <?php
            if (!isset($task)) {
                ?>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Crear</button>
                <?php
            } else {
                ?>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Actualizar</button>
                <?php
            }
            ?>
        </form>
    </div>
</div>