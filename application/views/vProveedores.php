<div class="card border-0" id="pnlTablero">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 float-left">
                <legend class="float-left">Gestión de Proveedores</legend>
            </div>
            <div class="col-sm-6 float-right" align="right">
                <button type="button" class="btn btn-primary" id="btnNuevo" data-toggle="tooltip" data-placement="left" title="Agregar"><span class="fa fa-plus"></span><br></button>
            </div>
        </div>
        <div class="card-block">
            <div class="table-responsive" id="tblRegistros"></div>
        </div>
    </div>
</div>
<!--GUARDAR-->
<div id="" class="container-fluid">
    <div class="card border-0  d-none" id="pnlDatos">
        <div class="card-body text-dark">
            <form id="frmNuevo">
                <div class="row">
                    <div class="col-md-2 float-left">
                        <legend class="float-left">Proveedores</legend>
                    </div>
                    <div class="col-md-7 float-right">

                    </div>
                    <div class="col-md-3 float-right" align="right">
                        <button type="button" class="btn btn-default" id="btnCancelar">SALIR</button>
                        <button type="button" class="btn btn-primary" id="btnGuardar">GUARDAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="d-none">
                        <input type="text" class="" id="ID" name="ID" required >
                    </div>
                    <div class="col-sm">
                        <label for="Clave">Clave*</label>
                        <input type="text" class=" form-control form-control-sm " maxlength="50" id="Clave" name="Clave" required >
                    </div>
                    <div class="col-sm">
                        <label for="RazonSocial">Razon Social*</label>
                        <input type="text" class=" form-control form-control-sm" maxlength="500" id="RazonSocial" name="RazonSocial" required >
                    </div>
                    <div class="col-sm">
                        <label for="RFC">RFC*</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="15" id="RFC" name="RFC" required >
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="Direccion">Dirección*</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="150"  id="Direccion" name="Direccion" required >
                    </div>
                    <div class="col-sm">
                        <label for="NoExt">Num. Ext*</label>
                        <input type="text" class="form-control form-control-sm" maxlength="10"  id="NoExt" name="NoExt"  required>
                    </div>
                    <div class="col-sm">
                        <label for="NoInt">Num. Int.</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="10"  id="NoInt" name="NoInt"  >
                    </div>

                </div>
                <div class="row">

                    <div class="col-sm">
                        <label for="Colonia">Colonia</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                    </div>
                    <div class="col-sm">
                        <label for="Ciudad">Ciudad</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Ciudad" name="Ciudad"  >
                    </div>
                    <div class="col-sm">
                        <label for="Estado">Estado</label>
                        <select class="form-control form-control-sm "  id="Estado" name="Estado" >
                            <option value=""></option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                            <option value="Colima">Colima</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Distrito Federal">Distrito Federal</option>
                            <option value="Durango">Durango</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="México">México</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Pais">País</label>
                        <input type="text" class="form-control form-control-sm"  maxlength="60"  id="Colonia" name="Colonia"  >
                    </div>
                    <div class="col-sm">
                        <label for="CP">Código Postal</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="8"  id="CP" name="CP"  >
                    </div>
                    <div class="col-sm">
                        <label for="Telefono">Teléfono</label>
                        <input type="tel" class="form-control form-control-sm"  maxlength="15"  id="Telefono" name="Telefono"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Correo">Correo</label>
                        <input type="email" class="form-control form-control-sm"  maxlength="60"  id="Correo" name="Correo"  >
                    </div>
                    <div class="col-sm">
                        <label for="LimiteCredito">Límite de Crédito</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  id="LimiteCredito" name="LimiteCredito"  >
                    </div>
                    <div class="col-sm">
                        <label for="PlazoPagos">Plazo Pagos</label>
                        <input type="text" class="form-control form-control-sm numbersOnly"  maxlength="15"  id="PlazoPagos" name="PlazoPagos"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="RegimenFiscal">Regimen Fiscal</label>
                        <select class="form-control form-control-sm"  name="RegimenFiscal" >
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="ListaDePrecios">Lista de precios</label>
                        <select class="form-control form-control-sm"  name="ListaDePrecio" >
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="Estatus">Estatus*</label>
                        <select class="form-control form-control-sm required"  name="Estatus" required="">
                            <option value=""></option>
                            <option>ACTIVO</option>
                            <option>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <!-- FOTO -->
                <div for="" align="center">
                    <br>
                    <h3>Puede subir un archivo PDF, imagen (JPG,GIF,PNG) etc.</h3>
                </div>
                <div class="col-md-12" align="center">
                    <input type="file" id="Foto" name="Foto" class="d-none">
                    <button type="button" class="btn btn-default" id="btnArchivo" name="btnArchivo">
                        <span class="fa fa-upload fa-1x"></span> SELECCIONA EL ARCHIVO
                    </button>
                    <br><hr>
                    <div id="VistaPrevia" class="col-md-12" align="center"></div>
                </div>
                <!-- FIN FOTO -->
            </form>
        </div>
    </div>
</div>

