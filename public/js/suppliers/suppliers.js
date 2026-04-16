
// =========================
// TOAST
// =========================
function showToast(type, message) {
    if (type === 'success') {
        toastr.success(message, 'Success');
    } else {
        toastr.error(message, 'Error');
    }
}

const supplierUrl = baseUrl + '/suppliers';

let supplierTable;


// =========================
// ADD / UPDATE SUPPLIER
// =========================
$('#supplierForm').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: supplierUrl + '/save',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (res) {
            if (res.status) {
                $('#supplierModal').modal('hide');
                $('#supplierForm')[0].reset();

                showToast('success', res.message || 'Saved successfully');

                supplierTable.ajax.reload();
            } else {
                showToast('error', res.message || 'Save failed');
            }
        }
    });
});


// =========================
// EDIT SUPPLIER
// =========================
$(document).on('click', '.edit-supplier', function () {
    const id = $(this).data('id');

    $.ajax({
        url: supplierUrl + '/get/' + id,
        method: 'GET',
        dataType: 'json',
        success: function (res) {
            if (res.data) {
                $('#supplierId').val(res.data.id);
                $('#supplierName').val(res.data.name);
                $('#supplierEmail').val(res.data.email);
                $('#supplierPhone').val(res.data.phone);
                $('#supplierAddress').val(res.data.address);

                $('#supplierModal').modal('show');
            }
        }
    });
});


// =========================
// DELETE SUPPLIER
// =========================
$(document).on('click', '.delete-supplier', function () {
    const id = $(this).data('id');

    if (!confirm('Delete this supplier?')) return;

    $.ajax({
        url: supplierUrl + '/delete',
        method: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function (res) {
            if (res.status) {
                showToast('success', res.message || 'Deleted');
                supplierTable.ajax.reload();
            } else {
                showToast('error', res.message || 'Delete failed');
            }
        }
    });
});


// =========================
// DATATABLE
// =========================
$(document).ready(function () {

    supplierTable = $('#suppliersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: supplierUrl + '/datatables',
            type: 'POST'
        },
        columns: [
            { data: null },
            { data: 'name' },
            { data: 'email' },
            { data: 'phone' },
            { data: 'address' },
            { data: 'total_products' },
            {
                data: null,
                orderable: false,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-warning edit-supplier" data-id="${row.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-supplier" data-id="${row.id}">
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