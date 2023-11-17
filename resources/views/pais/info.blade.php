<!-- Modal de Edición -->
<div class="modal fade" id="edit{{ $pais->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">EDITAR PAÍS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home.update', $pais->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">NOMBRE</label>
                        <input type="text" class="form-control" name="Nombre" id="" aria-describedby="helpId" placeholder="" value="{{ $pais->Nombre }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">CAPITAL</label>
                        <input type="text" class="form-control" name="Capital" id="" aria-describedby="helpId" placeholder="" value="{{ $pais->Capital }}">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">IDIOMA</label>
                        <input type="text" class="form-control" name="idioma" id="" aria-describedby="helpId" placeholder="" value="{{ $pais->Idioma_oficial }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Eliminación -->
<div class="modal fade" id="delete{{ $pais->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ELIMINAR PAÍS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home.destroy', $pais->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    ¿Estás seguro de eliminar a <strong>{{ $pais->Nombre }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

