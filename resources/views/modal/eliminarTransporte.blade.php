<style>

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 32px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
<!-- The Modal -->
<div class="modal fade" id="EliminarDatoTransporte" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      @can('Eliminar_Dato')
      <form id="Eliminar" method="post">

        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <input type="hidden" name="id" value="" id="id">
      <div class="modal-body">
        <p>¿Seguro deseas eliminar este dato?</p>
        <br>
        <a href="#" class="btn btn-danger" onclick="CANCELAR()">CANCELAR</a>

        <a href="#" class="btn btn-success" id="EliminarDatoTransportes" value="">ACEPTAR</a>
      </div>
    </form>
      @else
      <div class="modal-body">
        <div class="content">
            <div class="title m-b-md">
                No Autorizado
            </div>
        </div>
      </div>
      @endcan
    </div>
  </div>
</div>
