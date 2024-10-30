<script src="../js/custom_compras.js"></script>
<!-- Page Content -->
<main class="mt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0">Compras</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <button id="btnBuscarProveedor" class="input-group-text input-group-text-button" data-toggle="modal" data-target="#proveedorModal"><i class="fas fa-search"></i></button>
                        <input type="text" class="form-control" placeholder="ID Proveedor" id="idProveedor">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Nombre" readonly id="nombreProveedor">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-2">
                        <button id="btnBuscarProducto" class="input-group-text input-group-text-button" data-toggle="modal" data-target="#productoModal"><i class="fas fa-search"></i></button>
                        <input type="text" class="form-control" placeholder="ID Producto" id="idProducto">
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Nombre del Producto" readonly id="nombreProducto">
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cantidad" id="cantidadProducto">
                        <input type="text" class="form-control" placeholder="Precio de compra" readonly id="precioProducto">
                    </div>
                </div>
            </div>
            <div class="button-group">
                <button class="btn btn-primary" id="btn_anadir_producto"><i class="fas fa-plus"></i> Añadir producto</button>
                <div class="input-group mt-2">
                    <input type="text" class="form-control" id="total_compra" placeholder="Total" readonly>
                    <button class="btn btn-success" id="btn_generar_compra"><i class="fas fa-check"></i> Generar Compra</button>
                    <button class="btn btn-info" id="btn_ver_detalle" data-toggle="modal" data-target="#detalleCompraModal"><i class="fas fa-info-circle"></i> Ver Detalle</button>
                </div>
            </div>
            <div style="max-height: 400px; overflow-y: auto;">
                <table class="table table-striped mt-3" id="tabla_compras">
                    <thead>
                        <tr>
                            <th>ID del producto</th>
                            <th>Nombre del Producto</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Productos añadidos temporalmente -->
                    </tbody>
                </table>              
            </div>
        </div>
    </div>
</main>
</div>

<!-- Modal para buscar productos -->
<div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productoModalLabel">Buscar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control mb-2" id="buscarProducto" placeholder="Ingrese el ID o Nombre del Producto">
                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-striped" id="tablaProductos">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Existencias</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se llenarán los datos de los productos -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para buscar proveedores -->
<div class="modal fade" id="proveedorModal" tabindex="-1" role="dialog" aria-labelledby="proveedorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="proveedorModalLabel">Buscar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control mb-2" id="buscarProveedor" placeholder="Ingrese el ID o Nombre">
                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-striped" id="tablaProveedores">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>RFC</th>
                                <th>Teléfono</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se llenarán los datos de los proveedores -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para mostrar detalles de compras -->
<div class="modal fade" id="detalleCompraModal" tabindex="-1" role="dialog" aria-labelledby="detalleCompraModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalleCompraModalLabel">Detalles de la Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control mb-2" id="buscarFolio" placeholder="Ingrese Folio de la Compra">
                
                <div>
                    <h6 class="font-weight-bold text-primary">Información de la Compra:</h6>
                    <div id="infoCompra" style="max-height: 200px; overflow-y: auto;">
                        <!-- Información de la Compra -->
                    </div>
                </div>
                
                <div>
                    <h6 class="font-weight-bold text-primary mt-3">Detalle de la Compra:</h6>
                    <div id="detalleCompra" style="max-height: 200px; overflow-y: auto;">
                        <!-- Detalle de la Compra -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
