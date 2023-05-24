<body>
    <div class="container" style="margin-top: 10px;">
        <form class="row g-3" action="update.php?id=<?php echo $IDRoster?>" method="POST" id="formulario">
            <div class="col-md-2">
                <label for="inputIDRoster" class="form-label"><strong>IDRoster</strong></label>
                <input type="text" class="form-control" id="inputIDRoster" name="IDRoster" required="true" readonly value = "<?php echo($id); ?>">
            </div>
            
            
            <div class="col-md-2">
                <label for="inputIDEquipo" class="form-label"><strong>Equipo</strong></label>
                <select id="inputIDEquipo" class="form-select" name="IDEquipo" required="true" value="<?php echo $row['IDEquipo']?>">
                    <option selected ><?php echo $row['IDEquipo']?></option>
                    <?php
                        while ($rowT=mysqli_fetch_array($queryEquipo)) {
                            echo "<option>".$rowL['Equipo']."</option>";
                        }
                    ?>
                </select>
            </div>


            <div class="col-md-2 text-end">
                <label for="inputIDTemporada" class="form-label"><strong>Temporada</strong></label>
                <select id="inputIDTemporada" class="form-select" name="IDTemporada" required="true" value="<?php echo $row['IDTemporada']?>">
                    <option selected ><?php echo $row['IDTemporada']?></option>

                    <?php
                        while ($rowT=mysqli_fetch_array($queryTemporada)) {
                            echo "<option>".$rowL['IDLiga']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <label for="inputIDAfiliacion" class="form-label" disabled selected><strong>Jugadores</strong></label>
                <select id="inputIDAfiliacion" class="form-select" name="IDAfiliacion" required="true" value="<?php echo $row['IDAfiliacion']?>">

                    <?php
                        while ($rowT=mysqli_fetch_array($queryAfiliacion)) {
                            echo "<option>".$rowL['Nombre']."</option>";
                        }
                    ?>


                </select>
            </div>
            

            <div class="col-12">
                <button type="submit" class="btn btn-primary"><strong>Editar</strong></button>
            </div>

        </form>
    </div>

</body>