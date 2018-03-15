<div class="row">
                    <div class="col w-100">
                        <br>
                        <div class="card border-ligh">
                            <div class="card-header text-center">
                                <strong>DATOS</strong>
                            </div>
                            <div class="card-body row">

                                <div class="col-sm">
                                    <label for="EstiloE">Estilo*</label>
                                    <select class="form-control form-control-lg" id="EstiloE"  name="EstiloE">  
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="CombinacionE">Combinación*</label>
                                    <select class="form-control form-control-lg" id="CombinacionE"  name="CombinacionE">  
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <br>
                    <div class="col w-100">
                        <div class="card border-ligh">
                            <div class="card-header text-center">
                                <strong>DETALLE</strong>
                            </div>
                            <div class="card-body row"> 
                                <div id="SuperTotalE" class="col-12 text-center">
                                    <h1 class="text-success"><strong>$ 0.0</strong></h1>
                                </div>
                                <div class="col-sm">
                                    <label for="MaterialE">Material*</label>
                                    <select class="form-control form-control-lg" id="MaterialE"  name="MaterialE">  
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="PiezaE">Pieza*</label>
                                    <select class="form-control form-control-lg" id="PiezaE"  name="PiezaE">  
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="ConsumoE">Consumo*</label>
                                    <input type="number" id="ConsumoE" name="ConsumoE" class="form-control" min="0">
                                </div>
                                <div class="w-100"></div> 
                                <br>
                                <div id="MaterialesRequeridosE" class="col-12 w-100">
                                    <table id="tblMaterialesRequeridosE" name="tblMaterialesRequeridosE" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="d-none" scope="col">ID</th>
                                                <th scope="col">Estilo</th>
                                                <th scope="col">Combinación</th>
                                                <th scope="col">Material</th>
                                                <th scope="col">Pieza</th>
                                                <th scope="col">U.M</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Consumo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Importe</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!--FIN CARD-->
                    </div> 
                </div><!--FIN ROW-->