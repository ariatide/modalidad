<div class="twelve columns">
    <div class="clear"></div>
    
    
    --------------------
  
    
    
    -------------------
    <div class="fila">
        <label class="cabecera"><strong>Tema Proyecto:</strong></label>
        <label class="contenido"><?php echo $proyecto->TEMA_PROYECTO ?></label></div>    
    <div class="fila">
        <label class="cabecera"><strong>Tema Anterior Proyecto:</strong></label>
        <label class="contenido"><?php echo $proyectoAdscripcion->TEMA_ANTERIOR_ADS ?></label></div>    
    <div class="fila1"> <label class="cabecera"><strong>Fecha Informe 1:</strong></label>
        <label class="contenido"><?php echo $proyectoAdscripcion->FECHA_INFORME1_ADS?></label></div>
    <div class="fila1"> <label class="cabecera"><strong>Fecha Informe 2:</strong></label>
        <label class="contenido"><?php echo $proyectoAdscripcion->FECHA_INFORME2_ADS?></label></div>
    <div class="fila1"> <label class="cabecera"><strong>Fecha Informe Fin:</strong></label>
        <label class="contenido"><?php echo $proyectoAdscripcion->FECHA_INFORMEFIN_ADS?></label></div>
    <div class="fila1"> <label class="cabecera"><strong>Fecha Informe Fin Forma:</strong></label>
        <label class="contenido"><?php echo $proyectoAdscripcion->FECHA_INFORMEFINFORMA_ADS?></label></div>
    <div class="fila1"> <label class="cabecera"><strong>Prorroga:</strong></label>
        <label class="contenido"><?php echo $proyecto->PRORROGA?></label></div>
        
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
    <div class="fila1">  <label class="cabecera"><strong>Objetivo General:</strong></label>
        <label class="contenido"><?php echo $proyecto->OBJGRAL ?></label></div>
    <div class="fila1">  <label class="cabecera"><strong>Objetivo Especifico:</strong></label>
        <label class="contenido"><?php echo $proyecto->OBJESP ?></label></div>
  
    <div class="fila1">  <label class="cabecera"><strong>Tutor:</strong></label>
        <label class="contenido"><?php echo $docente->NOMBRE_DOCENTE ?></label></div>
    <div class="fila1">  <label class="cabecera"><strong>Supervisor:</strong></label>
        <label class="contenido"><?php echo $proyectoAdscripcion->NOMBRE_SUPERVISOR_ADS ?></label></div>


    <div>  
        <a href='../../modalidades'>Ir a bucqueda</a>
    </div>
        
        
        
    
</div>

