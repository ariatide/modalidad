<div class="twelve columns">
    <div class="clear"></div>
    <div class="fila">
        <label class="cabecera"><strong>Tema Proyecto:</strong></label>
        <label class="contenido"><?php echo $proyecto->TEMA_PROYECTO ?></label></div>    
    <div class="fila1"> <label class="cabecera"><strong>Estado:</strong></label>
        <label class="contenido"><?php echo $proyecto->ESTADO_PROY ?></label></div>
    <div class="fila">  <label class="cabecera"><strong>Nombre:</strong></label>
        <label class="contenido"><?php echo $proyecto->POSTULANTE->NOMBRE_POS . ' ' . $proyecto->POSTULANTE->APEPAT_POS . ' ' . $proyecto->POSTULANTE->APEMAT_POS ?></label></div>
    <div class="fila1">  <label class="cabecera"><strong>Modalidad:</strong></label>
        <label class="contenido"><?php echo $proyecto->MODALIDAD ?></label></div>
    <div class="fila">  <label class="cabecera"><strong>Carrera:</strong></label>
        <label class="contenido"><?php echo $proyecto->POSTULANTE->CARRERA->NOMBRE_CARRERA ?></label></div>
    <div class="fila1">  <label class="cabecera"><strong>Nro Folder:</strong></label>
        <label class="contenido"><?php echo $proyecto->NRO_FOLDER ?></label></div>

    <div class="fila"> <label class="cabecera"><strong>Fecha Informe Fin Tutor:</strong></label>
        <label class="contenido"><?php echo $proyectoTesis->FECHA_INFORMEFIN_TUTOR ?></label></div>
    <div class="fila1"> <label class="cabecera"><strong>Fecha Informe Final:</strong></label>
        <label class="contenido"><?php echo $proyectoTesis->FECHA_INFORMEFINALIIJP ?></label></div>

    <div class="fila">  <label class="cabecera"><strong>Resumen:</strong></label>
        <label class="contenido"><?php echo $proyectoTesis->RESUMEN_TESIS?></label></div>

    <div>  
        <a href='../../modalidades'>Ir a búsqueda</a>
    </div>
        
        
        
    
</div>

