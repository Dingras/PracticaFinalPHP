<div class="card w-75 mx-auto my-4">
    <div class="card-body">
        <?php
        if (is_array($tasks)){
        ?>
        <table class="table text-center table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Tarea</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($tasks as $t){
                    ?>
                    <tr>
                        <td><?php echo $t["title"] ?></td>
                        <td><?php echo ($t["status"] == 1 ? "Hacer" : "OK")?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-info" href="<?php echo site_url("Task/change_state/{$t['id']}/{$t['status']}")?>"><i class="bi bi-arrow-clockwise"></i></a>
                                <a type="button" class="btn btn-success" onclick="show_task('<?php echo $t['title'];?>','<?php echo $t['description'];?>','<?php echo $t['status'];?>')"><i class="bi bi-eye-fill"></i></a>
                                <a type="button" class="btn btn-warning" href="<?php echo site_url("Task/form/{$t['id']}")?>"><i class="bi bi-pencil-fill"></i></a>
                                <a type="button" class="btn btn-danger" href="<?php echo site_url("Task/delete/{$t['id']}")?>"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
        <?php
        }else{
            ?>
            <div class="alert alert-warning" role="alert">
                No hay tareas asignadas al usuario.
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    function show_task(title,description,status){
        (status==1) ? icon="info" : icon="success";
        swal(title,description,icon);
    }
</script>