
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

const categoryUrl = baseUrl + '/categories';

let categoryTable;


// =========================
// ADD / UPDATE CATEGORY
// =========================
$('#categoryForm').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: categoryUrl + '/save',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function (res) {
            if (res.status) {
                $('#categoryModal').modal('hide');
                $('#categoryForm')[0].reset();

                showToast('success', res.message || 'Saved successfully');

                categoryTable.ajax.reload();
            } else {
                showToast('error', res.message || 'Save failed');
            }
        }
    });
});


// =========================
// EDIT CATEGORY
// =========================
$(document).on('click', '.edit-category', function () {
    const id = $(this).data('id');

    $.ajax({
        url: categoryUrl + '/get/' + id,
        method: 'GET',
        dataType: 'json',
        success: function (res) {
            if (res.data) {
                $('#categoryId').val(res.data.id);
                $('#categoryName').val(res.data.name);
                $('#categoryDescription').val(res.data.description);

                $('#categoryModal').modal('show');
            }
        }
    });
});


// =========================
// DELETE CATEGORY
// =========================
$(document).on('click', '.delete-category', function () {
    const id = $(this).data('id');

    if (!confirm('Delete this category?')) return;

    $.ajax({
        url: categoryUrl + '/delete',
        method: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function (res) {
            if (res.status) {
                showToast('success', res.message || 'Deleted');
                categoryTable.ajax.reload();
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

    categoryTable = $('#categoriesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: categoryUrl + '/datatables',
            type: 'POST'
        },
        columns: [
            { data: null },
            { data: 'name' },
            { data: 'description' },
            { data: 'total_products' },
            {
                data: null,
                orderable: false,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-warning edit-category" data-id="${row.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-category" data-id="${row.id}">
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