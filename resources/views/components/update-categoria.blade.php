<!-- Button trigger modal -->
@foreach($categoria as $i)
<tr>
    <td>{{ $i->id }}</td>
    <td>{{ $i->categoria }}</td>
    <td>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Actualizar
        </button>
    </td>
</tr>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('categoria.update', $i->id)}}" method="post">
            @csrf 
            <input xname="categoria" class="form-control form-control-sm" type="text" placeholder="ingresa el nuevo nombre de la categoria" aria-label=".form-control-sm example">
            @error('categoria')
            <div class="col">
                <small class="text-danger">{{$message}}</small>
            </div>
            @enderror
            <div class="col">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach