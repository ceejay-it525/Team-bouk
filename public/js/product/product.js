$(document).ready(function() {
    let table;
    
    // Initialize DataTable
    table = $('#example1').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: baseUrl + 'products/datatables',
            type: 'POST'
        },
        columns: [
            { 
                data: null, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { data: 'id', visible: false },
            { data: 'name' },
            { data: 'price', orderable: false },
            { data: 'stock' },
            { data: 'category' },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return `
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-warning edit-product" data-id="${row.id}" data-toggle="modal" data-target="#editProductModal">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger delete-product" data-id="${row.id}" data-name="${row.name}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                }
            }
        ]
    });

    // Add New Product
    $('#addProductForm').submit(function(e) {
        e.preventDefault();
        saveProduct(this);
    });

    // Edit Product Form
    $('#editProductForm').submit(function(e) {
        e.preventDefault();
        saveProduct(this);
    });

    function saveProduct(form) {
        $.ajax({
            url: baseUrl + 'products/save',
            type: 'POST',
            data: new FormData(form),
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $(form).closest('.modal').modal('hide');
                    $(form)[0].reset();
                    table.ajax.reload(null, false);
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('Something went wrong!');
            }
        });
    }

    // Edit Product
    $(document).on('click', '.edit-product', function() {
        const id = $(this).data('id');
        $.get(baseUrl + 'products/getProduct/' + id, function(response) {
            if (response.status === 'success') {
                $('#productId').val(response.data.id);
                $('#name').val(response.data.name);
                $('#price').val(response.data.price);
                $('#stock').val(response.data.stock);
                $('#category').val(response.data.category);
            }
        });
    });

    // Delete Product
    $(document).on('click', '.delete-product', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        
        if (confirm(`Delete "${name}"?`)) {
            $.post(baseUrl + 'products/delete', {id: id}, function(response) {
                if (response.status === 'success') {
                    table.ajax.reload(null, false);
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            }, 'json');
        }
    });

    // Reset forms when modal closes
    $('#AddNewModal, #editProductModal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $('#productId').val('');
    });
});