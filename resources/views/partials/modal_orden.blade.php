<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Nueva Orden de Compra</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">N° de Orden:</label>
                            <div class="form-line">
                                <input type="text" id="nro_ordenModal" class="form-control int-">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Fecha:</label>
                            <div class="input-group">
                                   <span class="input-group-addon">
                                       <i class="material-icons">date_range</i>
                                   </span>
                                <div class="form-line">
                                    <input type="text" id="fechaModal"class="form-control date" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Proveedor:</label>
                            <div class="form-line">
                                <input type="text" id="proveedorModal" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Rif:</label>
                            <div class="form-line">
                                <input type="text" id="rifModal" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Factura N°:</label>
                            <div class="form-line">
                                <input type="text" id="nro_ordenModal" class="form-control int">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Fecha:</label>
                            <div class="input-group">
                                   <span class="input-group-addon">
                                       <i class="material-icons">date_range</i>
                                   </span>
                                <div class="form-line">
                                    <input type="text" id="fechaFacturaModal" class="form-control date" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Control N°:</label>
                            <div class="form-line">
                                <input type="text" id="nro_controlModal" class="form-control int">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Total:</label>
                            <div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="totalModal"class="form-control decimal" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="guardarModal" class="btn btn-primary waves-effect">
                    <i class="material-icons">save</i>
                    <span>GUARDAR</span>
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    <i class="material-icons">cancel</i>
                    <span>Cancelar</span>
                </button>
            </div>
        </div>
    </div>
</div>