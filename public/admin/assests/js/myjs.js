$('#my-modal').on('shown.bs.modal', function (e) {
    var cat_name = $(e.relatedTarget).attr('data-name');
    var cat_tus = $(e.relatedTarget).attr('data-status');
    var cat_id = $(e.relatedTarget).attr('data-id');
    $("#cate_name").val(cat_name)
    if (cat_tus == 1) $('#status_new').prop("checked", true)
    else {
        $('#status_old').prop("checked", true)
    }
    $('.update-button').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'admin/category/update/' + cat_id,
            dataType: 'json',
            data: {
                'category_name': $('#cate_name').val(),
                'category_status': $("input[name='status']").val(),
                'id': cat_id
            },
            type: 'POST',
            success: function (data) {
                $('.title').text(data.category_name);
                $('#status').val(data.category_status);
                let cate_name = data.category_name
                console.log(data)
                let cate_status = data.category_status == 0 ? 'Not display' : 'Display'
                $("#category_" + cat_id).remove()
                let createNewTR = ` <tr id="category_${cat_id}">`
                    + ` <td>1</td>
                        <td id="td_name">${cate_name}</td>
                        <td id="td_status">
                           ${cate_status}
                        </td>
                       <td id="td_edit">
                            <button class="btn btn-success btn-icon" data-toggle="modal" data-target="#my-modal"
                                    data-name="${cate_name}"
                                    data-id="${cat_id}"
                                    data-status="${data.category_status}">Edit
                            </button>
                            <button class="btn btn-danger btn-icon delete-button" data-id="${cat_id}"> Delete </button>
                        </td>
                    </tr>
                `
                $("#table-body").prepend(createNewTR)
            }
        });
    });
})



