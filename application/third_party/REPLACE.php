<div class="row"><!--START ROW-->
                    <div class="col-md has-success">
                        <label for="Clave">CLAVE*</label>
                        <input type="text" class="form-control" placeholder="001..." id="ClaveE" name="ClaveE">
                    </div>
                    <div class="col-md">
                        <label for="Descripcion">DESCRIPCIÓN*</label>
                        <textarea id="DescripcionE" name="DescripcionE" rows="4" cols="20" class="form-control form-control-lg">
                        </textarea> 
                    </div>
                    <div class="col-md">
                        <label for="Ano">AÑO*</label>
                        <input type="text" class="form-control" placeholder="001..." id="AnoE" name="AnoE">
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Linea">LINEA*</label>
                        <select class="form-control form-control-lg" id="LineaE"  name="LineaE">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Serie">SERIE*</label>
                        <select class="form-control form-control-lg" id="SerieE"  name="SerieE">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Horma">HORMA*</label>
                        <select class="form-control form-control-lg" id="HormaE"  name="HormaE">  
                        </select>
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Familia">FAMILIA*</label>
                        <select class="form-control form-control-lg" id="FamiliaE"  name="FamiliaE">  
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Desperdicio">DESPERDICIO*</label>
                        <input type="text" class="form-control" placeholder="0.0001" id="DesperdicioE" name="DesperdicioE">
                    </div>
                    <div class="col-md">
                        <label for="Desperdicio">PUNTO CENTRAL*</label>
                        <input type="text" class="form-control" placeholder="0.0001" id="PuntoCentralE" name="PuntoCentralE">
                    </div>

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Genero">GENERO*</label>
                        <select class="form-control form-control-lg" id="GeneroE"  name="GeneroE"> 
                            <option value="MASCULINO">MASCULINO</option>   
                            <option value="FEMENINO">FEMENINO</option>   
                        </select>
                    </div>  
                    <div class="col-md">
                        <label for="Herramental">HERRAMIENTA*</label>
                        <input type="text" class="form-control" placeholder="" id="HerramentalE" name="HerramentalE">
                    </div>
                    <div class="col-md">
                        <label for="Herramental">TIPO DE CONSTRUCCIÓN*</label>
                        <input type="text" class="form-control" placeholder="" id="TipoDeConstruccionE" name="TipoDeConstruccionE">
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Maquila">MAQUILA*</label>
                        <select class="form-control form-control-lg" id="MaquilaE"  name="MaquilaE">  
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Temporada">TEMPORADA*</label>
                        <select class="form-control form-control-lg" id="TemporadaE"  name="TemporadaE">  
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Tipo">TIPO DE ESTILO*</label>
                        <select class="form-control form-control-lg" id="TipoE"  name="TipoE">  
                        </select>
                    </div>
                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-md">
                        <label for="Notas">NOTAS*</label>
                        <input type="text" class="form-control" placeholder="" id="NotasE" name="NotasE">
                    </div>
                    <div class="col-md">
                        <label for="Estatus">MAQUILA O PLANTILLA*</label>
                        <select class="form-control form-control-lg" id="MaquilaPlantillaE"  name="MaquilaPlantillaE"> 
                            <option value="MAQUILA">MAQUILA</option>  
                            <option value="PLANTILLA">PLANTILLA</option>
                            <option value="MAQUILAS EXTERNAS">MAQUILAS EXTERNAS</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="Estatus">ESTATUS*</label>
                        <select class="form-control form-control-lg" id="EstatusE"  name="EstatusE"> 
                            <option value="ACTIVO">ACTIVO</option>   
                            <option value="INACTIVO">INACTIVO</option>   
                        </select>
                    </div>
                    <div class="col-md">
                        <BR>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="LiberadoE" name="LiberadoE" checked="">
                            <label class="custom-control-label" for="Liberado">LIBERADO</label>
                        </div>
                    </div> 

                    <div class="w-100"></div> <!--SALTO-->
                    <div class="col-sm text-center">
                        <img class="align-self-center mr-3" src="<?php print base_url('img/camera.png'); ?>" alt="ESTILO" onclick="">
                        <h1>SELECCIONE UNA IMAGEN</h1>
                    </div> 
                    <div class="col d-none">
                        <input type="file" id="FotoE" name="FotoE" class="d-none"> 
                    </div>
                </div><!--FIN ROW-->