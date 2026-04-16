
function showToast(type, message) {
    if (type === 'success') {
        toastr.success(message, 'Success');
    } else {
        toastr.error(message, 'Error');
    }
}

const productUrl = baseUrl + '/products';



$('#addForm, #editForm').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: productUrl + '/save',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (res) {
            if (res.status) {
                $('#addModal, #editModal').modal('hide');
                $('#addForm')[0].reset();
                $('#editForm')[0].reset();

                showToast('success', res.message || 'Saved successfully');

                table.ajax.reload(); // DataTable reload (NO full refresh)
            } else {
                showToast('error', res.message || 'Operation failed');
            }
        },
        error: function () {
            showToast('error', 'Server error occurred');
        }
    });
});



$(document).on('click', '.edit-product', function () {
    const id = $(this).data('id');

    $.ajax({
        url: productUrl + '/get/' + id,
        method: 'GET',
        dataType: 'json',
        success: function (res) {
            if (res.data) {
                $('#editId').val(res.data.id);
                $('#editName').val(res.data.name);
                $('#editCategory').val(res.data.category_id);
                $('#editSupplier').val(res.data.supplier_id);
                $('#editPrice').val(res.data.price);
                $('#editQuantity').val(res.data.quantity);
                $('#editDescription').val(res.data.description);

                $('#editModal').modal('show');
            } else {
                showToast('error', 'Data not found');
            }
        }
    });
});


$(document).on('click', '.delete-product', function () {
    const id = $(this).data('id');

    if (!confirm('Delete this product?')) return;

    $.ajax({
        url: productUrl + '/delete',
        method: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function (res) {
            if (res.status) {
                showToast('success', res.message || 'Deleted');
                table.ajax.reload();
            } else {
                showToast('error', res.message || 'Delete failed');
            }
        }
    });
});



let table;

$(document).ready(function () {
    table = $('#productsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: productUrl + '/datatables',
            type: 'POST'
        },
        columns: [
            { data: null },
            { data: 'name' },
            { data: 'sku' },
            { data: 'category_name' },
            { data: 'supplier_name' },
            { data: 'quantity' },
            { data: 'price' },
            {
                data: null,
                orderable: false,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-warning edit-product" data-id="${row.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-product" data-id="${row.id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                }
            }
        ],
        columnDefs: [{
            targets: 0,
            render: function (data, type, row, meta) {
                return meta.row + 1;
            }
        }]
    });
});