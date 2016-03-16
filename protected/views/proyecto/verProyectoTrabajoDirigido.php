<div class="twelve columns">
    <div class="clear"></div>
    <div class="fila">
        <label class="cabecera"><strong>Tema Proyecto:</strong></label>
        <label class="contenido"><?php echo $proyecto->TEMA_PROYECTO ?></label></div>
    <div class="fila1"> <label class="cabecera"><strong>Tema Anterior:</strong></label>
        <label class="contenido"><?php echo $trabajoDirigido->TEMA_ANTERIOR_TD ?></label></div>
    <div class="fila"> <label class="cabecera"><strong>Estado:</strong></label>
        <label class="contenido"><?php echo $proyecto->ESTADO_PROY ?></label></div>
    <div class="fila1">  <label class="cabecera"><strong>Nombre:</strong></label>
        <label class="contenido"><?php echo $proyecto->POSTULANTE->NOMBRE_POS . ' ' . $proyecto->POSTULANTE->APEPAT_POS . ' ' . $proyecto->POSTULANTE->APEMAT_POS ?></label></div>
    <div class="fila">  <label class="cabecera"><strong>Modalidad:</strong></label>
        <label class="contenido"><?php echo $proyecto->MODALIDAD ?></label></div>
    <div class="fila1">  <label class="cabecera"><strong>Carrera:</strong></label>
        <label class="contenido"><?php echo $proyecto->POSTULANTE->CARRERA->NOMBRE_CARRERA ?></label></div>
    <div class="fila">  <label class="cabecera"><strong>Nro Folder:</strong></label>
        <label class="contenido"><?php echo $proyecto->NRO_FOLDER ?></label></div>

    <div class="fila1"> <label class="cabecera"><strong>Pimera Lista de Cotejo:</strong></label>
        <label class="contenido"><?php echo $trabajoDirigido->PRIMERALISTACOTEJO ?></label></div>
    <div class="fila"> <label class="cabecera"><strong>Lista de Cotejo de Seguimiento:</strong></label>
        <label class="contenido"><?php echo $trabajoDirigido->PRIMERINFORMEAVANCE ?></label></div>
    <div class="fila1">   <label class="cabecera"><strong>Lista de Cotejo de Informe Final:</strong></label>
        <label class="contenido"><?php echo $trabajoDirigido->INFORMEFINAL ?></label></div>
    <div class="fila">  <label class="cabecera"><strong>Informe Final de Forma:</strong></label>
        <label class="contenido"><?php echo $trabajoDirigido->INFORMEFINALFORMA ?></label></div>
    <div class="fila1">   <label class="cabecera"><strong>Prorroga:</strong></label>
        <label class="contenido"><?php echo $proyecto->PRORROGA ?></label></div>



</div>

