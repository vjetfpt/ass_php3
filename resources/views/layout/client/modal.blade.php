<div class="modal fade" id="modal_create{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Danh sách hành khách</h5>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">X</button>
                </button>
            </div>
            <div class="modal-body">
                @foreach($ord->order_details as $mem)
                <div>
                    <h4>Hành khách {{$loop->iteration}}</h4>
                    <p>Họ tên: {{$mem->full_name}}</p>
                    <p>Ngày sinh: {{$mem->date_of_birth}}</p>
                    <p>Giá vé: {{$mem->fare}}</p>
                    <hr />
                </div>
                @endforeach
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>